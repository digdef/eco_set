<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Reviews;


class ReviewsController extends AppBaseController
{
    public function index($type)
    {
        $reviews = Reviews::where('type', '=', $type)->get();

        return view('admin.reviews.all', compact('reviews', 'type'));
    }

    public function create($type)
    {
        return view('admin.reviews.add', compact('type'));
    }

    public function edit($id)
    {
        $review = Reviews::find($id);

        return view('admin.reviews.edit', compact('review'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($input['type'] == 3 || $input['type'] == 2) {
            $content = $input['content'];
        } else {
            if ($request->hasFile('img')) {
                $file = $request->file('img');

                $name = $file->getClientOriginalName();

                $userfileName = time();

                $userfileFullName = $userfileName . '-' . $name;

                $content = $userfileFullName;

                $file->move(public_path() . '/images/', $userfileFullName);
            } else {
                $content = $input['in_img'];
            }
        }

        $objReviews = new Reviews();

        $objReviews->create([
            'title' => $input['title'],
            'content' => $content,
            'type' => $input['type']
        ]);

        return redirect('/admin/reviews/all/' . $input['type']);
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if ($input['type'] == 3 || $input['type'] == 2) {
            $content = $input['content'];
        } else {
            if ($request->hasFile('img')) {
                $file = $request->file('img');

                $name = $file->getClientOriginalName();

                $userfileName = time();

                $userfileFullName = $userfileName . '-' . $name;

                $content = $userfileFullName;

                $file->move(public_path() . '/images/', $userfileFullName);
            } else {
                $content = $input['in_img'];
            }
        }

        $objReviews = new Reviews();

        $objReviews->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
            'content' => $content,
            'type' => $input['type']
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $objStocks = Reviews::find($input['id']);

        $objStocks->delete($input['id']);

        return back();
    }
}
