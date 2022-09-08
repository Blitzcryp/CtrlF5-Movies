<?php

namespace App\Console\Commands;

use App\Models\Artists;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PruneArtists extends Command
{
    protected $signature = 'artists:prune';

    public function handle()
    {
        Artists::onlyTrashed()
            ->where("deleted_at", "<", Carbon::now()->subMonth())
            ->forceDelete();
    }
}
