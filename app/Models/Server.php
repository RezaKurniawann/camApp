<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {
    protected $fillable = [
        'type_id', 'brand_id', 'location_id','sub_location', 'noAsset', 'name',
        'model', 'portAvailable', 'portUse', 'hddSize', 'ipAddress'
    ];

    public function type() {
        return $this->belongsTo(ServerType::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function cameras() {
        return $this->hasMany(Camera::class);
    }

    public function getPortUseAttribute(): int
    {
        return $this->cameras()->count();
    }

    public function hasAvailablePort(): bool
    {
        return $this->portUse < $this->portAvailable;
    }

    public function getRemainingPortsAttribute(): int
    {
        return max(0, $this->portAvailable - $this->portUse);
    }
}