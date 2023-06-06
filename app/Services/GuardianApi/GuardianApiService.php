<?php

declare(strict_types=1);

namespace App\Services\GuardianApi;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequest;
use App\Services\Contracts\NewsService;
use App\Services\GuardianApi\Resources\GuardianApiResource;

class GuardianApiService implements NewsService
{
    use BuildBaseRequest;
    use CanSendGetRequest;

    public function __construct(
        private readonly string $baseurl,
        private readonly string $apiToken,
    )
    {}

    public function getNews(): GuardianApiResource
    {
        return new GuardianApiResource(service: $this);
    }

}
