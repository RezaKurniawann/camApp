<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CameraCategory extends Model {
    protected $fillable = ['code', 'name'];

    public function cameras() {
        return $this->hasMany(Camera::class);
    }
}