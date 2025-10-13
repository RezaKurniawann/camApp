<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Camera extends Model
{
    protected $fillable = [
        'server_id',
        'brand_id',
        'camera_variant_id',
        'type_id',
        'category_id',
        'location_id',
        'noAsset',
        'name',
        'model',
        'lens',
        'resolution',
        'ipAddress',
        'channel',
        'sub_location',
        'purpose',
        'images'
    ];

    protected static function booted()
    {
        static::updating(function ($camera) {
            if ($camera->isDirty('images')) {
                $oldImage = $camera->getOriginal('images');
                if ($oldImage && !self::isDefaultImage($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($camera) {
            if ($camera->images && !self::isDefaultImage($camera->images)) {
                Storage::disk('public')->delete($camera->images);
            }
        });
    }

    protected static function isDefaultImage($imagePath)
    {
        $defaultPaths = [
            'images/no-image.png',
            '/images/no-image.png',
            'public/images/no-image.png',
            'no-image.png',
        ];

        return in_array($imagePath, $defaultPaths) ||
            str_contains($imagePath, 'no-image.png');
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cameraVariant()
    {
        return $this->belongsTo(CameraVariant::class);
    }

    public function type()
    {
        return $this->belongsTo(CameraType::class);
    }

    public function category()
    {
        return $this->belongsTo(CameraCategory::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function cameraDetails()
    {
        return $this->hasMany(CameraDetail::class);
    }

}
