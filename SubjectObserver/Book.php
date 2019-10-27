<?php
/**
 * Description: 订阅与发布模式的实现
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Book implements SplSubject
{
    private $author = null;    //作者
    private $price = null;     //售价
    private $name = null;      //书名

    private $observers = null;

    public function __construct($name, $author, $price)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;

        //初始化观察者为spl对象存储
        $this->observers = new SplObjectStorage();
    }

    /**
     * 添加观察者
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * 删除观察者
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * 通知观察者
     */
    public function notify()
    {
        $params = [
            'name' => $this->name,
            'author' => $this->author,
            'price' => $this->price
        ];

        foreach ($this->observers as $observer) {
            $observer->update($this, $params);
        }
    }
}