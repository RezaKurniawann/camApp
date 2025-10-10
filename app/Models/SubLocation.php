<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubLocation extends Model {
    protected $table = 'sub_locations';
    protected $fillable = ['location_id', 'code', 'name'];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function servers() {
        return $this->hasMany(Server::class);
    }

    public function cameras() {
        return $this->hasMany(Camera::class);
    }
}