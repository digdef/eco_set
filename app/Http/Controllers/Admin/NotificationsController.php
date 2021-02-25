<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Notifications;


class NotificationsController extends AppBaseController
{
    public function index()
    {
        $notifications = Notifications::orderby('id', 'desc')->get();

        return view('admin.notifications.all', compact('notifications'));
    }

    public function delete(Request $request)
    {
        $objStocks = Notifications::find($request->id);

        $objStocks->delete($request->id);

        return back();
    }
}
