<?php

declare(strict_types=1);

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait BuildBaseRequest
{
    public function withBaseUrl(): PendingRequest
    {
        return Http::baseUrl(
            url: $this->baseUrl,
        );
    }

    public function buildRequestWithToken(): PendingRequest
    {
        return $this->withBaseUrl()->timeout(
            seconds: 15,
        )->withToken(
            token: $this->apiToken,
        );
    }

    public function buildRequestWithHttpHeader(): PendingRequest
    {
        return $this->withBaseUrl()->timeout(
            seconds: 15
        )->withHeaders(
            ['X-Api-Key' => $this->apiToken,]
        );
    }

    public function buildRequestWithQueryParams(array $queryParams): PendingRequest
    {
        return $this->withBaseUrl()->timeout(
            seconds: 15
        )->withUrlParameters(
            [
                ...$queryParams,
                'api-key' => $this->apiToken
            ]
        );
    }
}
