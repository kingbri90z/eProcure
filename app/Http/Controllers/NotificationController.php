<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use Mail;
use TeamQilin\User;
use TeamQilin\Block;
use Auth;
use Google_Client;
use Google_Service_Books;
class NotificationController extends Controller
{

    public static function sendUpdateToAll($blade,$data){
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
        $client = new Google_Client();
        $client->setApplicationName(APPLICATION_NAME);
        $client->setScopes(SCOPES);
        $client->setAuthConfigFile(CLIENT_SECRET_PATH);
        $client->setAccessType('offline');

        // Get the API client and construct the service object.
        $client = getClient();
        $service = new Google_Service_Gmail($client);

        // Print the labels in the user's account.
        $user = 'me';
        $results = $service->users_labels->listUsersLabels($user);

        if (count($results->getLabels()) == 0) {
            print "No labels found.\n";
        } else {
            print "Labels:\n";
            foreach ($results->getLabels() as $label) {
                echo $label->getName();
            }
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
