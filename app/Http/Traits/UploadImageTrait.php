<?php 
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    // upload image
    protected function imageUpload($request,$image,$path,$default_img=null)
    {
        if($request->hasFile($request->image)){
            $imageExtension = $image->getClientOriginalExtension();
            $imageUploadName = uniqid() . '.' . $imageExtension;
            $image->storeAs($path,$imageUploadName); // upload image im storage
            return $imageUploadName;
        }else
        {
            return $default_img;
        }
        
        // $path = public_path('uploads/users');  // upload image in public path
        // $image->move($path, $imageUploadName);
    }

    // delete image
    protected function deleteImage($path)
    {
        if(Storage::exists($path)){
            Storage::delete($path);
        }
    }

}