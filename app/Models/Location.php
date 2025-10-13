<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['company_id', 'code', 'name'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function cameras()
    {
        return $this->hasMany(Camera::class);
    }
}
