<?php

namespace App\Exceptions;

use App\Traits\HttpResponse;
use Exception;
use Illuminate\Http\JsonResponse;

class JsonException extends Exception
{
  use HttpResponse;
  /**
   * Render an exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request  $request
   *
   * @throws \Throwable
   */
  public function render(\Illuminate\Http\Request $request)
  {
    /* return new JsonResponse([
      'message'=>$this->getMessage()
    ], $this->getCode()); */
    return $this->response($this->getMessage(), $this->getCode());
  }
}
