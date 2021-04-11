<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'       => 'required|email',
            'fullname'    => 'required|max:255',
            //ss
            'password'    => 'max:255|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'email'    => 'Địa chỉ email',
            'fullname'     => 'Tên đầy đủ ',
            //s
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu nhập lại ',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute phải bắt buộc.',
            'email'    => ':attribute phải định dạng email.',
            'max'      => ':attribute tối đa :max kí tự.',
            //s
            // 'min'      => ':attribute phải ít nh ất :min kí tự.',
            'confirmed'   => 'Xác nhận :attribute không khớp.'
        ];
    }
}
