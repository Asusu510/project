<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Keyword;
use App\Models\Slide;

use Illuminate\Support\Facades\View; // view share

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
    
        $categories = Category::where('c_status','1')->orderBy('c_name','asc')->get();
        View::share('categories', $categories);

        $colors = Color::orderBy('cl_name', 'asc')->get();
        View::share('colors', $colors);

        $sizes = Size::orderBy('sz_name', 'desc')->get();
        View::share('sizes', $sizes);

        $keywords = Keyword::orderBy('k_name', 'asc')->get();
        View::share('keywords', $keywords);
        
        $slides = Slide::where('sd_status',1)
            ->orderBy('sd_sort','asc')->get();
        View::share('slides', $slides);
            
        
    }
}
