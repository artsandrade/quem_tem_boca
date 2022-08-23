<?php

namespace App\Domains\Restaurant\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
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
    $id = $this->route()->parameter('id');

    return [
      'category' => 'sometimes|required|uuid|exists:categories,id',
      'name' => 'sometimes|required|max:100',
      'corporate_name' => 'sometimes|required|max:100',
      'document' => 'sometimes|required|max:15|unique:restaurants,document,' . $id . ',id,deleted_at,NULL',
      'email' => 'sometimes|required|max:255|email|unique:restaurants,email,' . $id . ',id,deleted_at,NULL',
      'zip_code' => 'sometimes|required|max:10',
      'street' => 'sometimes|required|max:100',
      'complement' => 'nullable|max:100',
      'neighborhood' => 'sometimes|required|max:30',
      'city' => 'sometimes|required|max:50',
      'state' => 'sometimes|required|uf',
      'delivery_time' => 'sometimes|required|integer',
      'delivery_fee' => 'sometimes|required|regex:/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   * 
   * @return array
   */
  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json([
      'message' => $validator->errors()
    ], 422));
  }
}
