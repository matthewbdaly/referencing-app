<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Taxonomy extends Model
{
    /** @use HasFactory<\Database\Factories\TaxonomyFactory> */
    use HasFactory;

    public function terms(): HasMany
    {
        return $this->hasMany(Term::class);
    }
}
