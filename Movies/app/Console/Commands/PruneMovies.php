<?php

namespace App\Console\Commands;

use App\Models\Movies;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PruneMovies extends Command
{
    protected $signature = 'movies:prune';

    public function handle()
    {
        Movies::onlyTrashed()
            ->where("deleted_at", "<", Carbon::now()->subMonth())
            ->forceDelete();
    }
}
