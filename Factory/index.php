<?php
/**
 * Description: 入口文件
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */
include './recommendClass.php';
include './concreteRecommendClassV1.php';
include './concreteRecommendClassV2.php';
include './recommendFactory.php';
include './concreteRecommendFactoryV1.php';
include './concreteRecommendFactoryV2.php';


$factory1 = new concreteRecommendFactoryV1();
$recommendClassV1 = $factory1->createRecommendClass();
$recommendContent = $recommendClassV1->recommendRun();
echo $recommendContent.'<br/>';

$factory2 = new concreteRecommendFactoryV2();
$recommendClassV2 = $factory2->createRecommendClass();
$recommendContent = $recommendClassV2->recommendRun();
echo $recommendContent;

