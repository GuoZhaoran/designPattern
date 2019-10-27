<?php
/**
 * Description: 推荐类版本1具体实现
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class concreteRecommendClassV1 extends recommendClass
{
    private function recommendCoat() {
        return '吉普夹克';
    }
    private function recommendPants() {
        return 'LEVI’S裤子';
    }
    public function recommendRun() {
        return '推荐'.$this->recommendCoat().'和'.$this->recommendPants();
    }
}