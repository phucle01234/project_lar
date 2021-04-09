<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class AddDepartmentRequest extends FormRequest
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
            'name_pb'     => 'required|unique:department',
        ];
    }

    public function attributes()
    {
        return [
            'name_pb'    => 'Phòng ban', 
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
