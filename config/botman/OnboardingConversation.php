<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class OnboardingConversation extends Conversation
{
    protected $name;

    protected $email;

    protected $query;

    public function askName()
    {
        $this->ask('Hi! What is your name?', function(Answer $answer) {
            // Save result
            $this->name = $answer->getText();

            $this->say('Nice to meet you '.$this->name);
            $this->askHelp();
        });
    }

    // public function askEmail()
    // {
    //     $this->ask('One more thing - what is your email address?', function(Answer $answer) {
    //         // Save result
    //         $this->email = $answer->getText();

    //         $this->say('Great - that is all we need, '.$this->name);
    //         $this->askHelp();
    //     });
    // }

    public function askHelp()
    {
        $this->ask('How can I help you?', function(Answer $answer) {
            // Save result
            $this->query = $answer->getText();

            $this->say('The virtual open day event consists of live talks, virtual campus tour and many other events.');
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askName();
    }
}