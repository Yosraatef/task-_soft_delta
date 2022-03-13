<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);
        return [
            'name'    => 'required|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            //'password' => 'same:confirm-password',
            'roles' => 'required'
        ];
    }
}
