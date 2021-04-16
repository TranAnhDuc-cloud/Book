<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'username'=>'required|string|min:3|max:10',
            'email'=>'required|string|email|unique:user',
            'passwrod'=>'required|min:1|max:10',
            'password_confirmed'=>'required|same:password',
            'firt_name'=>'required|string|',
            'last_name'=>'required|string',
            'data_joined'=>'required|date',
            'address'=>'required|string',

        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'username is required',
            'username.min'=>'username is min = 3',
            'username.max'=>'username is max = 10',
            'email.required'=>'Email is required',
            'email.email'=>'Wrong email format
            ',
            'passwrod.required'=>'passwrod is required',
            'passwrod.min'=>'passwrod is min = 1',
            'password_confirmed.required'=>'password_confirmed is required',
            'password_confirmed.same'=>'password_confirmed not macth',
            'firt_name.required'=>'FirtName is required',
            'last_name.required'=>'LastName is required',
            'data_joined.required'=>'Data Joined is required',
            'address.required'=>'Addred is required'
        ];
    }
}
