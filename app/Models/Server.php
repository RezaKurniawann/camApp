<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {
    protected $fillable = [
        'type_id', 'brand_id', 'sub_location_id', 'noAsset', 'name',
        'model', 'portAvailable', 'portUse', 'hddSize', 'ipAddress'
    ];

    public function type() {
        return $this->belongsTo(ServerType::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function subLocation() {
        return $this->belongsTo(SubLocation::class);
    }

    public function cameras() {
        return $this->hasMany(Camera::class);
    }
}