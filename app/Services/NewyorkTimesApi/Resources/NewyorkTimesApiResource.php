<?php

declare(strict_types=1);

namespace App\Services\NewyorkTimesApi\Resources;

use App\Services\NewyorkTimesApi\NewyorkTimesApiService;

class NewyorkTimesApiResource {

    public function __construct(
        private readonly NewyorkTimesApiService $service,
    )
    {}

    public function search(string $query)
    {
        // "/search?api-key=test"
        $queryParams = [
            'section' => $query
        ];
        return $this->service->get(
            request: $this->service->buildRequestWithQueryParams($queryParams),
            url: "/search"
        );
    }
}