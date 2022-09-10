<?php

namespace App\Repositories;

use App\Models\Movies;
use Carbon\Carbon;

class MoviesRepository
{
    public function get_movies(){
        return Movies::where("status", "=", 1)
            ->where("rating", ">", 5)
            ->where("created_at", "<", Carbon::now())
            ->get();
    }

    public function delete(int $id){
        return Movies::where("id", "=", $id)->whereNull("deleted_at")->delete();
    }
}
