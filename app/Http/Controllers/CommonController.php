<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class CommonController extends Controller
{
    public function file_upload($folder_name, $file, $file_name){
        return Storage::disk('local')->putFileAs($folder_name, $file, $file_name);
    }

    public function file_delete($path){
        return Storage::disk('local')->delete($path);
    }
}
