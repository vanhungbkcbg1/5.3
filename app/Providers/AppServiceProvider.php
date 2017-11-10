<?php

namespace App\Providers;

use Ehann\RediSearch\Index;
use Ehann\RediSearch\Redis\RedisClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class LaravelLoggerProxy {
	public function log( $msg ) {
		Log::info($msg);
	}
}


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    $pusher = $this->app->make('pusher');
	    $pusher->set_logger( new LaravelLoggerProxy() );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Repository\IRepository','App\Repository\PostRepository');
	    $this->app->singleton('Sinhvien',function(){

		    $obj=new \stdClass();
		    $obj->name='vanhung';
		    return $obj;
	    });

	    $this->app->singleton('bookClient',function(){
		    $redis_client=new RedisClient($redis = 'Predis\Client', $hostname = '192.168.99.100', $port = 6379, $db = 0, $password = null);
		    $bookIndex = new Index($redis_client,'hello');

		    $bookIndex->addTextField('title')
			    ->addTextField('author')
			    ->addNumericField('price')
			    ->addNumericField('stock')
			    ->create();
		    return $bookIndex;
	    });
    }
}
