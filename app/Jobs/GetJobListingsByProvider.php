<?php namespace App\Jobs;

use App\Models\Provider;

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
    public function handle(Provider $providerModel)
    {
        $provider = $providerModel->where('name', $this->providerName)->first();
        // WIP
    }
}
