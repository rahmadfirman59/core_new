<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentService
{
    public static function save_file(Request $request, $column_name = 'file', $folder = '', $name = '')
    {
        if ($request->hasFile($column_name)) {
            $file = $request->file($column_name);
            if ($folder === '') $folder = $column_name;
            if ($name === '') $name = Str::uuid();
            $filename = $name . '.'. $file->extension();
            return Storage::putFileAs($folder, $file, $filename);
        }
        return '';
    }

}
