<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            //記述する場所によって変わりそう。
            'username' => 'required|unique:users,username|min:2|max:12',
            'mail' =>  'required|unique:users,mail|email|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20',
            'password_confirmation' => 'required|alpha_num|min:8|max:20|same:password',
            // $this->validate($request, $rules);
            //
        ];
    }
}
