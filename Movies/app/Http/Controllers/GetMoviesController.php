<?php

namespace App\Http\Controllers;

use App\Services\GetMoviesService;
use http\Client\Response;
use Illuminate\Http\Request;

class GetMoviesController extends Controller
{
    public function __construct(private GetMoviesService $getMoviesService)
    {
    }

    public function __invoke()
    {
        return ($this->getMoviesService)();
    }
}
