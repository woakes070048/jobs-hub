<?php namespace JobApis\JobsHub\Jobs;

use JobApis\JobsHub\Models\User;

class GetUsers
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
     * Get
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle(User $model)
    {
        return $model->where('id', $this->userId)->get();
    }
}
