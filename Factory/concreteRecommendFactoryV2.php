<?php
/**
 * Description: 推荐系统版本2
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class concreteRecommendFactoryV2 extends recommendFactory
{
    public function createRecommendClass():concreteRecommendClassV2 {
        return new concreteRecommendClassV2();
    }
}