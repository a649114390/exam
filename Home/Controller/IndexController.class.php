<?php
namespace Home\Controller;
use GatewayWorker\Gateway;

use Think\Controller;
class IndexController extends Controller {
    public function index(){
//        send_cmd('6666666');
        $str = '   0xa5  0x5a  0x6a  0x00  0x01 0x00 0x00 0x00 0x01   0x00 0x00  0x00  0x0a  0x00 0x00  0x00  0x01 0x00   0x00  ';
        $str = str_replace(array('0x',' ',"\n\r\t"), '', $str);
        dump($str);
//        $arr = array(2,1,1,2,2,2,4);
//        $str = 'a55a060001000f20150722131615000102030412345678ff';
//        0 4  4 4  8 16  24 8 32 8
//        dump(substr(substr($str, 6), 0,-2));

//        $cmd_arr = cmd_resolve($str, $arr);
//        dump($cmd_arr);
        $this->display();

    }
}