
<!--
////////////////////////////////////////////////////////////////////
//                          _ooOoo_                               //
//                         o8888888o                              //
//                         88" . "88                              //
//                         (| ^_^ |)                              //
//                         O\  =  /O                              //
//                      ____/`---'\____                           //
//                    .'  \\|     |//  `.                         //
//                   /  \\|||  :  |||//  \                        //
//                  /  _||||| -:- |||||-  \                       //
//                  |   | \\\  -  /// |   |                       //
//                  | \_|  ''\---/''  |   |                       //
//                  \  .-\__  `-`  ___/-. /                       //
//                ___`. .'  /--.--\  `. . ___                     //
//              ."" '<  `.___\_<|>_/___.'  >'"".                  //
//            | | :  `- \`.;`\ _ /`;.`/ - ` : | |                 //
//            \  \ `-.   \_ __\ /__ _/   .-` /  /                 //
//      ========`-.____`-.___\_____/___.-`____.-'========         //
//                           `=---='                              //
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^        //
//             佛祖保佑       永无故障     永不修改               //
////////////////////////////////////////////////////////////////////
-->
<?php
/**
 * Setup
 *
 * @package WikiDocs
 * @repository https://github.com/Zavy86/wikidocs
 */

// initialize session
session_start();
// errors configuration
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",true);
// definitions
$errors=false;
$configured=false;
$checks_array=array();
// acquire variables
$g_act=($_GET['act'] ?? '');
if(!$g_act){$g_act="setup";}
// include configuration sample
include("datasets/sample.config.inc.php");
// defines constants
define('PATH_URI',explode("setup.php",$_SERVER['REQUEST_URI'])[0]);
// die if configuration already exist
if(file_exists("datasets/config.inc.php")){die("已经安装过了。");}
// make root dir from given path
$original_dir=str_replace("\\","/",realpath(dirname(__FILE__))."/");
$root_dir=substr($original_dir,0,strrpos($original_dir,($_POST['path'] ?? ''))).($_POST['path'] ?? '');
// check action
if($g_act=="check"){
	// reset session setup
	$_SESSION['sxyh']['setup']=null;
	// check setup
	if(file_exists($root_dir."setup.php")){$checks_array['path']=true;}else{$checks_array['path']=false;$errors=true;}
	if(strlen($_POST['title'])){$checks_array['title']=true;}else{$checks_array['title']=false;$errors=true;}
	if(strlen($_POST['avatar'])){$checks_array['avatar']=true;}else{$checks_array['avatar']=false;$errors=true;}
	if(strlen($_POST['name'])){$checks_array['name']=true;}else{$checks_array['name']=false;$errors=true;}
	if(strlen($_POST['grjs'])){$checks_array['grjs']=true;}else{$checks_array['grjs']=false;$errors=true;}
	if(strlen($_POST['github'])){$checks_array['github']=true;}else{$checks_array['github']=false;$errors=true;}
	if(strlen($_POST['editcode']) && $_POST['editcode']===$_POST['editcode_repeat']){$checks_array['editcode']=true;}else{$checks_array['editcode']=false;$errors=true;}
	// set session setup
	if(!$errors){$_SESSION['sxyh']['setup']=$_POST;}
}
// conclude action
if($g_act=="conclude"){
	// build configuration file
	$config="<?php\n";
	$config.="define('DEBUGGABLE',false);\n"; //别动
	$config.="define('PATH',\"".$_SESSION['sxyh']['setup']['path']."\"); //别动 \n";
	$config.="define('TITLE',\"".$_SESSION['sxyh']['setup']['title']."\"); //标题 \n";
	$config.="define('AVATAR',\"".$_SESSION['sxyh']['setup']['avatar']."\"); //头像 \n";
	$config.="define('NAME',\"".$_SESSION['sxyh']['setup']['name']."\");  //昵称 \n";
	$config.="define('GRJS',\"".$_SESSION['sxyh']['setup']['grjs']."\"); //个人介绍 \n";
	$config.="define('GITHUB',\"".$_SESSION['sxyh']['setup']['github']."\"); //github地址 \n";
	$config.="define('ICP',''); //ICP备案号 \n";
	$config.="define('URL1','https://xxx.com'); //友链1 \n";
	$config.="define('BT1','友链名称1'); //友链名称1 \n";
	$config.="define('URL2','https://xxx.com'); //友链2 \n";
	$config.="define('BT2','友链名称1'); //友链名称2 \n";
	$config.="define('URL3','https://xxx.com'); //友链3 \n";
	$config.="define('BT1','友链名称3'); //友链名称3 \n";
	$config.="define('PRIVACY',null);  //别动 \n";
	$config.="define('EDITCODE',\"".md5($_SESSION['sxyh']['setup']['editcode'])."\"); //密码（md5 更改请用下方md5加密工具）\n";
	$config.="define('ADMIN','admin'); //admin用户名 \n";
	$config.="define('VIEWCODE',null); //别动 \n";
	$config.="define('GTAG',null); //别动 \n";
	// write configuration file
	file_put_contents($root_dir."datasets/config.inc.php",$config);
	// build htacess file
	$htaccess="<IfModule mod_rewrite.c>\n";
	$htaccess.="\tRewriteEngine On\n";
	$htaccess.="\tRewriteBase ".$_SESSION['sxyh']['setup']['path']."\n";
	$htaccess.="\tRewriteCond %{REQUEST_FILENAME} !-f\n";
	$htaccess.="\tRewriteRule ^(.*)$ index.php?doc=$1 [NC,L,QSA]\n";
	$htaccess.="</IfModule>\n";
	// write htaccess
	file_put_contents($root_dir.".htaccess",$htaccess);
	// check for configuration and apache access files
	if(file_exists($root_dir."datasets/config.inc.php") && file_exists($root_dir.".htaccess")){$configured=true;}else{$configured=false;}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="helpers/materialize-1.0.0/css/materialize.min.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="styles/styles.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="styles/styles-light.css" media="screen,projection"/>
	<link  type="image/ico" rel="icon" href="favicon.ico" sizes="any"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="theme-color" content="#4CAF50">
	<style>:root{--theme-color:#4CAF50;}</style>
	<title>安装QQBHOME系统</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col s12">
			<h1>QQHOME系统</h1>
			<p>无数据库的个人主页。</p>
		</div><!-- /col -->
		<?php if($g_act=="setup"){ ?>
			<div class="col s12">
				<h2>配置</h2>
				<p>系统参数设置</p>
				<form action="setup.php?act=check" method="post">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="path" id="path" class="validate" value="<?= PATH_URI ?>" required>
							<label for="path"><span class="green-text">目录（别动）</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="text" name="title" id="title" class="validate" value="xxの个人主页" required>
							<label for="title"><span class="green-text">标题</span></label>
						</div>
						<div class="input-field col s12 m7">
							<input type="text" name="avatar" id="avatar" class="validate" placeholder="URL和本地地址都可以" required>
							<label for="subtitle"><span class="green-text">头像</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="text" name="name" id="name" class="validate" placeholder="如：清秋" required>
							<label for="owner"><span class="green-text">名称</span></label>
						</div>
						<div class="input-field col s12 m7">
							<input type="text" name="grjs" id="grjs" class="validate" placeholder="如：10后初中生，前端开发者，不懂后端, <s>学生</s>（支持HTML代码），缺乏社会的毒打" required>
							<label for="notice"><span class="green-text">个人介绍</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="text" name="github" id="github" class="validate" value="https://github.com/xxxxx" required>
							<label for="owner"><span class="green-text">GitHub</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="password" name="editcode" id="editcode" class="validate" placeholder="请输入一个复杂密码" required>
							<label for="editcode"><span class="green-text">密码</span></label>
						</div>
						<div class="input-field col s12 m7">
							<input type="password" name="editcode_repeat" id="editcode" class="validate" placeholder="请输入一个复杂密码" required>
							<label for="editcode"><span class="green-text">再次输入密码</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m12">
							<button type="submit" class="btn btn-block waves-effect waves-light green right">继续<i class="material-icons right">keyboard_arrow_right</i></button>
						</div>
					</div>
				</form>
			</div><!-- /col -->
			<?php
		}
		if($g_act=="check"){
			// define checks
			$check_ok="<span class='secondary-content'><i class='material-icons green-text'>check_circle</i></span>";
			$check_ko="<span class='secondary-content'><i class='material-icons red-text'>cancel</i></span>";
			?>
			<div class="col s12">
				<h2>正在检查配置</h2>
				<p>您的配置已验证</p>
				<ul class="collection">
					<li class="collection-item"><div>目录: <?= $_POST['path'].($checks_array['path']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>标题: <?= $_POST['title'].($checks_array['title']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>头像: <?= $_POST['avatar'].($checks_array['avatar']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>名称: <?= $_POST['name'].($checks_array['name']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>个人介绍: <?= $_POST['grjs'].($checks_array['grjs']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>GITHUB: <?= $_POST['github'].($checks_array['github']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>身份验证码: <?= str_repeat('*',strlen($_POST['editcode'])).($checks_array['editcode']?$check_ok:$check_ko) ?></div></li>

				</ul>
	
				<div class="input-field col s12">
					<?php if($errors){ ?>
						<button onClick="window.history.back();" class="btn btn-block waves-effect waves-light green lighten-2">重新配置n<i class="material-icons left">keyboard_arrow_left</i></button>
					<?php }else{ ?>
						<a href="setup.php?act=conclude" class="waves-effect waves-light btn green white-text right">继续<i class="material-icons right">keyboard_arrow_right</i></a>
					<?php } ?>
				</div>
			</div><!-- /col -->
			<?php
		}
		if($g_act=="conclude"){
		?>
		<div class="col s12">
			<h2>正在保存配置</h2>
			<?php if($configured){ ?>
				<p>您的配置已经被保存。</p>
				<p><a href="<?= $_SESSION['sxyh']['setup']['path'] ?>">开始</a>使用！</p>
				<p><a href="admin/">进入后台</a></p>
				<p>用户名：<b>admin</b>密码：<b>你刚才设置的</b></p>
				<p>tips:没实力，不会获取你输的密码，并且存储的密码是加密了的，不会解密！！</p>

			<?php }else{ ?>
				<p class="red-text">保存配置时发送错误！</p>
				<i class="material-icons small red-text">取消</i>
			<?php } ?>
			<?php } ?>
		</div><!-- /row-->
	</div><!-- /container-->
	<script src="helpers/jquery-3.7.0/js/jquery.min.js"></script>
	<script src="helpers/materialize-1.0.0/js/materialize.min.js"></script>
</body>
</html>
