<?php
/**
 * Description: 入口文件
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */
error_reporting(-1);
ini_set('display_errors', 'on');

include __DIR__.'/AbstractComponent.php';
include __DIR__.'/AbstractDecorator.php';
include __DIR__.'/ConcreteComponent.php';
include __DIR__.'/DrinkDecorator.php';
include __DIR__.'/ChivesDecorator.php';

//将用户选好的套餐排列组合
$output = function ($dishes) {
    $items = [];
    $init = array_shift($dishes);
    foreach($init as $item) {
        $items[] = [$item];
    }
    do{
        $elements = array_shift($dishes);
        $temp = [];
        foreach($elements as $element) {
            foreach($items as $item) {
                $item[] = $element;
                $temp[] = $item;
            }
        }
        $items = $temp;
    } while(count($dishes));

    return $items;
};

//组合函数,将装饰器函数一层层包装
function combinationFunc()
{
    return function($stack, $decorators){
        return function (&$dishes) use ($stack, $decorators) {
            return $decorators->addCategory($dishes, $stack);
        };
    };
}

$dishes = [];
$baseCategory = (new ConcreteComponent())->addCategory($dishes, $output);

print '加荤菜后的套餐组合<br/>';
//添加饮料后的套餐
$addCategoryDecorators = [new DrinkDecorator(), new ChivesDecorator()];
$go = array_reduce(array_reverse($addCategoryDecorators), combinationFunc(), $baseCategory);

var_dump($go($dishes));