<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        foreach ($comics as $element) {
            $newComic = new Comic();

            $newComic->title = $element['title'];
            $newComic->description = $element['description'];
            $newComic->thumb = $element['thumb'];
            $newComic->price = $element['price'];
            $newComic->series = $element['series'];
            $newComic->sale_date = $element['sale_date'];

            $newComic->save();
        }
    }
}
