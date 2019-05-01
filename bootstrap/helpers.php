<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23
 * Time: 23:54
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}