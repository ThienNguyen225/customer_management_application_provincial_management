<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:email',
            'dob' => 'required|date',
            'city_id' => 'required',
            'image' => 'required|image'
            ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Không được để trống',
          'name.max' => 'Không quá 255 ký tự',
          'dob.required' => 'Không được để trống',
          'dob.date' => 'Sai định dạng',
          'city_id.required' => 'Không được để trống',
          'image.required' => 'Không được để trống',
          'image.image' => 'Sai định dạng'
        ];
    }
}
