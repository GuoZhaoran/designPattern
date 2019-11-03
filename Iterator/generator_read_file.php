<?php
/**
 * Description: 生成器读取超大文件
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */
header("content-type:text/html;charset=utf-8");

/*$startMemory = memory_get_usage();
$value = file_get_contents('./test.txt');
$useMemory = memory_get_usage() - $startMemory;
echo '一共占用了',$useMemory,'字节内存';*/

function readTxt()
{
    $handle = fopen('./test.txt', 'rb');

    while (feof($handle)===false) {
        yield fgets($handle);
    }

    fclose($handle);
}

$startMemory = memory_get_usage();
foreach (readTxt() as $key => $value) {
   $lineData = $value;
}

$useMemory = memory_get_usage() - $startMemory;
echo '一共占用了',$useMemory,'字节内存';



