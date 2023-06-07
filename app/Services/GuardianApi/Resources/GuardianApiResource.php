<?php

namespace App\Services\GuardianApi\Resources;

use App\Services\Contracts\NewsClient;
use App\Services\GuardianApi\GuardianApiService;
use Illuminate\Http\Client\Response;

class GuardianApiResource implements NewsClient
{
    public function __construct(
        private readonly GuardianApiService $service,
    ) {
    }

    public function all(): Response
    {
        // "/all?api-key=test"
        $urlParams = [
            'q' => 'all',
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithToken(),
            url: '/all'
        );
    }

    public function topHeadlines(): Response
    {
        // "/top?api-key=test"
        $queryParams = [
            'q' => 'top',
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithToken(),
            url: '/top-headlines',
            queryParams: $queryParams
        );
    }

    public function search(string $query): Response
    {
        // "/search?api-key=test"
        $queryParams = [
            'q' => $query,
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithToken(),
            url: '/search',
            queryParams: $queryParams
        );
    }

    /**This API Provides the following Endpoints
     * 1. Content Endpoint /content
     * 2. Tag Endpoint /tags
     * 3. Section Endpoint /section
     */

}
