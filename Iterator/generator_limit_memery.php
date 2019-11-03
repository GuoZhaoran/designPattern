<?php
/**
 * Description: 限制但进程内存耗尽
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-31
 */
/*function func1()
{
    foreach (range(0, 10000000) as $value) {
        echo $value;
    }
}

func1();*/

function func1()
{
    foreach (range(0, 10000000) as $value) {
        yield $value;
    }
}

var_dump(func1());
foreach (func1() as $value) {
    echo $value;
}