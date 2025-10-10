<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
    protected $fillable = ['code', 'name'];

    public function servers() {
        return $this->hasMany(Server::class);
    }

    public function cameras() {
        return $this->hasMany(Camera::class);
    }
}