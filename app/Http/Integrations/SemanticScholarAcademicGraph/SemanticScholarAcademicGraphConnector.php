<?php

declare(strict_types=1);

namespace App\Http\Integrations\SemanticScholarAcademicGraph;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Stores\MemoryStore;

final class SemanticScholarAcademicGraphConnector extends Connector
{
    use AcceptsJson;
    use HasRateLimits;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'http://api.semanticscholar.org/';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }

    protected function resolveLimits(): array
    {
        return [];
    }

    protected function resolveRateLimitStore(): RateLimitStore
    {
        return new MemoryStore();
    }
}
