<?php

namespace App\Domains\Restaurant\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
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
      'logo' => 'required|image',
      'category' => 'required|uuid|exists:categories,id',
      'name' => 'required|max:100',
      'corporate_name' => 'required|max:100',
      'document' => 'required|max:15|unique:restaurants,document,NULL,id,deleted_at,NULL',
      'email' => 'required|max:255|email|unique:restaurants,email,NULL,id,deleted_at,NULL',
      'zip_code' => 'required|max:10',
      'street' => 'required|max:100',
      'complement' => 'nullable|max:100',
      'neighborhood' => 'required|max:30',
      'city' => 'required|max:50',
      'state' => 'required|uf',
      'delivery_time' => 'required|integer',
      'delivery_fee' => 'required|regex:/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/',
      'user_name' => 'required|max:100',
      'user_email' => 'required|max:255|email|unique:users,email,NULL,id,deleted_at,NULL',
      'user_password' => 'required|min:6|max:255',
      'user_phone' => 'required|celular_com_ddd',
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
