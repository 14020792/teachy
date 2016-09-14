<?php
/**
 * Created by PhpStorm.
 * User: zeta
 * Date: 15/09/2016
 * Time: 01:50
 */

namespace App\Helpers\Reply;


use Illuminate\Support\Facades\Facade;

class ReplyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'reply';
    }
}