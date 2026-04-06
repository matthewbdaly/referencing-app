<?php

namespace App\Http\Integrations\SemanticScholarAcademicGraph\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class PaperDetails extends Request
{
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
            'fields' => 'title,year,abstract,citationCount',
        ];
    }

}
