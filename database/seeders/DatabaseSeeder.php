<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movies;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Movies::create([
            'title' => 'Kung Fu Panda',
            'type' => 'movie',
            'year' => '2008',
            'episodes' => '1',
            'categories' => 'animation, family, comedy, adventure',
            'description' => 'Niezgrabna i otyła panda zostaje nieoczekiwanie wybrana do wypełnienia starożytnej przepowiedni. Czy zdąży opanować sztukę kung-fu, nim pojawi się groźny przeciwnik?'
        ]);

        Movies::create([
            'title' => 'The Lord of the Rings: The Two Towers',
            'type' => 'movie',
            'year' => '2002',
            'episodes' => '1',
            'categories' => 'fantasy, adventure',
            'description' => 'Drużyna Pierścienia zostaje rozbita, lecz zdesperowany Frodo za wszelką cenę chce wypełnić powierzone mu zadanie. Aragorn z towarzyszami przygotowuje się, by odeprzeć atak hord Sarumana.'
        ]);

        Movies::create([
            'title' => 'Forrest Gump',
            'type' => 'movie',
            'year' => '1994',
            'episodes' => '1',
            'categories' => 'drama, comedy',
            'description' => 'Historia życia Forresta, chłopca o niskim ilorazie inteligencji z niedowładem kończyn, który staje się miliarderem i bohaterem wojny w Wietnamie.'
        ]);

        Movies::create([
            'title' => 'shrek',
            'type' => 'movie',
            'year' => '2001',
            'episodes' => '1',
            'categories' => 'animation, comedy',
            'description' => 'By odzyskać swój dom, brzydki ogr z gadatliwym osłem wyruszają uwolnić piękną księżniczkę.'
        ]);

        Movies::create([
            'title' => 'Intouchables',
            'type' => 'movie',
            'year' => '2011',
            'episodes' => '1',
            'categories' => 'drama, comedy',
            'description' => 'Sparaliżowany milioner zatrudnia do opieki młodego chłopaka z przedmieścia, który właśnie wyszedł z więzienia.'
        ]);

        Movies::create([
            'title' => 'The Prestige',
            'type' => 'movie',
            'year' => '2006',
            'episodes' => '1',
            'categories' => 'drama, thriller',
            'description' => 'Dwaj młodzi iluzjoniści żyją w przyjaznych stosunkach. Gdy ginie żona jednego z nich, mężczyźni stają się śmiertelnymi wrogami.'
        ]);
    }
}
