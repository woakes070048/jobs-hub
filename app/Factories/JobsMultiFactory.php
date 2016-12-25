<?php namespace JobApis\JobsHub\Factories;

use JobApis\Jobs\Client\JobsMulti;

class JobsMultiFactory
{
    /**
     * Create a new job instance.
     */
    public static function create($providers = [])
    {
        return new JobsMulti($providers);
    }
}
