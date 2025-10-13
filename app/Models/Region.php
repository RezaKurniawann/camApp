<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['code', 'name'];

    public function companies() {
        return $this->hasMany(Company::class);
    }
}
