<?php

namespace App\Http\Controllers;

use App\Services\DeleteMoviesService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class DeleteMovieController extends Controller
{
    public function __construct(private DeleteMoviesService $deleteMoviesService)
    {
    }

    public function __invoke($id): Response|Application|ResponseFactory
    {
        $status =  ($this->deleteMoviesService)($id);

        return response(["status" => $status], $status === DeleteMoviesService::$DELETED ? 200 : 404);
    }
}
