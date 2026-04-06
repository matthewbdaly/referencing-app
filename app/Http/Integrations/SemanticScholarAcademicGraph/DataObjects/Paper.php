<?php

declare(strict_types=1);

namespace App\Http\Integrations\SemanticScholarAcademicGraph\DataObjects;

use App\ReferenceType;
use Illuminate\Support\Carbon;

/**
 * @psalm-immutable
 */
final readonly class Paper
{
    public function __construct(
        public readonly string $paperId,
        public readonly string $url,
        public readonly string $title,
        public readonly ?Carbon $publicationDate,
        public readonly ?ReferenceType $referenceType,
    ) {}
}
