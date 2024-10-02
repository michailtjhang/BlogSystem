<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'img' => 'required|image|file|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'status' => 'required',
            'published_date' => 'required',
        ];
    }
}
