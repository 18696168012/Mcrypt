<?php
    session_start();
    $key=md5('77 public drop-shadow Java');
    $data='rosebud';
    //打开加密算子 
    $m=mcrypt_module_open('rijndael-256','','cbc','');
    //创建初始化向量
    $iv=mcrypt_create_iv(mcrypt_enc_get_iv_size($m),MCRYPT_DEV_RANDOM);
    //var_dump($iv);
    //加密初始化
    mcrypt_generic_init($m, $key, $iv);
    $data=mcrypt_generic($m, $data);
   // echo mcrypt_end_get_key_size($m);
    //进行必要的清理
    mcrypt_generic_deinit($m);
    mcrypt_module_close($m);
    //将数据保存到会话中
    $_SESSION['thing1']=base64_encode($data);
    $_SESSION['thing2']=base64_encode($iv);
    var_dump($_SESSION);
    echo '<p>The data has been stored. Its value is '.base64_encode($data).'</p>';