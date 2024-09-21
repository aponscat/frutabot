<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BotTest extends TestCase {
    /*
    public function testLocalUrl(): void {
        $response = $this->post("bot");
        $response->assertStatus(200);
    }*/

    public function testConversation(): void {
        $this->bot->receives('verdura')->assertReply('Hola, com et dius?');
    }

    /*
    public function testNgrokUrl(): void {
        $url=file_get_contents("ngrok.data");
        dd($url);
        $response = $this->post("$url");
        $response->assertStatus(200);
    }
    */
}
