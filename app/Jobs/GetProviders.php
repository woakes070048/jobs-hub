<?php namespace JobApis\JobsHub\Jobs;

use JobApis\JobsHub\Models\User;

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
    public function handle(User $model)
    {
        return $model->where('id', $this->userId)->first()
            ->providers()->get();
    }
}
