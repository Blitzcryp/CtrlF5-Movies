<?php

namespace Tests;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Could make a better mock for date time but
     * too bored to do this
     */
    public function getMockedTime(): string
    {
        return Carbon::create(2022, 9, 10)->toDateTimeString();
    }
}
