<?php

declare(strict_types=1);

namespace App\Services\NewsApi\Resources;

use App\Services\NewsApi\NewsApiService;

class NewsApiResource {

    public function __construct(
        private readonly NewsApiService $service,
    )
    {}

    public function everything(string $query)
    {
        // "/everything?q=bitcoin&apiKey=API_KEY"
        return $this->service->get(
            request: $this->service->buildRequestWithHttpHeader(),
            url: "/everything?q=$query"
        );
    }
}
