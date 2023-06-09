<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectionRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'city' => 'required|unique:directions,city_id',
            'text' => 'required|min:15',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
        ];
    }
}
