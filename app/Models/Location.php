<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
    protected $fillable = ['company_id', 'code', 'name'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function subLocations() {
        return $this->hasMany(SubLocation::class);
    }
}