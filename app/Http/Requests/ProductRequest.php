<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of ProductRequest
 *
 * @author Mahmudul Hasan Khan CSE
 */

class ProductRequest extends FormRequest
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
            //
            'product_name' => 'required|max:200|unique:products,product_name',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'pr_publication_status' => 'required'
        ];
    }
}
