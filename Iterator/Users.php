<?php
/**
 * Description: 迭代类
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Users implements Iterator
{
    protected $data;
    protected $index;

    public function __construct()
    {
        $this->data = PdoDB::getInstance()->query('select * from users')->fetchAll();
    }

    public function current()
    {
        $current = $this->data[$this->index];

        return $current;
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return $this->index < count($this->data);
    }

    public function rewind()
    {
        $this->index = 0;
    }
}