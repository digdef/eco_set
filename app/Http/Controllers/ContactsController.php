<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts
            ::where('id', 1)
            ->first();

        return view('page.contacts.contacts', compact('contacts'));
    }
}
