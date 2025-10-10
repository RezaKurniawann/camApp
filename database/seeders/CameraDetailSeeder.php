<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('camera_details')->insert([
            [
                'camera_id' => 1,
                'details' => json_encode([
                    [
                        'image' => 'camera_details/image1.jpg',
                        'capture_id' => 1,
                        'description' => 'Front view of main entrance'
                    ],
                    [
                        'image' => 'camera_details/image2.jpg',
                        'capture_id' => 1,
                        'description' => 'Close-up view of entrance door'
                    ],
                    [
                        'image' => 'camera_details/image3.jpg',
                        'capture_id' => 2,
                        'description' => 'Side view of building'
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'camera_id' => 2,
                'details' => json_encode([
                    [
                        'image' => 'camera_details/image4.jpg',
                        'capture_id' => 3,
                        'description' => 'Parking area overview'
                    ],
                    [
                        'image' => 'camera_details/image5.jpg',
                        'capture_id' => 3,
                        'description' => 'Parking entrance gate'
                    ],
                    [
                        'image' => 'camera_details/image6.jpg',
                        'capture_id' => 4,
                        'description' => 'Night view of parking area'
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'camera_id' => 3,
                'details' => json_encode([
                    [
                        'image' => 'camera_details/image7.jpg',
                        'capture_id' => 5,
                        'description' => 'Lobby area monitoring'
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}