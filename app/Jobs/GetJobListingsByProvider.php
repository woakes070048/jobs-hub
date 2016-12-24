<?php namespace JobApis\JobsHub\Jobs;

use JobApis\JobsHub\Models\Provider;
use JobApis\JobsHub\Models\User;

class GetJobListingsByProvider
{
    /**
     * @var array $options
     */
    protected $provider;

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
    public function handle(Provider $model)
    {
        // Get the provider (if user has access to it)
        $provider = $model->whereUserId($this->options['user_id'])
            ->where('name', 'like', ucfirst($this->providerName))
            ->first();

        if ($provider) {
            // Get jobs from the provider

            // Return results
            return response('Worked', 200);

            // If no jobs found
            // return response('No entries found', 404);
        }

        return response("Access denied for provider '{$this->providerName}'.", 403);
    }
}
