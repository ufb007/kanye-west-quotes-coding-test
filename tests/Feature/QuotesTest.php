<?php

use App\Http\Controllers\Api\QuotesController;
use App\Services\QuotesService;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

describe('Test all cases for quotes', function() {
    test('Testing quotes from Kanye API', function () {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. env('API_TOKEN'),
        ])->getJson('/api/quotes');

        expect($response->assertOk());
        $responseData = $response->json();
        expect($responseData['quotes'])->toBeArray()->toHaveCount(5);
    });

    test('refresh test', function() {
        $data = [
            'quotes' => [
                "Tweeting is legal and also therapeutic",
                "Distraction is the enemy of vision",
                "Fur pillows are hard to actually sleep on",
                "So many of us need so much less than we have especially when so many of us are in need",
                "I need an army of angels to cover me while I pull this sword out of the stone"
            ]
        ];

        $response = $response = $this->withHeaders([
            'Authorization' => 'Bearer '. env('API_TOKEN'),
        ])->postJson('/api/quotes/refresh', $data);

        $response->assertOk();
        $responseData = $response->json();
        expect($responseData['quotes'])->toBeArray()->toHaveCount(5);
    });

    test('API Token Authorisation missing test', function () {
        $response = $this->getJson('/api/quotes');

        $response->assertUnauthorized();
        $response->assertJson(['error' => 'Authorisation missing']);
    });
});
