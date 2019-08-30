<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Cita;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      if(DB::getSchemaBuilder()->hasTable('citas')){
        $citas_por_vencer = Cita::where('fecha', '>=', Carbon::today()->format('Y-m-d'))
        ->where('fecha', '<=', Carbon::today()->addDays(7)->format('Y-m-d'))->get();
        view()->share('citas_por_vencer', $citas_por_vencer);

        Cita::where('fecha', '<=', Carbon::yesterday()->format('Y-m-d'))->delete();
        // DB::table('citas')->where('fecha', '<', Carbon::today())->delete();
      }

      Schema::defaultStringLength(191);
      Carbon::setLocale(config('app.locale'));

      setlocale(LC_TIME, 'es_ES.UTF-8');
    }
}
