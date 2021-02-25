<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\CeoText;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts
            ::where('id', 1)
            ->first();
        $seo = CeoText::where('type', '=', 'contacts')->first();

        return view('page.contacts.contacts', compact('contacts', 'seo'));
    }
}
