<?php
/**
 * Description: 装饰类,继承了Component,从外类来扩展Component类的功能。
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

abstract class AbstractDecorator implements AbstractComponent
{
    public function initCategory() {}
    public function addCategory(array &$dishes, Closure $next) {}
}