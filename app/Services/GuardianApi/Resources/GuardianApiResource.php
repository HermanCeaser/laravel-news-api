<?php

namespace App\Services\GuardianApi\Resources;

use App\Services\Contracts\NewsClient;
use App\Services\GuardianApi\GuardianApiService;

class GuardianApiResource implements NewsClient
{
    public function __construct(
        private readonly GuardianApiService $service,
    ) {
    }

    public function all()
    {
        // "/all?api-key=test"
        $urlParams = [
            'q' => 'all',
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithUrlParams(
                urlParams: $urlParams,
            ),
            url: '/all'
        );
    }

    public function topHeadlines()
    {
        // "/top?api-key=test"
        $urlParams = [
            'q' => 'top',
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithUrlParams(
                urlParams: $urlParams,
            ),
            url: '/top-headlines'
        );
    }

    public function search(string $query)
    {
        // "/search?api-key=test"
        $urlParams = [
            'q' => $query,
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithUrlParams(
                urlParams: $urlParams,
            ),
            url: '/search'
        );
    }

    /**This API Provides the following Endpoints
     * 1. Content Endpoint /content
     * 2. Tag Endpoint /tags
     * 3. Section Endpoint /section
     */

}
