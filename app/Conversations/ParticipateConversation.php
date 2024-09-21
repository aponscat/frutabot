<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class ParticipateConversation extends Conversation {

    protected $email;
    protected $alias;
    protected $code;

    public function askAlias() {
        $this->ask('Hola, com et dius?', function (Answer $answer) {
            $this->alias=$answer->getText();
            $this->askEmail();
        });
    }

    public function askEmail($retry=false) {
        $message="Hola $this->alias, encantat, quin és el teu email?";
        if ($retry) {
            $message="Ups, sembla que $this->email no és un mail correcte el pots tornar a introduir?";
        }

        $this->ask($message, function (Answer $answer) {
            $this->email=$answer->getText();
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->code=rand(1000, 9999);
                $this->askCode();
            } else {
                $this->askEmail(true);
            }
        });
    }

    public function askCode($retry=false) {
        $message="Perfecte $this->alias, t'hem enviat un mail amb un codi, el pots copiar?";
        if ($retry) {
            $message="Ups, aquest no és el codi correcte, pista ($this->code), el pots tornar a introduir?";
        }
        $this->ask($message, function (Answer $answer) {
            $code=$answer->getText();
            if ($code==$this->code) {
                $this->say("Genial, ets dins!");
            } else {
                $this->askCode(true);
            }
        }); 
    }
    
    public function run() {
        $this->askAlias();
    }
}