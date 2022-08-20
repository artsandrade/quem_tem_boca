<?php

namespace App\Providers;

use App\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class DomainRouteServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    parent::boot();
    $this->registerDomainRoutes();
  }

  public function registerDomainRoutes()
  {
    if (!file_exists(base_path('app/Domains'))) {
      return;
    };

    Route::group(['domain' => env('APP_DOMAIN_API')], function () {
      $domains = array_diff(scandir(base_path('app/Domains')), array('.', '..'));

      foreach ($domains as $domain) {
        $dirPath = base_path('app/Domains/') . $domain;

        if (!is_dir($dirPath)) {
          continue;
        }

        $dirs = array_diff(scandir(base_path('app/Domains/' . $domain)), array('.', '..'));
        $routesDirExists = in_array('Routes', $dirs);
        if (!$routesDirExists) {
          Log::info("$domain Domain missing routes directory. Can't register routes");
          continue;
        }

        $domainRouteFiles = array_diff(scandir(base_path('app/Domains/' . $domain . '/Routes')), array('.', '..'));
        foreach ($domainRouteFiles as $file) {
          Route::namespace($this->namespace)
            ->group(base_path('app/Domains/' . $domain . '/Routes/' . $file));
        }
      }
    });
  }
}
