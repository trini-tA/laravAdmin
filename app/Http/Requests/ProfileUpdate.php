<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Guard;

class ProfileUpdate extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize( Guard $auth ){

        return $auth->user()->hasPermission( 'edit-profile' );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required_with:min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required_with:min:6'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'The user name is required !!!!',
        ];
    }
}
