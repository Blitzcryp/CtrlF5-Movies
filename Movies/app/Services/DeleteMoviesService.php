<?php

namespace App\Services;

use App\Models\Movies;

class DeleteMoviesService
{
    public static string $DELETED = "OK";
    public static string $NOT_FOUND = "Not Found";

    public function __invoke(int $id)
    {
        $status = Movies::where("id", "=", $id)->whereNull("deleted_at")->delete();

        return $status ? DeleteMoviesService::$DELETED : DeleteMoviesService::$NOT_FOUND;
    }
}
