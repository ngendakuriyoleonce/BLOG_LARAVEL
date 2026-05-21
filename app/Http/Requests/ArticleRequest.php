<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class ArticleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255',
'description'=>'required|string',
'category'=>'required|string|max:255',
'image'=>'nullable|image|mimes:jpeg,jpg,png,gif,tiff,raw,webp,heif,heic,bmp,svg|max:2048',
        ];
    }
    #[Override]
    public function messages()
    {
        return [
            'title.required'=>"Fill title"
        ];
    }
}
