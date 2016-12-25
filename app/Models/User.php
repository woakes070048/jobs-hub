<?php namespace JobApis\JobsHub\Models;

class User extends AbstractModel
{
    /**
     * Defines the relationship to Provider model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function providers()
    {
        return $this->belongsToMany(Provider::class)->withPivot('provider_options');
    }
}
