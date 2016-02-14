<?php
$re = "ok.ok";
$ftype = $_POST['ftype'];
$replace = array(
    '/',
    '&',
    '.',
    ' '
);
$fname = str_replace($replace, "", $_POST['fname']);
$rname = $_POST['fname'];
$fkey = $_POST['fkey'];
if (mb_strwidth($fname) >= 40) {
    echo "p.bad.文件名不能超过40个字符";
    exit();
}
require_once ("../config.php"); //引入配置文件
require_once ('function.php'); //引入函数库
require_once ('connect.php'); //引入函数库
require_once('userShell.php');
date_default_timezone_set("Asia/Shanghai"); //设置时区
//error_reporting(0); //设置错误级别0
if ($fname == "") {
    $jieguo = "p.bad.文件名不能为空";
} else {
    $result = mysqli_query($con,"SELECT * FROM sd_setting"); //获取数据
    while ($row = mysqli_fetch_assoc($result)) {
        $zzurl = $row['zzurl'];
    }
    $dd = date('Y-m-d H:i:s'); //获取当前时间
    $ran = md5(time() . mt_rand(0, 1000)); //生成随机字符
    $rand = preg_split('//', $ran, -1, PREG_SPLIT_NO_EMPTY);
    $pkey = $rand[0] . $rand[1] . $rand[2] . $rand[3] . $rand[4];
    $uid = $userInfo['uid'];
    if ($ftype == "open") {
        $sql = "INSERT INTO  `$sqlname`.`sd_ss` (`sskey` ,`filekey` ,`sstime` ,`downloadnum` ,`fname`,`cuser`)VALUES ('$pkey', '$fkey', '$dd', '0' ,?, '$uid');";
        if (!$con) {
            $re = "bad.数据库连接失败";
        } else {
            $stmt = $con->prepare($sql);
            $stmt->bind_param('s', $rname);
            $stmt->execute();
        }
        $jieguo = $ftype . "." . $re . "." . "f.php?k=" . $pkey;
    } else if ($ftype == "lock") {
        $passwd = $rand[6] . $rand[7] . $rand[8] . $rand[9];
        $sql = "INSERT INTO  `$sqlname`.`sd_sskey` (`sskey` ,`filekey` ,`sstime` ,`downloadnum` ,`fname` ,`passwd` ,`cuser`)VALUES ('$pkey', '$fkey', '$dd', '0' ,? ,'$passwd','$uid');";
        if (!$con) {
            $re = "bad.数据库连接失败";
        } else {

            $stmt = $con->prepare($sql);
            $stmt->bind_param('s', $rname);
            $stmt->execute();
        }
        $jieguo = $ftype . "." . $re . "." . $passwd . "." . "s.php?k=" . $pkey;
    }
}
echo $jieguo;
?>