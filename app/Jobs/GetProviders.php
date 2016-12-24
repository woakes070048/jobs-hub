<?php namespace App\Jobs;

use App\Models\Provider;

class GetProviders
{
    /**
     * @var array $user
     */
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle(Provider $providerModel)
    {
        // wip
    }
}
