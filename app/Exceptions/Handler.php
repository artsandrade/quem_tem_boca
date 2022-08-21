<?php

namespace App\Exceptions;

use App\Traits\HttpResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use HttpResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (ModelNotFoundException $e, \Illuminate\Http\Request $request) {
            if ($request->wantsJson()) {
                return $this->response('Object not found.', 404);
            }
        });

        $this->renderable(function (QueryException $e, \Illuminate\Http\Request $request) {
            return $this->response('Internal error.', 500);
        });

        $this->renderable(function (BindingResolutionException $e, \Illuminate\Http\Request $request) {
            return $this->response('Internal error.', 500);
        });

        $this->renderable(function(MethodNotAllowedHttpException $e, \Illuminate\Http\Request $request){
            return $this->response('The request is invalid.', 500);
        });
    }
}
