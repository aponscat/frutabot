<?php

namespace App\Http\Controllers;

use App\Models\Fruta;
use App\Models\Verdura;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ParticipateConversation;

class BotController extends Controller {
    public function __invoke(Request $request) {
        $botman = app('botman');
        try {
            $botman->hears("fruta", function ($bot) {
                $bot->reply("Compra estas frutas:\n- ".implode("\n- ", Fruta::deTemporada()));
            });

            $botman->hears("verdura", function ($bot) {
                $bot->reply("Compra estas verduras:\n- ".implode("\n- ", Verdura::deTemporada()));
            });

            $botman->hears("hola", function ($bot) {
                $bot->reply("Hola, cómo te llamas?");
            });
    
            $botman->hears('llamame {name}', function ($bot, $name) {
                $bot->reply('Tu nombre es: '.$name);
            });
    
            $botman->hears('entrar', function ($bot) {
                $bot->startConversation(new ParticipateConversation());
            });

            $botman->fallback(function (BotMan $bot) {
                $bot->reply("Hola soy el EasyPromosBot, puedes pedirme cosas como:
                - hola
                - llamame <tu_nombre>
                - entrar
                - fruta
                - verdura
                - ayuda o cualquier otro comando (Muestra esta ayuda)
                ");
            });
    
            $botman->listen();    
        } catch (\Exception $e) {
            $botman->fallback(function (BotMan $bot, \Exception $e) {
                $bot->reply($e->getMessage());
            });            
        }
    }
}
