<?php

namespace App\Http\Requests\Regency;

use Illuminate\Foundation\Http\FormRequest;

class AddRegencyRequest extends FormRequest
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
            'name_cv'     => 'required|unique:regency',
        ];
    }

    public function attributes()
    {
        return [
            'name_cv'    => 'Tên chức vụ', 
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute phải bắt buộc.',
            'unique'   => ':attribute đã tồn tại.',
        ];
    }
}
