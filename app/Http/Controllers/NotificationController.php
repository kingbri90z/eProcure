<?php

namespace TeamQilin\Http\Controllers;

use Illuminate\Http\Request;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Controllers\Controller;
use Mail;

class NotificationController extends Controller
{

    public static function SendUpdateToAll($data){

        Mail::send('emails.newBlock', ['data' => $data], function ($message) {
            $message->from('j.dombroski@qilinfinance.com', 'New Block');

            $message->to('j.dombroski@qilinfinance.com');
        });
    }
}
