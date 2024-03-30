<?php

namespace Database\Seeders;

use App\Models\Navbar;
use App\Models\navbars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        navbars::truncate();
        $links = [
            [
                'name' => 'Home',
                'route' => 'home',
                'ordering' =>  1,
            ],
            [
                'name' => 'Ressources',
                'route' => 'Ressources',
                'ordering' =>  2,
            ],
            [
                'name' => 'Favoris',
                'route' => 'Favoris',
                'ordering' =>  3,
            ],
            [
                'name' => 'À propos',
                'route' => 'aboutus',
                'ordering' =>  4,
            ]
        ];

        foreach ($links as $navbar) {
            navbars::create($navbar);
        }
    }

}
