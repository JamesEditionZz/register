<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Notifications\Mailler;
use Illuminate\Http\Request;

class sendmailcontroller extends Controller
{
    public function sendNotifications(){

        $user = User::first();

        $sendmailler = [
            'body' => '',
            'text' => 'You are allowed to text',
            'url' => url('/'),
            'thankyou' => 'CloudSite'
        ];

        $user->notify(new Mailler($sendmailler));
    }
}
