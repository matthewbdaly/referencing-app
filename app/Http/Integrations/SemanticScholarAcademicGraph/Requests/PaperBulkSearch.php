<?php

namespace App\Http\Integrations\SemanticScholarAcademicGraph\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class PaperBulkSearch extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(public readonly string $terms) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/graph/v1/paper/search/bulk';
    }

    protected function defaultQuery(): array
    {
        return [
            'query' => urlencode($this->terms),
            'fields' => 'title,url,publicationTypes,publicationDate,openAccessPdf',
            'year' => '2023-',
        ];
    }
}
