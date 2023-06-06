<?php

use App\Services\NewsApi\NewsApiService;

it('can build a new NewsApi Service', function(string $string){
    expect(
        new NewsApiService(
            baseUrl: $string,
            apiToken: $string
        )
    )->toBeInstanceOf(NewsApiService::class);
})->with('string');
