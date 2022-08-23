<?php

namespace App\Domains\Category\Requests;

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
      'name' => 'sometimes|required|max:100|unique:categories,name,' . $id . ',id,deleted_at,NULL',
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
