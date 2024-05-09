<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Webarts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_back',
        'img_webart',
        'target',
        'musica',
    ];
    public function webart(): BelongsTo
    {
        return $this->belongsTo(Webarts::class);
    }
}
