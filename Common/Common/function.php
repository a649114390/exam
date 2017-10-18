<?php
/**
 * Created by PhpStorm.
 * User: llz
 * Date: 17-10-9
 * Time: 下午12:10
 */


/**
 *  主动向充电桩发送信息
 * @param $str
 */
function send_cmd($str){
    vendor('GatewayClient.Gateway');
    /**
     *====这个步骤是必须的====
     *这里填写Register服务的ip（通常是运行GatewayWorker的服务器ip）和端口
     *注意Register服务端口在start_register.php中可以找到（chat默认是1236）
     *这里假设GatewayClient和Register服务都在一台服务器上，ip填写127.0.0.1
     **/
    \GatewayClient\Gateway::$registerAddress = '127.0.0.1:1238';

//  以下是调用示例，接口与GatewayWorker环境的接口一致
//  注意除了不支持sendToCurrentClient和closeCurrentClient方法
//  其它方法都支持
    \GatewayClient\Gateway::sendToAll($str);
}

/**
 * 计算校验和
 * @param $str
 * @return bool|string
 */
function create_sum($str){
    $arr = str_split($str,2);
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sum += '0x' . $arr[$i];
    }
    return substr(dechex($sum),-2);
}

function cmd_resolve($str,$arr){
    $cmd_arr = array();
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($i === 0){
            $cmd_arr[] = substr($str, 0, $arr[0]*2);
        }else{
            $sum +=  $arr[$i - 1]*2;
            $cmd_arr[] = substr($str, $sum, $arr[$i]*2);

        }
    }
    return $cmd_arr;

}