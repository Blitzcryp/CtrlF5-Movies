<?php

namespace Tests\Integration\Services;

use App\Models\Movies;
use Tests\DatabaseTestCase;

class GetMoviesServiceTest extends DatabaseTestCase
{
    public function test_can_get_movies(){
        Movies::insert([
            [
                "status" => 1,
                "deleted_at" => $this->getMockedTime(),
                "updated_at" => $this->getMockedTime(),
                "created_at" => $this->getMockedTime(),
                "name" => "name 1",
                "rating" => 5,
                "description" => "Description 1",
                "image" => "image 1"
            ],
            [
                "status" => 1,
                "deleted_at" => null,
                "updated_at" => $this->getMockedTime(),
                "created_at" => $this->getMockedTime(),
                "name" => "name 2",
                "rating" => 7,
                "description" => "Description 2",
                "image" => "image 2"
            ],
            [
                "status" => 2,
                "deleted_at" => null,
                "updated_at" => $this->getMockedTime(),
                "created_at" => $this->getMockedTime(),
                "name" => "name 2",
                "rating" => 7,
                "description" => "Description 2",
                "image" => "image 2"
            ],
        ]);

        $response = $this->get("/api/movies")->json();

        /**
         * Should seed data that is not random if I want an accurate match
         */
        $this->assertEquals([
            [
                "id" => 2,
                "status" => "1",
                "name" => "name 2",
                "rating" => "7",
                "description" => "Description 2",
                "image" => "image 2",
                "deleted_at" => null,
                "created_at" => "2022-09-10T00:00:00.000000Z",
                "updated_at" => "2022-09-10T00:00:00.000000Z"
            ]
        ], ($response));
    }
}
