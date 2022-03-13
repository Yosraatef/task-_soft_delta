<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
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
        return [
            'title'     => 'required|max:100',
            'address'  => 'required',
            'phone' => 'required|min:11|numeric',
            'email'   => 'required|email',
            'count_award'   => 'integer',
            'completed_issues'   => 'integer',
            'satisfied_customer'   => 'integer',
            'title_first_section.en' => 'required' , 
            'title_first_section.ar' => 'required' , 
            'text_first_section.ar' => 'required' , 
            'text_first_section.ar' => 'required' , 
            'title_third_section.en' => 'required' , 
            'title_third_section.ar' => 'required' , 
            'text_third_section.ar' => 'required' , 
            'text_third_section.ar' => 'required' , 
        ];
    }

    public function messages()
    {
        return [
            'title_first_section.ar.required' => __('Title First Section Arabic required'),
            'title_first_section.en.required' => __('Title First Section English required'),
            'text_first_section.ar.required' => __('Contect First Section Arabic required'),
            'text_first_section.en.required' => __('Contect First Section English required'),
            'title_third_section.ar.required' => __('Title third Section Arabic required'),
            'title_third_section.en.required' => __('Title third Section English required'),
            'text_third_section.ar.required' => __('Contect third Section Arabic required'),
            'text_third_section.en.required' => __('Contect third Section English required'),
        ];
    }
}
