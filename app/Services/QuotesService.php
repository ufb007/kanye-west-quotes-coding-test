<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class QuotesService
{
    public function __construct(protected $limit = 5)
    {
    }

    /**
     * @return array
     * @throw Exception
     */
    public function getQuotes(): array
    {
        try {
            $quotes = [];

            for ($i = 0; $i < $this->limit; $i++) {
                $response = Http::get(env('API_URI'));
                $quotes[] = $response->json()['quote'];
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $quotes;
    }

    /**
     * @return array
     * @throw Exception
     */
    public function refreshQuotes(array $oldQuotes): array
    {
        $newQuotes = [];

        while (count($newQuotes) < $this->limit) {
            $response = Http::get(env('API_URI'));
            $quote = $response->json()['quote'];

            if (!in_array($quote, $newQuotes)) {
                $newQuotes[] = $quote;
            }
        }

        return $newQuotes;
    }
}
