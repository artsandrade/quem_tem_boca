<?php

namespace App\Domains\User\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAddressRequest extends FormRequest
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
      'zip_code' => 'sometimes|required|max:10',
      'street' => 'sometimes|required|max:100',
      'complement' => 'nullable|max:100',
      'neighborhood' => 'sometimes|required|max:30',
      'city' => 'sometimes|required|max:50',
      'state' => 'nullable|max:3',
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
