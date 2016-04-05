<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use Mail;
use TeamQilin\User;
use TeamQilin\Block;
use Auth;

class NotificationController extends Controller
{

    public static function sendUpdateToAll($blade,$data){
        //Loop through list and send emails. 
        $users = User::get();

        foreach ($users as $key => $user) {
            //if($users[$key]['email'] == 'j.dombroski@qilinfinance.com'){
                Mail::send('emails.' . $blade, ['data' => $data], function ($message) use($users,$key,$data) {
                    $message->from('QilinBot@qilinfinance.com', 'Qilin Bot');
                    $message->to($users[$key]['email']);
                    $message->subject($data['title']);
                });
           // }
        }
    }
    
    public static function sendNewBlock($data){

        $data['block']      = Block::findOrFail($data['id']);
        $data['symbol']     = $data['block']->symbol;
        $data['exchange']   = $data['block']->exchange;

        self::sendUpdateToAll('newBlock',$data);
    }
    
    public static function sendNewNote($data){
        return self::sendUpdateToAll('newNote',$data);
    }
}
