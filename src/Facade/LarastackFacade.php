<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/19/18
 * Time: 11:32 PM
 */

namespace Adesubomi\Larastack\Facade;


use Illuminate\Support\Facades\Facade;

class LarastackFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'larastack';
    }
}