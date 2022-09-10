<?php

namespace App\Http\Controllers;

use App\Services\GetMoviesService;

class GetMoviesController extends Controller
{
    public function __construct(private GetMoviesService $getMoviesService)
    {
    }

    public function __invoke()
    {
        return response(($this->getMoviesService)());
    }
}
