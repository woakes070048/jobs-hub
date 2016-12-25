<?php namespace JobApis\JobsHub\Jobs;

use JobApis\JobsHub\Factories\JobsMultiFactory;
use JobApis\JobsHub\Models\User;

class GetJobListings
{
    /**
     * @var array $options
     */
    protected $options;

    /**
     * @var string $providerName
     */
    protected $providerName;

    /**
     * Create a new job instance.
     */
    public function __construct($providerName = null, $options = [])
    {
        $this->providerName = $providerName;
        $this->options = $options;
    }

    /**
     * Get the jobs for one or all providers based on input parameters
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle(User $model, JobsMultiFactory $multiFactory)
    {
        // Get the provider associated with this user
        $provider = $model->with(['providers' => function ($query) {
                $query->where('name', 'like', ucfirst($this->providerName));
            }])
            ->find($this->options['user_id'])
            ->providers->first();

        if ($provider) {

            // Instantiate the client for a single provider
            $client = $multiFactory->create([
                $provider->name => json_decode($provider->pivot->provider_options, true)
            ]);

            // Add options and get jobs
            $jobs = $client->setKeyword($this->options['keyword'])
                ->setLocation($this->options['location'])
                ->setPage($this->options['page'], $this->options['per_page'])
                ->getJobsByProvider($provider->name);

            if ($jobs) {
                // Return results
                return response()->json($jobs->all());
            }

            // If no jobs found
            return response('No entries found', 404);
        }

        return response("Access denied for provider '{$this->providerName}'.", 403);
    }
}
