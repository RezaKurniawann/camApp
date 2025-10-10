<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CameraVariant extends Model {
    protected $fillable = ['code', 'name'];

    public function cameras() {
        return $this->hasMany(Camera::class);
    }
}