<?php

namespace Tir\FileManager\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Tir\Crud\Controllers\CrudController;
use Tir\FileManager\Models\File;


class AdminFileManagerController extends CrudController
{

    protected function setModel(): string
    {
        return File::Class;
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $name = $request->input('name');

        $directory =  $file->extension();


        $path = Storage::disk('public')->put($directory, $file);

        $item = File::create([
            'name' => $name,
            'path' => $path,
            'type' => $file->extension(),
            'user_id' => $request->input('user_id'),
        ]);

        $message = trans('file::message.file-uploaded', ['item' => trans("message.item.file")]); //translate message

        return Response::Json(
            [
                'path' => $item->path,
                'created' => true,
                'message'    => $message,
            ]
            , 200);
    }
}