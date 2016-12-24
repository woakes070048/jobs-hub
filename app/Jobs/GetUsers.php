<?php namespace JobApis\JobsHub\Jobs;

use JobApis\JobsHub\Models\Provider;

class GetUsers
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
