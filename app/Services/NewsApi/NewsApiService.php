<?php

declare(strict_types=1);

namespace App\Services\NewsApi;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanBeFaked;
use App\Services\Concerns\CanSendGetRequest;
use App\Services\Contracts\NewsService;
use App\Services\NewsApi\Resources\NewsApiResource;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class NewsApiService implements NewsService
{

    use CanSendGetRequest;
    use BuildBaseRequest;
    use CanBeFaked;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $key,
        private readonly int $timeout,
        public readonly null|int $retryTimes = null,
        public readonly null|int $retrySleep = null,
    ) {}



    public function getNews(): NewsApiResource
    {
        return new NewsApiResource(service: $this);
    }
}
