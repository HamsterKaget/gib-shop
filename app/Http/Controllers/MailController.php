<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function simple_email() {
        $data = array('name' => "Joi die");
        Mail::send(['text' => 'user.modules.mail.mail'], $data, function($message) {
            $message->to('radjaauliaalramdani@gmail.com' , 'Devnote Tutorial')->subject('Laravel Simple Mail Testing');
            $message->from('test@gatheringinbali.com' , 'Joi die');
        });
        echo "Great! Simple mail successfully send!";
    }

    // public function html_email() {
    //     $data = array('name' => "Joi die");
    //     Mail::send('mail', $data, function($message){
    //         $message->to('radjaauliaalramdani@gmail.com', 'Devnote Tutorial')->subject('Laravel HTML Mail Testing');
    //         $message->from('test@gatheringinbali.com' ,'Joi die');
    //     });
    //     echo "Great! HTML mail successfully send!";
    // }

    // public function attach_email () {
    //     $data = array('name' => "Joi die");
    //     Mail::send('mail', $data, function($message){
    //         // $message->to('radjaauliaalramdani@gmail.com', 'Devnote Tutorial')->subject('Laravel Attachment Mail Testing' );
    //         // $message->attach('D:\blog\public\logo\devnote.png')
    //         // $message->attach('D:\blog\public\text\devnote.txt')
    //         // $message->from('test@gatheringinbali.com', 'Joi die');
    //     });
    //     echo "Great! Attachment mail successfully send!";
    // }
}
