<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;

class ManageEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                "category_id" => "required|exists:category,id",
                "title" => "required",
                "thumbnail" => "required|mimes:png,jpg,jpeg",
                "description" => "required",
                "start_date" => "required|date",
                "end_date" => "required|date",
                "location" => "required",
                "time" => "required",
                "stock" => "required|min:0",
                "price" => "required|min:0",
                "eksternal_link" => "nullable",
                "slug" => "required",
            ];
        } else if ($this->isMethod('put')) {
            return [
                'id' => 'required|exists:program,id',
                "category_id" => "required|exists:category,id",
                "title" => "required",
                "thumbnail" => "nullable|mimes:png,jpg,jpeg",
                "description" => "required",
                "start_date" => "required|date",
                "end_date" => "required|date",
                "location" => "required",
                "time" => "required",
                "stock" => "required|min:0",
                "price" => "required|min:0",
                "eksternal_link" => "nullable",
                "slug" => "required",
            ];
        } else {
            return new Exception('method is not allowed');
        }
    }
}
