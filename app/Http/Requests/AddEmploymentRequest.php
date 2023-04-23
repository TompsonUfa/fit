<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmploymentRequest extends FormRequest
{
    public $itsVideo ;
    public $media;
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
        if (empty($this->file)) {
            $validFile = 'required|mimes:jpg,png,jpeg,gif,webp,svg,mp4';
        } else {
            $this->itsVideo = str_contains($this->file->getMimeType(), 'video');
            if ($this->itsVideo) {
                $validFile = 'required|mimes:mp4| max:20000';
                $this->media = "video";
            } else {
                $validFile = 'required|mimes:jpg,png,jpeg,gif,webp,svg|max:2048';
                $this->media = "img";
            }
        }
        return [
            'title' => 'required|min:5|max:100',
            'file' => $validFile,
        ];
    }
}
