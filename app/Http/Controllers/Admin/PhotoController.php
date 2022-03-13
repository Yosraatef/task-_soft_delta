<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{

    public function destroy($id)
    {
        $photo = Image::findOrFail($id);
        try {
            //code...
            unlink(public_path($photo->image));
        } catch (\Throwable$th) {
            //throw $th;
        }
        $photo->delete();

        $action = new Action();
        $action->saveAction('Delete current image ' . $photo->imagable->title);

        $message = trans('admin.delete_suc');
        return back()->with(['message' => $message]);
    }

}
