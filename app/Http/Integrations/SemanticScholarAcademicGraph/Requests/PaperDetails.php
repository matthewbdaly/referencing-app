<?php

declare(strict_types=1);

namespace App\Http\Integrations\SemanticScholarAcademicGraph\Requests;

use App\Http\Integrations\SemanticScholarAcademicGraph\DataObjects\Paper;
use App\Http\Integrations\SemanticScholarAcademicGraph\Traits\MapsPublicationTypes;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

final class PaperDetails extends Request
{
    use MapsPublicationTypes;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(public readonly string $paperId) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return 'graph/v1/paper/' . $this->paperId;
    }

    protected function defaultQuery(): array
    {
        return [
            'fields' => 'title,year,abstract,citationCount,referenceCount,authors,authors.name,authors.affiliations,publicationTypes,venue,journal,url,openAccessPdf,fieldsOfStudy,s2FieldsOfStudy',
        ];
    }

    public function createDtoFromResponse(Response $response): Paper
    {
        $data = $response->array();

        return new Paper(
            paperId: $data['paperId'],
            url: $data['url'],
            title: $data['title'],
            publicationDate: isset($data['publicationDate']) ? Carbon::parse($data['publicationDate']) : null,
            referenceType: $this->mapPublicationTypeToReferenceType($data['publicationTypes'][0] ?? null),
            abstract: $data['abstract'] ?? null,
            year: $data['year'] ?? null,
            citationCount: $data['citationCount'] ?? null,
            referenceCount: $data['referenceCount'] ?? null,
            authors: $data['authors'] ?? null,
            venue: $data['venue'] ?? null,
            journal: $data['journal'] ?? null,
            openAccessPdf: $data['openAccessPdf'] ?? null,
            fieldsOfStudy: $data['fieldsOfStudy'] ?? null,
            s2FieldsOfStudy: $data['s2FieldsOfStudy'] ?? null,
        );
    }
}
