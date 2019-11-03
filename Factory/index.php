<?php
/**
 * Description: 入口文件
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */
include './recommendClass.php';
include './concreteRecommendClassV1man.php';
include './concreteRecommendClassV2man.php';
include './concreteRecommandClassV1women.php';
include './concreteRecommendClassV2women.php';
include './recommendFactory.php';
include './concreteRecommendFactoryV1.php';
include './concreteRecommendFactoryV2.php';

$sex = $_GET['sex'];
$version = $_GET['version'];

switch ($version) {
    case 'version1' :
        $factory = new concreteRecommendFactoryV1();
        break;
    case 'version2' :
        $factory = new concreteRecommendFactoryV2();
}

$recommendClass = $factory->createRecommendClass($sex);
$recommendContent = $recommendClass->recommendRun();
echo $recommendContent.'<br/>';

