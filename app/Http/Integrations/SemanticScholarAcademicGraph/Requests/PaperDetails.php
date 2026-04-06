<?php

namespace App\Http\Integrations\SemanticScholarAcademicGraph\Requests;

use Illuminate\Support\Facades\Cache;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\CachePlugin\Contracts\Cacheable;

final class PaperDetails extends Request implements Cacheable
{
    use HasCaching;

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

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store('redis'));
    }

    public function cacheExpiryInSeconds(): int
    {
        return 3600;
    }
}
