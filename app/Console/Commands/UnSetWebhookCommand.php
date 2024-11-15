<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UnSetWebhookCommand extends Command {
    protected $signature = 'bot:unset-webhook';
    protected $description = 'Sets the telegram webhook to the given url';

    public function handle() {
        $token = config('botman.telegram_token');
        $response = Http::delete("https://api.telegram.org/bot$token/setWebhook");
        $this->info($response->json('description', 'Unknown error'));
    }
}