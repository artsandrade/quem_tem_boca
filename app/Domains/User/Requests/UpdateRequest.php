<?php

namespace App\Domains\User\Requests;

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
    return [
      'name' => 'sometimes|required|max:100',
      'email' => 'sometimes|required|max:255|email|unique:users,email,NULL,id,deleted_at,NULL',
      'password'=>'sometimes|required|min:6|max:255',
      'phone' => 'sometimes|required|celular_com_ddd',
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
