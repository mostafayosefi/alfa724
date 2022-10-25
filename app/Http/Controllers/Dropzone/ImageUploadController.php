<?php

namespace App\Http\Controllers\Dropzone;


use App\Models\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ImageUploadController extends Controller
{


	public function fileCreate()
    {
        // return view('dropzone.imageupload');
        return view('dropzone.sample');
    }

    public function fileStore($model , Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('upload/images/dropzone/'.$model),$imageName);


        // $imageName  =  uploadFile($request->file('file'),'images/dropzone','');
        $imageUpload = new ImageUpload();
        $imageUpload->filename =  "upload/images/dropzone/".$model."/".$imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy($model ,Request $request)
    {
        // $filename =  $request->get('filename');

        // dd($filename);

        // ImageUpload::where('filename',$filename)->delete();
        // $imageName  =  destroyFile($request->get('filename'),'images/dropzone','');


        $filename =  $request->get('filename');
        $myfilename = 'upload/images/dropzone/'.$model.'/'.$filename;
        ImageUpload::where('filename',$myfilename)->delete();
        $path=public_path().'/upload/images/dropzone/'.$model.'/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }




        return $filename;



    }



    public function dropzoneStorestum(Request $request)
    {



        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('upload/images/dropzone'),$imageName);
         return response()->json(['success'=>$imageName]);
    }







}
