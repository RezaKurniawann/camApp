<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CameraDetail extends Model
{
    protected $fillable = [
        'camera_id',
        'details',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    protected static function booted()
    {
        static::updating(function ($cameraDetail) {
            if ($cameraDetail->isDirty('details')) {
                $oldDetails = $cameraDetail->getOriginal('details') ?? [];
                $newDetails = $cameraDetail->details ?? [];

                $oldImages = collect($oldDetails)->pluck('image')->filter()->toArray();
                $newImages = collect($newDetails)->pluck('image')->filter()->toArray();

                $deletedImages = array_diff($oldImages, $newImages);

                foreach ($deletedImages as $deletedImage) {
                    if ($deletedImage && !self::isDefaultImage($deletedImage)) {
                        Storage::disk('public')->delete($deletedImage);
                    }
                }
            }
        });

        static::deleting(function ($cameraDetail) {
            if ($cameraDetail->details) {
                foreach ($cameraDetail->details as $detail) {
                    if (isset($detail['image']) && !self::isDefaultImage($detail['image'])) {
                        Storage::disk('public')->delete($detail['image']);
                    }
                }
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

    public function camera()
    {
        return $this->belongsTo(Camera::class);
    }

    public function captures()
    {
        if (!$this->details) {
            return collect();
        }

        $captureIds = collect($this->details)->pluck('capture_id')->unique();
        return Capture::whereIn('id', $captureIds)->get();
    }
}