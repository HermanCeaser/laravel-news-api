<?php

namespace App\Http\Controllers;

use App\Services\Contracts\NewsService;
use App\Services\GuardianApi\GuardianApiService;
use App\Services\NewyorkTimesApi\NewyorkTimesApiService;
use Illuminate\Http\Request;
// use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(
        NewsService $newsService,
        NewyorkTimesApiService $timesService,
        GuardianApiService $guardianApiService)
    {

        // $newsapi = new NewsApi($newsService->key);
        // show all the news from all the resources
        $sources = [
            'newsapi',
            'guardian',
            'newyork_times'
        ];

        // $response1 = $newsService->getNews()->topHeadlines();
        $response2 = $timesService->getNews()->topHeadlines();
        // $response3 = $guardianApiService->getNews()->topHeadlines();


        // $all_articles = $newsapi->getTopHeadlines(country:'us');


        return $response2;



    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
