<?php namespace App\Models;

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
}
