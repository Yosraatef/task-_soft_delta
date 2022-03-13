<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\File;

class HelperController extends Controller
{

    protected $lang_inputs;
    protected $inputs;
    protected $model;
    protected $title;
    protected $namePage;


    protected function form_builder()
    {
    }

//    public function create()
//    {
//        $this->form_builder();
//        $this->title = trans('admin.' . $this->name);
//        $this->method = 'post';
//        $this->action = route($this->name . ".store");
//        return view('form', get_object_vars($this));
//    }

//    public function edit($id)
//    {
//        $this->model = $this->model->findOrFail($id);
//        $this->form_builder();
//        $this->title = trans('admin.' . $this->name);
//        $this->method = 'put';
//        $this->action = route($this->name . ".update", $id);
//        return view('form', get_object_vars($this));
//    }

    /**
     * @param $file
     * @param $model
     * @param $method
     * @param $folder_name
     * @param $relation
     * @param string $type
     * @param null $oldFile
     */
    static function addPhoto($file, $model, $folder_name, $relation, $type = 'normal', $oldFile = null)
    {
        $image = $file;
        if ($oldFile) {
            File::delete(public_path() . '/' . $oldFile);
        }
        $destinationPath = public_path() . '/uploads/' . $folder_name . '/';
        $extension = $image->getClientOriginalExtension();
        $name = time() . '' . rand(11111, 99999) . '.' . $extension;
        $image->move($destinationPath, $name);

        if ($oldFile) {
            $model->$relation()->update(['image' => 'uploads/' . $folder_name . '/' . $name,
                                         'type'  => $type
                                        ]);
        } else {
            $model->$relation()->create(['image' => 'uploads/' . $folder_name . '/' . $name,
                                         'type'  => $type
                                        ]);
        }
    }

}
