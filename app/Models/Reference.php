<?php

declare(strict_types=1);

namespace App\Models;

use App\ReferenceType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property ReferenceType $type
 * @property string|null $title
 * @property string|null $date
 * @property string|null $url
 * @property string|null $author
 * @property string|null $publication
 * @property string|null $publisher
 * @property string|null $volume
 * @property string|null $issue
 * @property string|null $doi
 * @property string $accessed_at
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Term> $terms
 * @property-read int|null $terms_count
 * @method static \Database\Factories\ReferenceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereAccessedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereDoi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereIssue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference wherePublication($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference whereVolume($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Note> $notes
 * @property-read int|null $notes_count
 * @mixin \Eloquent
 */
#[Fillable(['title', 'url', 'author', 'type', 'project_id', 'accessed_at'])]
final class Reference extends Model
{
    /** @use HasFactory<\Database\Factories\ReferenceFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[\Override]
    protected function casts(): array
    {
        return [
            'type'        => ReferenceType::class,
            'accessed_at' => 'datetime',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function terms(): BelongsToMany
    {
        return $this->belongsToMany(Term::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
