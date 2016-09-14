<?php
/**
 * Created by PhpStorm.
 * User: zeta
 * Date: 15/09/2016
 * Time: 01:51
 */

namespace App\Helpers\Reply;


use Illuminate\Support\ServiceProvider;

class ReplyServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->singleton('reply', Reply::class);
    }
}