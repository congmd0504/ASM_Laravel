<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $id = $this->route('product')->id;
        return [
            'name'          => 'required|unique:products,name,'.$id,
            'price'         =>'required|min:1',
            'weight'        =>'nullable|integer',
            'quality'       => 'required|integer|min:1',
            'description'   =>'required|max:255',
            'content'       =>'required',
            'category_id'   => 'required',
            'image'         =>'nullable|image'
        ];
    }
}
