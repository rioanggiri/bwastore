<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $this->user,
            // 'email' => [
            //     'sometimes', 'email', 'unique:users,email,ignore($this->route()->user->id),id',
            // ],
            // 'email' => 'required|email|unique:users',
            // 'email' => [
            //     'sometimes',
            //     'email',
            //     Rule::unique('users', 'email')->ignore(Auth::user()->id, 'id')
            // ],
            //'password' => 'required|min:8|confirmed',
            'roles' => 'nullable|string|in:ADMIN,USER',
        ];
    }
}
