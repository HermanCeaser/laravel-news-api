<?php

declare(strict_types=1);

namespace App\Services\GuardianApi\Resources;

use App\Services\GuardianApi\GuardianApiService;

class GuardianApiResource {

    public function __construct(
        private readonly GuardianApiService $service,
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
