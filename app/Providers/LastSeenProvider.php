<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\last_seen;
use Carbon\Carbon;

class LastSeenProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
    public static  function lastSeenUser($user){
       last_seen::where('user_id', $user)->update(['updated_at'=>Carbon::now()]);
    }
}
