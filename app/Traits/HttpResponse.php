<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

use function response;

trait HttpResponse
{
  public function response($content, int $status): JsonResponse
  {
    return response()->json([
      'message' => $content
    ], $status);
  }
}
