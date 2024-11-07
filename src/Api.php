<?php

namespace Debarun\Nearby;

use GuzzleHttp\Client;

class Api {
    protected Client $client;
    public function __construct(private string $apiKey) {
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    public function getNearbyPlaces(string $lat, string $lang, array $types, string|int $radius=2000,  string $fields = 'places.id,places.displayName,places.formattedAddress'): array {
        $response = $this->client->post('https://places.googleapis.com/v1/places:searchNearby', [
            'query' => [
                'fields' => $fields,
                'key' => $this->apiKey,
            ],
            'json' => [
                "includedTypes" => $types,
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
            'data' => $response->getBody(),
        ];
    }

    public function getPlaceDetails(string $placeId, string $fields = 'id,displayName,formattedAddress,nationalPhoneNumber,internationalPhoneNumber,googleMapsLinks') : array {
        $response = $this->client->get("https://places.googleapis.com/v1/places/$placeId", [
            'query' => [
                'fields' => $fields,
                'key'    => $this->apiKey,
            ]
        ]);

        return [
            'status' => $response->getStatusCode(),
            'data' => $response->getBody(),
        ];
    }
}
