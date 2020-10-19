<?php

namespace App\Http\Controllers\Admin;

use App\Models\about;
use App\Models\Reviews;
use Illuminate\Http\Request;

class AboutController extends AppBaseController
{
    public function about()
    {
        $about = about::where('id', 1)->first();
        $reviews = Reviews::where('type', 5)->get();

        return view('admin.about.about', compact('about', 'reviews'));
    }

    public function post_about(Request $request)
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

        if ($request->hasFile('img2')) {
            $file2 = $request->file('img2');

            $name2 = $file2->getClientOriginalName();

            $userfileName2 = time();

            $userfileFullName2 = $userfileName2 . '-' . $name2;

            $file2->move(public_path() . '/images/', $userfileFullName2);
        } else {
            $userfileFullName2 = $request->in_img2;
        }

        about::where('id', '=', 1)->update([
            'img1' => $userfileFullName ?? '',
            'img2' => $userfileFullName2 ?? '',
            'text1' => $request->text1 ?? '',
            'text2' => $request->text2 ?? '',
            'text3' => $request->text3 ?? ''
        ]);


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


        $reviews = Reviews::where('type', 5)
            ->get();

        foreach ($reviews as $review) {
            $review->delete($review->id);
        }

        if (isset($input['img_about_in'])) {
            foreach ($request->img_about_in as $img_about_in) {
                $objReviews = new Reviews();

                $objReviews->create([
                    'title' => 'img_about',
                    'content' => $img_about_in,
                    'type' => 5
                ]);
            }
        }



        if (isset($input['img_about'])) {
            foreach ($request->img_about as $img_about) {
                $userfileFullName = time() . '-' . $img_about->getClientOriginalName();

                $img_about->move(public_path('images/'), $userfileFullName);

                $objReviews = new Reviews();

                $objReviews->create([
                    'title' => 'img_about',
                    'content' => $userfileFullName,
                    'type' => 5
                ]);
            }
        }


        return back();
    }
}
