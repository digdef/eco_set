<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();



        return view('page.services.services', compact('services'));
    }

    public function service($id)
    {
        $service = Services::find($id);

        if (!$service) {
            return view('404');
        }

        return view('page.services.service', compact('service'));
    }
}
