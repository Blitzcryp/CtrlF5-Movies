<?php

namespace App\Services;

use App\Models\Movies;
use App\Repositories\MoviesRepository;

class DeleteMoviesService
{
    public static string $DELETED = "OK";
    public static string $NOT_FOUND = "Not Found";

    public function __construct(private MoviesRepository $moviesRepository)
    {
    }

    public function __invoke(int $id): string
    {
        $status = $this->moviesRepository->delete($id);

        return $status ? DeleteMoviesService::$DELETED : DeleteMoviesService::$NOT_FOUND;
    }
}
