<?php

namespace App\Services\NewsApi\Resources;

use App\Services\Contracts\NewsClient;
use App\Services\NewsApi\NewsApiService;
use GuzzleHttp\Client;

class NewsApiResource implements NewsClient
{
    public function __construct(
        private readonly NewsApiService $service,
    ) {
    }

    public function search(string $query)
    {
        // "/everything?q=bitcoin&apiKey=API_KEY"
        return $this->service->get(
            request: $this->service->buildRequestWithToken(),
            url: "/top-headlines?q=$query",

        );
    }

    public function topHeadlines()
    {

        $params = array();
        $params['country']='us';


        $request = $this->service->buildRequestWithToken();
        try {
            $response =  $this->service->get(
                request: $request,
                url: "/top-headlines",
                queryParams:$params
            );
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->__toString());
            } else {

                $response_body = json_decode($response->getBody());
                throw new \Exception($response_body->message);
            }
        } catch (\Exception $e) {
            throw new \Exception("There is an error: {$e}");
        }
    }

    public function all()
    {
        return $this->service->get(
            request: $this->service->buildRequestWithHttpHeader(),
            url: "/everything"
        );
    }

    public function AuthHeaders($apiKey)
    {
        return array(
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$apiKey}"
        );
    }
}
