<?php
/**
 * Description: 饮料装饰器,为菜品添加类
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class DrinkDecorator  extends AbstractDecorator
{
    private function initCategory()
    {
        return ['雪碧', '可乐', '酸梅汤'];
    }

    public function addCategory(array &$dishes,Closure $next)
    {
        $dishes[] = $this->initCategory();
        return $next($dishes);
    }
}