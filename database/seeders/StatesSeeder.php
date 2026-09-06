<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatesSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            'Andaman and Nicobar',
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chhattisgarh',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Orissa',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttar Pradesh',
            'Uttarakhand',
            'West Bengal',
        ];

        DB::table('states')->truncate();

        foreach ($states as $state) {
            DB::table('states')->insert([
                'name' => $state,
                'slug' => Str::slug($state),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}