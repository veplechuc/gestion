<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Get the user for the specific rol.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
