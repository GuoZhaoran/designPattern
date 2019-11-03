<?php
/**
 * Description: 推荐系统版本1
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class concreteRecommendFactoryV1 extends recommendFactory
{
    public function createRecommendClass($sex) {
        switch ($sex) {
            case 'man':
                return new concreteRecommendClassV1man();
            case 'women':
                return new concreteRecommandClassV1women();
        }
    }
}