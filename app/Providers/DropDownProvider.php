<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class DropDownProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){
            $view->with('product_array',DB::table('products')->where('is_deleted','=',0)->get());
            });
            view()->composer('*',function($view){
                $view->with('client_array',DB::table('clients')->where('client_type','=','client')->where('is_deleted','=',0)->get());
                });
                view()->composer('*',function($view){
                    $view->with('purchase_array',DB::table('purchase')->where('is_deleted','=',0)->get());
                    });
                    view()->composer('*',function($view){
                        $view->with('sale_array',DB::table('sales')->where('is_deleted','=',0)->get());
                        });
                        view()->composer('*',function($view){
                            $view->with('vendor_array',DB::table('clients')->where('client_type','=','vendor')->where('is_deleted','=',0)->get());
                            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
