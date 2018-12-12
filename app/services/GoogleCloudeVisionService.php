<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.11.2018
 * Time: 0:06
 */

namespace App\services;


use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Support\Facades\App;

class GoogleCloudeVisionService
{
    /**
     * @var $client ImageAnnotatorClient
     */
    private $client;

    public function __construct()
    {
        $pathKey =  'C:\Program Files\OSPanel\domains\Urban-transport-reviewer\public\key\service-account.json';
        putenv("GOOGLE_APPLICATION_CREDENTIALS=$pathKey");
        $this->client = app()->make('vision');
    }

    public function recognizeText(string $image)
    {
        $image = file_get_contents($image);
        $response = $this->client->textDetection($image)->getTextAnnotations();
        return isset($response[0]) ? $response[0]->getDescription() : '';
    }

}