<?php

declare(strict_types=1);

namespace App\Http\Integrations\SemanticScholarAcademicGraph\Requests;

use App\Http\Integrations\SemanticScholarAcademicGraph\DataObjects\Paper;
use App\Http\Integrations\SemanticScholarAcademicGraph\Traits\MapsPublicationTypes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\Http\Response;

final class PaperBulkSearch extends Request implements Cacheable
{
    use HasCaching;
    use MapsPublicationTypes;

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
        return 'graph/v1/paper/search/bulk';
    }

    protected function defaultQuery(): array
    {
        return [
            'query'  => urlencode($this->terms),
            'fields' => 'title,url,publicationTypes,publicationDate,openAccessPdf',
            'year'   => '2023-',
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

    public function createDtoFromResponse(Response $response): mixed
    {
        return LazyCollection::make($response->array('data'))
            ->map(function (array $data) {
                return new Paper(
                    paperId: $data['paperId'],
                    url: $data['url'],
                    title: $data['title'],
                    publicationDate: Carbon::parse($data['publicationDate']),
                    referenceType: $this->mapPublicationTypeToReferenceType($data['publicationTypes'][0] ?? null),
                );
            });
    }
}
