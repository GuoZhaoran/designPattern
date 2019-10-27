<?php
/**
 * Description: 学生类观察者
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Student implements SplObserver
{
    public function update(\Splsubject $subject)
    {
        // TODO: Implement update() method.
        if(func_num_args() == 2) {
            $params = func_get_arg(1);
            echo '学生已经收到',$params['name'],'上架的信息','作者:',$params['author'],'定价:',$params['price'],"<br>";
        }
    }
}