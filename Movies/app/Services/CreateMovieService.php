<?php

namespace App\Services;

use App\Actions\ValidateCreateMovieRequestData;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CreateMovieService
{
    public static int $INVALID_DATA = 1;
    public static int $MOVIE_CREATED = 2;

    public function __construct(private ValidateCreateMovieRequestData $validateCreateMovieRequestData)
    {
    }

    public function __invoke(Request $request)
    {
        try {
            $movieData = ($this->validateCreateMovieRequestData)($request);
        } catch (ValidationException $e){
            return [
                "message" => $e->getMessage(),
                "status" => self::$INVALID_DATA
            ];
        }

        Movies::insert($movieData);

        return [
            "data" => $movieData,
            "status" => self::$MOVIE_CREATED
        ];
    }
}
