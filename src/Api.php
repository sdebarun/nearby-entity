<?php
namespace Nearby;
use GuzzleHttp\Client;
class Api {
    protected Client $client;
    public function __construct(private string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client();

    }

    public function getNearbyPlaces(string $lat, string $lang, string| int $radius) : array {
        $response = $this->client->post('https://places.googleapis.com/v1/places:searchNearby', [
            'query' => [
                'fields' => '*',
                'key' => $this->apiKey,
            ],
            'json' => [
                "includedTypes" => ["police"],
                "locationRestriction" => [
                    "circle" => [
                        "center" => [
                            "latitude" => $lat,
                            "longitude" => $lang,
                        ],
                        "radius" => $radius,
                    ],
                ],
            ]
        ]);

        return [
            'status' => $response->getStatusCode(),
            'contents' => $response->getBody(),
        ];
    }


    public function getPlaceDetails(string $placeId){
        
    }
}