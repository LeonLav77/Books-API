<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
class BooksController extends Controller
{
    public function index(Faker $faker){
        $restKey = '46468_e72b6fdd0c6f5392c3fc8457cbb6c01b';
        return $this->make($restKey,$faker);
    }
    public function make($restKey,$faker){
        $author = rawurlencode('Tolkien');
        $url = "https://api2.isbndb.com/author/{$author}";
        $restKey = $restKey;

        $headers = array(
          "Content-Type: application/json",
          "Authorization: " . $restKey
        );

        $rest = curl_init();
        curl_setopt($rest,CURLOPT_URL,$url);
        curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($rest);


        $response = curl_exec($rest);
        $response = json_decode($response);
        $response = $response->books;
        curl_close($rest);
        $listOfObjects = array();
        for ($x = 0; $x < count($response); $x++) {
            $currentItem = $response[$x];
            $currentItem = (array)$currentItem;
            $currentItem['description'] = $faker->text;
            $currentItem['author'] = $author;
            $currentItem['price'] = $faker->randomDigit * $faker->randomDigit;
            $currentItem = (object)$currentItem;
            array_push($listOfObjects, $currentItem);
        };

        return json_encode($listOfObjects);
    }
}
