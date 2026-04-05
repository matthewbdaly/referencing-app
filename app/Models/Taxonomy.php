<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Term> $terms
 * @property-read int|null $terms_count
 * @method static \Database\Factories\TaxonomyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taxonomy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class Taxonomy extends Model
{
    /** @use HasFactory<\Database\Factories\TaxonomyFactory> */
    use HasFactory;

    public function terms(): HasMany
    {
        return $this->hasMany(Term::class);
    }
}
