# Kanye West Quotes Coding test

## Features Added
 - A rest API that shows 5 random Kayne West quotes
 - There should be an endpoint to refresh the quotes and fetch the next 5 random quotes
 - Authentication for these APIs should be done with an API token, not using any package
 - The above features are tested with Feature

# Create environemnt file
Create a `.env` file on root directory and add the following content:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:BDrxM+xrJf01npQXSR0/0+EONN8sSmHMCv6JlG+Oyxg=
APP_DEBUG=true
APP_URL=http://localhost

API_URI=https://api.kanye.rest
API_TOKEN=pxEg2hXTgIqqMt9brRSPrj22KzEiJWMmDsyiEIOdcbm0ix5cXdfZiqIXSvUZumdX
```

## Install dependencies

```
composer install
```
or

## Run docker container and install from within container

```
docker-compose up -d

docker exec -it kanye-west-quotes composer install
```

Server should now be running and you can view laravel project from browser on localhost
```
http://localhost
```

# Test the application
The API entry point had been tested on `Postman` for HTTP requests

GET request for 5 Kanye West Quotes entry point

```
http://localhost/api/quotes
```
and result should look similar to below:
```
{
    "quotes": [
        "Man... whatever happened to my antique fish tank?",
        "I make awesome decisions in bike stores!!!",
        "One day I'm gon' marry a porn star",
        "I don't wanna see no woke tweets or hear no woke raps ... it's show time ... it's a whole different energy right now",
        "I love sleep; it's my favorite."
    ]
}
```

Make a POST request with the 5 quotes to be replaced with the next 5 unique quotes

```
http://localhost/api/quotes/refresh
```
Resulting in the next 5
```
{
    "quotes": [
        "So many of us need so much less than we have especially when so many of us are in need",
        "Trust me ... I won't stop",
        "We came into a broken world. And we're the cleanup crew.",
        "Empathy is the glue",
        "Decentralize"
    ]
}
```
# Run Tests
```
php artisan test
```
or 
```
docker exec -it kanye-west-quotes php artisan test
```
