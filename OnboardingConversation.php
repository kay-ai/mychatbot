<?php

use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation extends Conversation
{

    public $firstname;

    public function askFirstname()
    {
        $this->ask('Hi, what is your name?', function($answer) {
            $firstName = $answer->getText();
            $this->say('Nice to meet you! '.$firstName . '<br>' . 'Say "Help" to get a list of Commands');
        });
    }


    public function run()
    {
        $this->askFirstname();
    }
}
