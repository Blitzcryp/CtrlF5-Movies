<?php

namespace App\Http\Controllers;

use App\Services\CreateMovieService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateMovieController extends Controller
{
    public function __construct(private Request $request, private CreateMovieService $createMovieService)
    {
    }

    public function __invoke(): Response|Application|ResponseFactory
    {
        $data = ($this->createMovieService)($this->request);
        $status = $data["status"] === CreateMovieService::$MOVIE_CREATED ? 200 : 400;

        return response($data, $status);
    }
}
