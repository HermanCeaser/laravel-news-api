<?php

namespace App\Services\NewyorkTimesApi\Resources;

use App\Services\NewyorkTimesApi\NewyorkTimesApiService;

class NewyorkTimesApiResource
{
    public function __construct(
        private readonly NewyorkTimesApiService $service,
    ) {
    }

    public function search(string $query)
    {
        // "/search?api-key=test"
        $queryParams = [
            'q' => $query,
        ];

        return $this->service->get(
            request: $this->service->buildRequestWithUrlParams($queryParams),
            url: '/search'
        );
    }
}
