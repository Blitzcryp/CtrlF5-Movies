<?php

namespace App\Services;

use App\Models\Movies;
use App\Repositories\MoviesRepository;
use Carbon\Carbon;

class GetMoviesService
{
    public function __construct(private MoviesRepository $moviesRepository)
    {
    }

    public function __invoke()
    {
        return $this->moviesRepository->get_movies();
    }
}
