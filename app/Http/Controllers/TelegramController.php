<?php

namespace TeamQilin\Http\Controllers;

use Telegram;

class TelegramController extends Controller {

    protected $telegram;

    public function __construct( Telegram $telegram )
    {
        $this->telegram = $telegram;
    }

    public function sendUpdate($message)
    {

        Telegram::sendMessage([
            'chat_id' => '-121961631',
            'text' => $message
        ]);
    }
}