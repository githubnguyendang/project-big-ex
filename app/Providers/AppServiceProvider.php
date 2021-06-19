<?php

namespace App\Providers;

use App\Helper\CartHelper;
use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Http\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use App\Models\Slider;

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
        View::composer('*',function($view){
           $view->with([
               'category' => Category::where('parent_id',0)->get(),
               'slider_main' => $slider = Slider::where('status',0)->get(),
               'cart' => new CartHelper(),
           ]);
        });

        View::composer('back-end.master',function($view){
            $view->with([
                'cout_order' => Order::where('status','1')->count(),
            ]);
        });
    }
}
