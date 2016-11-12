<?php
/**
 * shudong-share
 * Class:db
 * 数据库操作类
 * @author AaronLiu <abslant@126.com>
 * @author Martan <cytvictor@yeah.net>
 */
 class db {
     /**
      * 数据库连接句柄
      * @var mysqli
      */
     private $conn;

     /**
      * 查询结果
      * @var mysqli_result
      */
     private $Q_result;

     /**
      * 实例化类
      * @param string $dbHost 数据库服务器
      * @param string $dbUser 数据库用户名
      * @param string $dbPass 密码
      * @param string $dbName 数据库名
      * @param int $dbPort 端口
      * @throws Exception
      */
     public function __construct($dbHost,$dbUser,$dbPass,$dbName,$dbPort)
     {

         $dbPort = isset($dbPort) ? $dbPort : 3306;

         $this->conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

         if ($this->conn->connect_error) {
             switch ($this->conn->connect_errno) {
                 case 1044:
                 case 1045:
                     throw new Exception("数据库用户名或密码错误.");
                     break;

                 case 2003:
                     throw new Exception("数据库端口错误");
                     break;

                 case 2005:
                     throw new Exception("数据库地址错误或者数据库服务器不可用");
                     break;

                 default :
                     throw new Exception("连接数据库失败，请检查数据库信息。错误编号：" . $this->conn->connect_errno);
                     break;
             }
         }

         return $this->conn;
     }

     /**
      * 关闭连接句柄
      */
     public function close()
     {
         return $this->conn->close();
     }

     /**
      * 执行查询
      * @param string $sql 要执行的SQL语句
      * @throws Exception
      * @return boolean
      */
     public function Q($sql)
     {

         $this->Q_result = $this->conn->query($sql);

         if (!$this->Q_result) {
             throw new Exception("SQL 查询出错： <b>$sql</b> 中 ".$this->conn->error);
         } else {
             return $this->Q_result;
         }

     }
 }