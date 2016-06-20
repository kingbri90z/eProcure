<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use Mail;
use TeamQilin\User;
use TeamQilin\Note;
use TeamQilin\Block;
use Auth;
use Ddeboer\Imap\Server;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Text\Body;
class NotificationController extends Controller
{

    public static function sendUpdateToAll($blade,$data)
    {


       // Loop through list and send emails.
//        $users = User::get();
//
//        foreach ($users as $key => $user) {
//            //if($users[$key]['email'] == 'j.dombroski@qilinfinance.com'){
//                Mail::send('emails.' . $blade, ['data' => $data], function ($message) use($users,$key,$data) {
//                    $message->from('r2d2+'.$users[$key]['id'].'.'.$data['id'].'@qilinfinance.com', 'Qilin Bot');
//                    $message->to($users[$key]['email']);
//                    $message->subject($data['title']);
//                });
//           // }
//        }


        /* connect to gmail */
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'r2d2@qilinfinance.com';
        $password = 'whatpassword';

        /* try to connect */
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        /* grab emails */
        $emails = imap_search($inbox,'ALL');

        /* if emails are returned, cycle through each... */
        if($emails) {

            /* begin output var */
            $output = '';

            /* put the newest emails on top */
            rsort($emails);


            /* for every email... */
            foreach($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);
                $fromaddr = $header->to[0]->mailbox;
                $message_uid=imap_uid($inbox, $email_number);
                $alias_data = substr($fromaddr, strpos($fromaddr, "+") + 1);
                $user_id = substr($alias_data, 0, strpos($alias_data, '.'));
                $block_id= substr($fromaddr, strpos($fromaddr, ".") + 1);

                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox,$email_number,0);
                $message = imap_fetchbody($inbox,$email_number,2);

                $message=preg_replace("/<signature>.+?<\/signature>/i", "", $message);

               $message=strip_tags($message);
                $end_position=strpos($message,'On');
                $message=substr($message, 0, $end_position);
   //             dd(print_r($message));
                
                $notes= new Note;
                $notes->uid=$message_uid;
                $notes->block_id=$block_id;
                $notes->user_id=$user_id;
                $notes->body=$message;
                $notes->save();

            }

        }

        /* close the connection  */

        imap_close($inbox);


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
