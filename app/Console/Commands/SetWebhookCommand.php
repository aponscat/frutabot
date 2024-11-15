<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetWebhookCommand extends Command {
    protected $signature = 'bot:set-webhook';
    protected $description = 'Sets the telegram webhook to the given url';

    public function handle() {
        $url=config('app.url').'/bot';
        $token = config('botman.telegram_token');
        $response = Http::post("https://api.telegram.org/bot$token/setWebhook", compact('url'));
        $this->info($response->json('description', 'Unknown error'));
    }
}