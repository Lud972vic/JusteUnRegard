<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nom' => 'required|min:5|max:45|alpha',
            'email' => 'required|email',
            'texte' => 'required|max:5000',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11'
        ];
    }
}
