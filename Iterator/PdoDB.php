<?php
/**
 * Description: 简单的数据库查询PDO
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class PdoDB
{
    private static $conn = null;

    //禁止被实例化
    private function __construct()
    {
    }

    private static function connDB()
    {
        return new PDO('mysql:host=localhost;sort=3306;dbname=study;', 'root', 'root');
    }

    /**
     * 获取数据库连接单例
     * @return null|PDO
     */
    public static function getInstance()
    {
        if (is_null(self::$conn)) {
            self::$conn = self::connDB();
        }
        return self::$conn;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
        echo 'error!';
    }
}