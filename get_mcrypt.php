<?php
    header('content-type:text/html;charset=utf-8');
    session_start();
    var_dump($_SESSION);
    if(isset($_SESSION['thing1'],$_SESSION['thing2'])){
        $key=md5('77 public drop-shadow Java');
        //打开加密算子
        $m=mcrypt_module_open('rijndael-256','', 'cbc', '');
        //读出初始化向量
        $iv=base64_decode($_SESSION['thing2']);
        //初始化
        mcrypt_generic_init($m, $key, $iv);
        //解密
        $data=mdecrypt_generic($m, base64_decode($_SESSION['thing1']));
        //进行必要的清理
        mcrypt_generic_deinit($m);
        mcrypt_module_close($m);
        var_dump(trim($data));
    }else{
        echo '不存在!';
    }
    
    