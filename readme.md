# Place Details Fetcher

A PHP package to retrieve detailed information about places based on your location using the Google Places API. This package is designed to help you easily fetch details like name, address, contact number, open status, and more for nearby locations, making it ideal for location-based applications.

## Features

- Fetch full details of nearby places based on a specified location
- Retrieve contact information, operational status, address, and more
- Filter results by type (e.g., `restaurant`, `hospital`, `police`, etc.)
- Utilizes Google Places API for accurate and up-to-date place information

## Requirements

- PHP 7.4 or higher
- Composer
- Google Places API Key (you can obtain it from [Google Cloud Console](https://console.cloud.google.com/))
- Guzzle, PHP HTTP client [Guzzle doc](https://docs.guzzlephp.org/en/stable/index.html)

## Installation

To install this package, use Composer:

```bash
composer create-project debarun/nearby-entity
```
## Usage
```bash
use Debarun\Nearby\Api;

require __DIR__.'/vendor/autoload.php';

$response = (new Api('xxxxxxxxxxx'))->getNearbyPlaces('22.932648429114025','88.4189063273865',['police'],2000);

print_r(json_decode($response['data']));
```
## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
