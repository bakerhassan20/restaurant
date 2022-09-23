<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\theme;
class ThemecolorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         theme::create([
            'color1' => '#121421',
            'color2' => '#1e202c',
            'color3' => '#292b37',
            'color4' => '#ffffff',
            ]);
    }
}
