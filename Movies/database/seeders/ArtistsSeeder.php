<?php

namespace Database\Seeders;

use App\Models\Artists;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ArtistsSeeder extends Seeder
{
    public function run(Generator $faker)
    {
        $possibleValues = [
            "title" => [
                "star",
                "star",
                "star",
                "writer",
                "director"
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

        $artists = collect($possibleValues)->map(function ($artist) use ($faker) {
            return [
                "title" => $artist["title"],
                "name" => $faker->firstName,
                "deleted_at" => $artist["deleted_at"],
                "updated_at" => $artist["updated_at"],
                "created_at" => $artist["created_at"],
            ];
        })->toArray();

        Artists::insert($artists);
    }
}
