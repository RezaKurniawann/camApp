<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $fillable = ['region_id', 'code', 'name'];

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function locations() {
        return $this->hasMany(Location::class);
    }
}