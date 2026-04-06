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
        public readonly ?string $abstract = null,
        public readonly ?int $year = null,
        public readonly ?int $citationCount = null,
        public readonly ?int $referenceCount = null,
        public readonly ?array $authors = null,
        public readonly ?string $venue = null,
        public readonly ?array $journal = null,
        public readonly ?string $doi = null,
        public readonly ?string $arxivId = null,
        public readonly ?array $openAccessPdf = null,
        public readonly ?array $fieldsOfStudy = null,
        public readonly ?array $s2FieldsOfStudy = null,
    ) {}
}
