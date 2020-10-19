<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Contacts;
use Mail;

class NotificationsController extends Controller
{
    public function notifications(Request $request)
    {
        $input = $request->all();

        $objNotifications = new Notifications();

        $objNotifications->create([
            'title' => $input['title'],
            'name' => $input['name'],
            'phone' => $input['phone'],
            'text' => $input['massege']
        ]);

        $data = array(
            'title' => $input['title'],
            'name' => $input['name'],
            'phone' => $input['phone'],
            'text' => $input['massege']
        );

        $contacts = Contacts
            ::where('id', 1)
            ->first();

        Mail::send('mail', $data, function($message) use ($input, $contacts) {
            $message->to($contacts->email_to_send, $input['title'])->subject($input['title']);
            $message->from('bydigdef@gmail.com',$input['title']);
        });

        return redirect('/thanks');
    }
}
