<?php namespace JobApis\JobsHub\Jobs;

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
    public function handle(User $user)
    {
        // Get the provider (if user has access to it)
        $provider = $user->where('id', $this->options['user_id'])->first()
            ->providers()->where('name', 'like', $this->providerName)
            ->first();

        if ($provider) {
            // Get jobs from the provider

            // Return results
            return response('Worked', 200);

            // If no jobs found
            // return response('No entries found', 404);
        }

        return response("Access denied for provider '{$this->providerName}'.'", 403);
    }
}
