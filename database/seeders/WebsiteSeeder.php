<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [
            [
                'name' => 'website one',
            ],
            [
                'name' => 'website two',
            ],
            [
                'name' => 'website three',
            ],

        ];

        foreach ($dataArray as $data) {
            Website::create($data);
        }
    }
}
