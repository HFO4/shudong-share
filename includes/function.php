<?php
function curl_post($url, $post) {  
    $options = array(  
        CURLOPT_RETURNTRANSFER => true,  
        CURLOPT_HEADER         => false,  
        CURLOPT_POST           => true,  
        CURLOPT_POSTFIELDS     => $post,  
    );  
  
    $ch = curl_init($url);  
    curl_setopt_array($ch, $options);  
    $result = curl_exec($ch);  
    curl_close($ch);  
    return $result;  
}  
  
function inject_check($Sql_Str) {
    $check=preg_match('/select|insert|update|delete|\'|\\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i',$Sql_Str);
    if ($check) {
   return "bad";
   echo"SQL checking failed";
   exit();
    }else{
        return "ok";
    }
}
function con_sql($sqlip,$sqlid,$sqlpass) {
@$con = new mysqli($sqlip,$sqlid,$sqlpass);

if(mysqli_connect_errno())
{
    die( mysqli_connect_error());
}


}
function get_real_ip(){
$ip=false;
if(!empty($_SERVER["HTTP_CLIENT_IP"])){
$ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
for ($i = 0; $i < count($ips); $i++) {
if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
$ip = $ips[$i];
break;
}
}
}
return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

class PageTool {

    protected $total = 0;

    protected $perpage = 6;

    protected $page = 1;

    public function __construct($total,$page=false,$perpage=false) {

        $this->total = $total;

        if($perpage) {

            $this->perpage = $perpage;

        }

        if($page) {

            $this->page = $page;

        }

    }

   // 创建分页导航

    public function show() {

        $cnt = ceil($this->total/$this->perpage);  // 得到总页数

        $uri = $_SERVER['REQUEST_URI'];

        $parse = parse_url($uri);

        $param = array();

        if(isset($parse['query'])) {

            parse_str($parse['query'],$param);

        }

       // 不管$param数组里,有没有page单元,都unset一下,确保没有page单元,

        // 即保存除page之外的所有单元

        unset($param['page']);

        $url = $parse['path'] . '?';

        if(!empty($param)) {

            $param = http_build_query($param);

            $url = $url . $param . '&';

        }

       // 计算页码导航

        $nav = array();

        $nav[0] = ' <li><a href="#">' . $this->page . '</a> </li>';

        for($left = $this->page-1,$right=$this->page+1;($left>=1||$right<=$cnt)&&count($nav) <= 5;) {

            if($left >= 1) {

                array_unshift($nav,'  <li><a href="' . $url . 'page=' . $left . '">' . $left . '</a></li>');

                $left -= 1;

            }

            if($right <= $cnt) {

                array_push($nav,' <li><a href="' . $url . 'page=' . $right . '">' . $right . '</a></li>');

                $right += 1;

            }

        }

        return implode('',$nav);

    }

}
function user_shell($uid,$shell,$con){
    $sql="select * from sd_user where `id` = '$uid'";
    $query=mysqli_query($con,$sql);
    $us=is_array($row=mysqli_fetch_assoc($query));

    $shell=$us ? $shell==md5($row[username].$row[pwd].'sdshare'):FALSE;
    if($shell){
     return $row;
    }else{
   return'bad';
    }
  }
  
  
  function user_check($uid,$shell,$con){
    $sql="select * from sd_users where `uid` = '$uid'";
    $query=mysqli_query($con,$sql);
    $us=is_array(@$row=mysqli_fetch_assoc($query));

    $shell=$us ? $shell==md5($row[username].$row[pwd].'sdshare'):FALSE;
    if($shell){
     return $row;
     $isVisitor = "false";
    }else{
      return "bad";
      $isVisitor = "true";
    }
  }
  
  function get_zip_originalsize($filename, $path) {
 //先判断待解压的文件是否存在
 if(!file_exists($filename)){
  die("bad.更新文件不存在或者无权写入");
 } 
 $starttime = explode(' ',microtime()); //解压开始的时间


 //打开压缩包
 $resource = zip_open($filename);
 $i = 1;
 //遍历读取压缩包里面的一个个文件
 while ($dir_resource = zip_read($resource)) {
  //如果能打开则继续
  if (zip_entry_open($resource,$dir_resource)) {
   //获取当前项目的名称,即压缩包里面当前对应的文件名
   $file_name = $path.zip_entry_name($dir_resource);
   //以最后一个“/”分割,再用字符串截取出路径部分
   $file_path = substr($file_name,0,strrpos($file_name, "/"));
   //如果路径不存在，则创建一个目录，true表示可以创建多级目录
   if(!is_dir($file_path)){
    mkdir($file_path,0777,true);
   }
   //如果不是目录，则写入文件
   if(!is_dir($file_name)){
    //读取这个文件
    $file_size = zip_entry_filesize($dir_resource);
    //最大读取6M，如果文件过大，跳过解压，继续下一个
   
     $file_content = zip_entry_read($dir_resource,$file_size);
     file_put_contents($file_name,$file_content);
    
   }
   //关闭当前
   zip_entry_close($dir_resource);
  }
 }
 //关闭压缩包
 zip_close($resource); 
 $endtime = explode(' ',microtime()); //解压结束的时间
 $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
 $thistime = round($thistime,3); //保留3为小数
return "ok";
}
?>