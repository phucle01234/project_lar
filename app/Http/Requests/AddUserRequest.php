<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'       => 'required|email|unique:user', //unique:user: phải là email duy nhất
            'fullname'    => 'required|max:255',
            'password'    => 'required|min:6|max:255|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'email'    => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu nhập lại ',
            'fullname'     => 'Tên đầy đủ '
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute phải bắt buộc.',
            'email'    => ':attribute phải định dạng email.',
            'min'      => ':attribute phải ít nhất :min kí tự.',
            'max'      => ':attribute tối đa :max kí tự.',
            'unique'   => ':attribute đã được sử dụng.',
            'confirmed'   => 'Xác nhận :attribute không khớp.'

        ];
    }
}
