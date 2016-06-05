<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
      <meta name="renderer" content="webkit" /> 

    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?> - 树洞外链管理中心</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
          <script type="text/javascript" src="js/bootstrap.min.js"></script> 

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->


      <link rel="stylesheet" href="css/iosOverlay.css" /> 
    <script type="text/javascript" src="js/iosOverlay.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
</head>
  <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">树洞外链管理面板</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
            
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> 面板首页</a>
                        </li>
                                                <li>
                            <a href="setting.php"><i class="fa fa-wrench fa-fw"></i> 设置</a>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-upload fa-fw"></i> 上传设置<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="policy.php">上传方案</a>
                                </li>
                                <li>
                                    <a href="add_policy.php">添加上传方案</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                                                <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> 用户相关<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="user.php?s=10&page=1">用户管理</a>
                                </li>
                                <li>
                                    <a href="usergroup.php?s=10&page=1">用户组</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> 内容管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="file.php">文件管理</a>
                                </li>
                                <li>
                                    <a href="share.php">分享管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="themes.php"><i class="fa fa-leaf fa-fw"></i> 主题风格</a>
                        </li>
                        
                       <li>
                            <a href="#"><i class="fa fa-send fa-fw"></i> 其他<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="cleanup.php">清理优化</a>
                                </li>
                                <li>
                                    <a href="upgrade.php">在线升级</a>
                                </li>
                                <li>
                                    <a href="http://yun.aoaoao.me/" target="new">官方网站</a>
                                </li>
                                <li>
                                    <a href="http://yun.aoaoao.me/buy.php" target="new">获取商业授权</a>
                                </li>
                                    <li>
                                    <a href="about.php">关于</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
