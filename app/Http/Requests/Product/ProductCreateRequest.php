<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required',
            'user_id' => 'required|numeric| unique:products,user_id',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ];
    }



    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([
            'message'   => 'Validation Errors',
            'error'      => $validator->errors()
        ]));
    }
}
