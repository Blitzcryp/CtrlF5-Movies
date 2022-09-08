<?php

namespace Database\Seeders;

use App\Models\Movies;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class MoviesSeeder extends Seeder
{
    public function run(Generator $faker)
    {
        $possibleValues = [
          "status" => [
              1, 2
          ],
            "deleted_at" => [
                Carbon::now()->subMonth()->toDateTimeString(),
                Carbon::now()->toDateTimeString(),
                null
            ],
            "updated_at" => [
                Carbon::now()->subMonth()->toDateTimeString(),
                Carbon::now()->toDateTimeString(),
                null
            ],
            "created_at" => [
                Carbon::now()->subMonth()->toDateTimeString(),
                Carbon::now()->toDateTimeString(),
                null
            ],
        ];

        $possibleValues = Arr::crossJoin(...$possibleValues);

        $possibleValues = collect($possibleValues)->map(function ($movie) use ($faker){
            return [
                "status" => $movie["status"],
                "deleted_at" => $movie["deleted_at"],
                "updated_at" => $movie["updated_at"],
                "created_at" => $movie["created_at"],
                "name" => $faker->paragraph,
                "rating" => $faker->numberBetween(1, 10),
                "description" => $faker->text,
                "image" => $faker->imageUrl
           ];
        })->toArray();

        Movies::insert($possibleValues);
    }
}
