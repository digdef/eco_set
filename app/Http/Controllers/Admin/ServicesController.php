<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends AppBaseController
{
    public function index()
    {
        $services = Services::all();

        return view('admin.services.all', compact('services'));
    }

    public function create()
    {
        return view('admin.services.add');
    }

    public function edit($id)
    {
        $service = Services::find($id);

        return view('admin.services.edit', compact( 'service'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName);
        } else {
            $userfileFullName = $request->img;
        }

        $objServices = new Services();

        $objServices->create([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'meta_title' => $input['meta_title'] ?? null,
            'meta_description' => $input['meta_description'] ?? null
        ]);


        return redirect('/admin/services/all/');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $userfileFullName = $userfileName . '-' . $name;

            $file->move(public_path() . '/images/', $userfileFullName);
        } else {
            $userfileFullName = $request->in_img;
        }

        $objServices = new Services();

        $objServices->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description'],
            'meta_title' => $input['meta_title'] ?? null,
            'meta_description' => $input['meta_description'] ?? null
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $objStocks = Services::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }
}
