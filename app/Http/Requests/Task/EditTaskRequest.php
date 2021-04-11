<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class EditTaskRequest extends FormRequest
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
            'name_da'     => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name_da'    => 'Dự án', 
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute phải bắt buộc.',
        ];
    }
}
