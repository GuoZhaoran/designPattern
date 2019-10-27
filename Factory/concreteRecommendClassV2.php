<?php
/**
 * Description: 推荐类版本2实现
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class concreteRecommendClassV2 extends recommendClass
{
    private function recommendCoat() {
        return '吉普夹克';
    }
    private function recommendShoes() {
        return '小白碎扣AJ';
    }
    private function recommendHat() {
        return '尔苗帽子';
    }

    public function recommendRun() {
        return '推荐'.$this->recommendCoat().'和'.$this->recommendShoes().'以及'.$this->recommendHat();
    }
}