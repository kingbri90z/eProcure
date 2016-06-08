<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use Mail;
use TeamQilin\User;
use TeamQilin\Block;
use Auth;
use Ddeboer\Imap\Server;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Text\Body;

class NotificationController extends Controller
{

    public static function sendUpdateToAll($blade,$data)
    {
//        $server = new Server('imap.gmail.com');
        $server = new Server(
            "imap.gmail.com", // required
            "993",     // defaults to 993
            "imap/ssl/novalidate-cert"    // defaults to '/imap/ssl/validate-cert'

        );
        $connection = $server->authenticate('r2d2@qilinfinance.com', 'whatpassword');
        $mailboxes = $connection->getMailboxes();
        $count=0;
        foreach ($mailboxes as $mailbox) {
            // $mailbox is instance of \Ddeboer\Imap\Mailbox
            $messages = $mailbox->getMessages();
            foreach ($messages as $message) {
                if(str_contains($message->getSubject(),"Qilin")) {
                    dd($message->getBodyText());
                }
                // $message is instance of \Ddeboer\Imap\Message



            }
           // dd(($messages));
        }
        //Loop through list and send emails.
//        $users = User::get();
//
//        foreach ($users as $key => $user) {
//            //if($users[$key]['email'] == 'j.dombroski@qilinfinance.com'){
//                Mail::send('emails.' . $blade, ['data' => $data], function ($message) use($users,$key,$data) {
//                    $message->from('r2d2+'.$users[$key]['id'].'@qilinfinance.com', 'Qilin Bot');
//                    $message->to($users[$key]['email']);
//                    $message->subject($data['title']);
//                });
//           // }
//        }
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
