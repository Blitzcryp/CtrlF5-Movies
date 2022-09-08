<?php

namespace App\Services;

use App\Models\Movies;
use Carbon\Carbon;

class GetMoviesService
{
    public function __invoke()
    {
        return Movies::where("status", "=", 1)
            ->where("rating", ">", 5)
            ->where("created_at", "<", Carbon::now())
            ->get();
    }
}
