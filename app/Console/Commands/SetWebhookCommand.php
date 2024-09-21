<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetWebhookCommand extends Command {
    protected $signature = 'bot:set-webhook';
    protected $description = 'Sets the telegram webhook to the given url';

    public function handle() {
        $ngrokUp=false;
        try {
            $res = Http::get('http://localhost:4040/api/tunnels');
            if ($res) $stats=json_decode($res->body(), true);
            if (isset($stats['tunnels'][0]['public_url'])) {
                $url=$stats['tunnels'][0]['public_url'];
                $url.='/bot';
                $ngrokUp=true;
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
        if (!$ngrokUp) {
            $this->error("Ngrok port in local host not open, run ngrok with:");
            $this->error("ngrok http http://localhost:8000");
            die;
        }
        $token = config('botman.telegram_token');
        $this->info("Setting webhook url to $url");
        file_put_contents("ngrok.data", $url);
        $response = Http::post("https://api.telegram.org/bot$token/setWebhook", compact('url'));
        $this->info($response->json('description', 'Unknown error'));
    }
}