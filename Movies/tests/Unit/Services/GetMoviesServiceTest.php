<?php

namespace Services;

use App\Repositories\MoviesRepository;
use App\Services\GetMoviesService;
use Tests\TestCase;

class GetMoviesServiceTest extends TestCase
{
    public function test_it_can_get_a_movie(){

        $moviesRepositoryMock = $this->mock(MoviesRepository::class);
        $moviesRepositoryMock->shouldReceive("get_movies")
            ->andReturn([
                [
                    "status" => 1,
                    "name" => "Movie Name 1",
                    "rating" => 7,
                    "description" => "Description 1",
                    "image" => "Image 1",
                    "created_at" => $this->getMockedTime(),
                    "updated_at" => null,
                ]
            ]);

        $getMovieService = $this->app->get(GetMoviesService::class);

        $result = ($getMovieService)();

        $this->assertEquals([
            [
                "status" => 1,
                "name" => "Movie Name 1",
                "rating" => 7,
                "description" => "Description 1",
                "image" => "Image 1",
                "created_at" => $this->getMockedTime(),
                "updated_at" => null,]
            ],
            $result
        );
    }

    public function test_it_can_get_movies(){

        $moviesRepositoryMock = $this->mock(MoviesRepository::class);
        $moviesRepositoryMock->shouldReceive("get_movies")
            ->andReturn([
                [
                    "status" => 1,
                    "name" => "Movie Name 1",
                    "rating" => 7,
                    "description" => "Description 1",
                    "image" => "Image 1",
                    "created_at" => $this->getMockedTime(),
                    "updated_at" => null,
                ],
                [
                    "status" => 1,
                    "name" => "Movie Name 2",
                    "rating" => 7,
                    "description" => "Description 2",
                    "image" => "Image 2",
                    "created_at" => $this->getMockedTime(),
                    "updated_at" => $this->getMockedTime(),
                ],
            ]);

        $getMovieService = $this->app->get(GetMoviesService::class);

        $result = ($getMovieService)();

        $this->assertEquals([
            [
                "status" => 1,
                "name" => "Movie Name 1",
                "rating" => 7,
                "description" => "Description 1",
                "image" => "Image 1",
                "created_at" => $this->getMockedTime(),
                "updated_at" => null,
            ],
            [
                "status" => 1,
                "name" => "Movie Name 2",
                "rating" => 7,
                "description" => "Description 2",
                "image" => "Image 2",
                "created_at" => $this->getMockedTime(),
                "updated_at" => $this->getMockedTime(),
            ],
            ],
            $result
        );
    }

    public function test_there_are_no_movies_to_get(){

        $moviesRepositoryMock = $this->mock(MoviesRepository::class);
        $moviesRepositoryMock->shouldReceive("get_movies")
            ->andReturn([

            ]);

        $getMovieService = $this->app->get(GetMoviesService::class);

        $result = ($getMovieService)();

        $this->assertEquals(
            [],
            $result
        );
    }
}
