<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artists extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $table = "artists";

    public function movies() {
        return $this->belongsToMany(Movies::class);
    }
}
