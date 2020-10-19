<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends AppBaseController
{
    public function index()
    {
        $contacts = Contacts
            ::where('id', 1)
            ->first();

        return view('admin.contacts.contacts', compact('contacts'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $objContacts = new Contacts();

        $objContacts->where('id', '=', 1)->update([
            'address' => $input['address'],
            'schedule' => $input['schedule'],
            'email' => $input['email'],
            'email_to_send' => $input['email_to_send'],
            'phone' => $input['phone'],
            'facebook' => $input['facebook'],
            'vk' => $input['vk'],
            'instagram' => $input['instagram'],
            'whatsapp' => $input['whatsapp']
        ]);

        return back();
    }
}
