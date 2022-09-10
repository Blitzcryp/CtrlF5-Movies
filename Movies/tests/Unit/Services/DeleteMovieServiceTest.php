<?php

namespace Services;

use App\Repositories\MoviesRepository;
use App\Services\DeleteMoviesService;
use Tests\TestCase;

class DeleteMovieServiceTest extends TestCase
{
    public function test_it_can_delete_a_movie(){
        $moviesRepositoryMock = $this->mock(MoviesRepository::class);
        $moviesRepositoryMock->shouldReceive("delete")
            ->with(1)
            ->andReturn(true);

        $deleteMoviesService = $this->app->get(DeleteMoviesService::class);

        $result = ($deleteMoviesService)(1);

        $this->assertEquals(DeleteMoviesService::$DELETED, $result);
    }

    public function test_it_can_not_delete_a_movie(){
        $moviesRepositoryMock = $this->mock(MoviesRepository::class);
        $moviesRepositoryMock->shouldReceive("delete")
            ->with(1)
            ->andReturn(false);

        $deleteMoviesService = $this->app->get(DeleteMoviesService::class);

        $result = ($deleteMoviesService)(1);

        $this->assertEquals(DeleteMoviesService::$NOT_FOUND, $result);
    }
}
