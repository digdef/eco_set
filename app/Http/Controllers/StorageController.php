<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
	public function uploadImage(Request $request)
	{
        $funcNum = $request->CKEditorFuncNum;
        $message = $url = '';
        if ($request->hasFile('upload')) {

            $file = $request->file('upload');

            $name = $file->getClientOriginalName();

            $userfileName = time();

            $filename = $userfileName . '-' . $name;

            if ($file->isValid()) {
                $path = '/images/' . $filename;

                $file->move(public_path() . '/images/', $filename);
            } else {
                $message = 'Ошибка при загрузке файла.';
            }
        } else {
            $message = 'Файл не загружен.';
        }

        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "' . $path.'", "'.$message.'")</script>';
	}
}