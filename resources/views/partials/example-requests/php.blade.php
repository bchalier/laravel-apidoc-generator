```php

$client = new \GuzzleHttp\Client();
@if($hasRequestOptions)
$response = $client->{{ strtolower($route['methods'][0]) }}(
    '{{ rtrim($baseUrl, '/') . '/' . ltrim($route['boundUri'], '/') }}',
    [
@if(!empty($route['headers']))
        'headers' => {!! \Bchalier\ApiDoc\Tools\Utils::printPhpValue($route['headers'], 8) !!},
@endif
@if(!empty($route['cleanQueryParameters']))
        'query' => {!! \Bchalier\ApiDoc\Tools\Utils::printQueryParamsAsKeyValue($route['cleanQueryParameters'], "'", "=>", 12, "[]", 8) !!},
@endif
@if(!empty($route['cleanBodyParameters']))
        'json' => {!! \Bchalier\ApiDoc\Tools\Utils::printPhpValue($route['cleanBodyParameters'], 8) !!},
@endif
    ]
);
@else
$response = $client->{{ strtolower($route['methods'][0]) }}('{{ rtrim($baseUrl, '/') . '/' . ltrim($route['boundUri'], '/') }}');
@endif
$body = $response->getBody();
print_r(json_decode((string) $body));
```
