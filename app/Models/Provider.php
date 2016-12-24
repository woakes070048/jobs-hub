<?php namespace JobApis\JobsHub\Models;

use Illuminate\Database\Eloquent\Builder;

class Provider extends AbstractModel
{
    /**
     * Defines the relationship to Provider model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Filter results by UserId
     *
     * @param Builder $query
     * @param string $userId
     *
     * @return Builder
     */
    public function scopeWhereUserId(Builder $query, $userId)
    {
        return $query->whereHas('users', function ($query) use ($userId) {
            return $query->where('id', $userId);
        });
    }
}
