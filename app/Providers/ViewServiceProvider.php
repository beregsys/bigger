<?php

namespace App\Providers;

use App\Http\ViewComposers\SidebarMenuViewComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if(Schema::hasTable('tactics'))
        {
            View::composer(['pages.tactics.*', 'components.sidebar'], SidebarMenuViewComposer::class);
        }
    }
}
