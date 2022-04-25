<?php 
namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    // upload image
    protected function imageUpload($request,$name,$folder,$default_img=null)
    {
         if($request->hasFile($request->image)){
            $imageExtension = $name->getClientOriginalExtension();
            $imageUploadName = uniqid() . '.' . $imageExtension;  
            $path=public_path($folder);
            $name->move($path,$imageUploadName);
            // $image->storeAs($folder,$imageUploadName); // upload image im storage
            return $imageUploadName;
        }else
            {
                return $default_img;
            }
    }

    // delete image
    protected function deleteImage($path,$oldImage,$defaultName=null)
    {
        if($oldImage != $defaultName){
            if(File::exists($path))
            {
                File::delete($path);
            }
            // if(Storage::exists($path)){ //delete image from storage
            //     Storage::delete($path);
            // }
        }
    }

    //$name      =>    $request->image
    // $oldImage => the image in database
    // $default image => if the image is nullable 
    // path => path of the old image
    // if($userprofile->profile_pic !="avatar.png") {
    //    if(Storage::exists($path)){
    //             Storage::delete($path);
    //  }
    // }


}
