<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdocutRequest extends FormRequest
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
            'code'=>'required',
            'name'=>'required',
            'price'=>'required',
        ];
    }

    public function sanitized(){
        return
        [
            'code'=>$this->code,
            'name'=>$this->name,
            'price'=>$this->price,
            'slug'=>str_replace(' ','_',strtolower($this->name)),
        ];

    }
}
