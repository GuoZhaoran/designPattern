<?php
/**
 * Description: File basic description here...
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */
include __DIR__.'/PdoDB.php';
include __DIR__.'/Users.php';

//对数据进行迭代
$users = new Users();
foreach($users as $user) {
    var_dump($user);
}