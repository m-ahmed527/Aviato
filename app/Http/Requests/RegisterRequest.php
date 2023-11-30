<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',

        ];
    }
    public function sanitized()
    {
        return
            [
                'slug' => $this->SpaceToUnderscore(strtolower($this->name)),
                'name'=> $this->name,
                'last_name'=> $this->last_name,
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
            ];
    }

    public function SpaceToUnderscore(string $name)
    {
        $slug='';
        for($v = 0; $v < strlen($name);$v++ )
        {
            $slug.= ($name[$v]==' ') ? '_' : $name[$v];
        }
        return $slug;

    }


}
