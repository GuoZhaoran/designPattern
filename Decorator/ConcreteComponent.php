<?php
/**
 * Description: 具体的对象
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class ConcreteComponent implements AbstractComponent
{
    public function addCategory(array &$dishes, Closure $next)
    {
        return function(&$dishes) use ($next) {
            $dishes[] = ['米饭', '馒头'];
            $dishes[] = ['土豆丝', '番茄鸡蛋', '炒豆角'];

            return $next($dishes);
        };
    }
}