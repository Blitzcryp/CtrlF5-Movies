<?php

namespace Actions;


use App\Actions\ValidateCreateMovieRequestData;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;
use Tests\TestCase;

class ValidateCreateMovieRequestDataTest extends TestCase
{
    public function test_it_works_with_all_values_correct(){

        $requestMock = new Request([
            "status" => 1,
            "name" => "Benson",
            "rating" => 10,
            "description" => "Description",
            "image" => "image_url"
        ]);

        $validateCreateMovieRequestData = $this->app->get(ValidateCreateMovieRequestData::class);

        $result = $validateCreateMovieRequestData($requestMock);

        $this->assertEquals([
            "status" => 1,
            "name" => "Benson",
            "rating" => 10,
            "description" => "Description",
            "image" => "image_url"
        ], $result);
    }

    /**
     * @dataProvider createMovieDataProvider
     */
    public function test_validation_with_wrong_values(Request $request, string $expected){
        $validateCreateMovieRequestData = $this->app->get(ValidateCreateMovieRequestData::class);

        try {
            $validateCreateMovieRequestData($request);

        } catch (ValidationException $e){
            $result = $e->getMessage();
        }

        $this->assertEquals($expected, $result);
    }

    public function createMovieDataProvider(): array
    {
        return [
               [
                    "request" => new Request([
                        "name" => "Benson",
                        "rating" => 10,
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => "The status field is required."
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "rating" => 10,
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => "The name field is required."
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => "The rating field is required."
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => 10,
                        "image" => "image_url"
                    ]),
                    "expected" => "The description field is required."
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => 10,
                        "description" => "Description",
                    ]),
                    "expected" => "The image field is required."
                ],
               [
                    "request" => new Request([
                        "status" => 3,
                        "name" => "Benson",
                        "rating" => 10,
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => "The selected status is invalid."
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => 123,
                        "rating" => 10,
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => 'The name must be a string.'
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => 11,
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => 'The rating must not be greater than 10.'
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => -1,
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" => 'The rating must be at least 1.'
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => "A",
                        "description" => "Description",
                        "image" => "image_url"
                    ]),
                    "expected" =>'The rating must be a number.'
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => 5,
                        "description" => 123,
                        "image" => "image_url"
                    ]),
                    "expected" => 'The description must be a string.'
                ],
               [
                    "request" => new Request([
                        "status" => 1,
                        "name" => "Benson",
                        "rating" => 5,
                        "description" => "Description",
                        "image" => 123
                    ]),
                    "expected" => 'The image must be a string.'
                ],

        ];
    }
}
