<?php
/**
 * Description: 抽象接口，真实对象和装饰对象具有相同的接口
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

interface AbstractComponent{
    public function addCategory(array &$dishes, Closure $next);
}