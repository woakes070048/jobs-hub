<?php namespace JobApis\JobsHub\Jobs;

use JobApis\JobsHub\Models\Provider;

class GetProviders
{
    /**
     * @var string $userId
     */
    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get providers by userId
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle(Provider $model)
    {
        return $model->whereUserId($this->userId)->get();
    }
}
