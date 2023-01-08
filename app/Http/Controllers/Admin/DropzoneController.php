<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Files;

class DropzoneController extends Controller
{
    public function file_store(Request $request){
        try{
            $files = $request->image;
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $fileName = rand() . "_" . $name;
                $path = "public/uploads";
                echo $path.$fileName;
                Files::create(['name' => $fileName]);
                Storage::putFileAs($path,$file,$fileName);
            }
            
        
        }catch(\Eexception $e){
            echo $e->getMessage();
        }
    }
    public function list_file(){
        return view("admin.layouts.list_file");
    }
    public function destroy_file(Request $request){
        try{
            $id = $request->id;
            $files = Files::findOrFail($id);
            $files->delete();
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}
