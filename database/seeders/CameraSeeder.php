<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cameras')->insert([
            [
                'server_id' => 1,
                'brand_id' => 3,
                'camera_variant_id' => 2,
                'type_id' => 1,
                'category_id' => 1,
                'sub_location_id' => 1,
                'noAsset' => 'CAM-001',
                'name' => 'Lobby Camera 1',
                'model' => 'DS-2CD2143G0-I',
                'lens' => '2.8mm',
                'resolution' => '4MP',
                'ipAddress' => '192.168.2.101',
                'channel' => 'CH1',
                'coordinate' => '-6.2088,106.8456',
                'purpose' => 'Monitor main entrance',
                'images' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'server_id' => 2,
                'brand_id' => 4,
                'camera_variant_id' => 3,
                'type_id' => 2,
                'category_id' => 2,
                'sub_location_id' => 5,
                'noAsset' => 'CAM-002',
                'name' => 'Production Area Camera 1',
                'model' => 'IPC-HFW5442E-ZE',
                'lens' => '2.7-13.5mm',
                'resolution' => '4MP',
                'ipAddress' => '192.168.2.102',
                'channel' => 'CH2',
                'coordinate' => '-6.2089,106.8457',
                'purpose' => 'Monitor production line',
                'images' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'server_id' => 3,
                'brand_id' => 5,
                'camera_variant_id' => 4,
                'type_id' => 3,
                'category_id' => 2,
                'sub_location_id' => 6,
                'noAsset' => 'CAM-003',
                'name' => 'Warehouse PTZ Camera',
                'model' => 'P5635-E',
                'lens' => '4.3-129mm',
                'resolution' => '2MP',
                'ipAddress' => '192.168.2.103',
                'channel' => 'CH3',
                'coordinate' => '-6.2090,106.8458',
                'purpose' => 'Monitor warehouse area',
                'images' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}