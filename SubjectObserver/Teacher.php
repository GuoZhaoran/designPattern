<?php
/**
 * Description: 教师观察类
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Teacher implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        if(func_num_args() == 2) {
            $params = func_get_arg(1);
            echo '老师已经收到',$params['name'],'上架的信息','作者:',$params['author'],'定价:',$params['price'],"<br/>";
        }
    }
}