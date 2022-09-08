<?php

namespace App\Actions;

use Illuminate\Http\Request;

class ValidateCreateMovieRequestData
{
    public function __invoke(Request $request): array
    {
        return $request->validate([
            "status" => ["required", "numeric", "in:1,2"],
            "name" => ["required", "string"],
            "rating" => ["required", "numeric", "min:1", "max:10"],
            "description" => ["required", "string"],
            "image" => ["required", "string"],
        ]);
    }
}
