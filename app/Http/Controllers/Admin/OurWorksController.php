<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ourWorks;

class OurWorksController extends AppBaseController
{
    public function index()
    {
        $ourWorks = ourWorks::all();

        return view('admin.ourWorks.all', compact('ourWorks'));
    }

    public function create()
    {
        return view('admin.ourWorks.add');
    }

    public function edit($id)
    {
        $ourWork = ourWorks::find($id);

        return view('admin.ourWorks.edit', compact( 'ourWork'));
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

        $objourWorks = new ourWorks();

        $objourWorks->create([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description']
        ]);


        return redirect('/admin/ourWorks/all/');
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

        $objourWorks = new ourWorks();

        $objourWorks->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
            'img' => $userfileFullName,
            'description' => $input['description']
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $objStocks = ourWorks::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }
}
