<?php
/**
 * Description: 荤菜装饰器,为菜品添加荤菜
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class ChivesDecorator extends AbstractDecorator
{
    public function initCategory()
    {
        return ['回锅肉', '牛排', '羊排'];
    }

    public function addCategory(array &$dishes, Closure $next)
    {
        $dishes[] = $this->initCategory();
        return $next($dishes);
    }
}