<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"/www/wwwroot/maccms/application/admin/view/index/welcome.html";i:1603682738;s:59:"/www/wwwroot/maccms/application/admin/view/public/head.html";i:1603093946;s:59:"/www/wwwroot/maccms/application/admin/view/public/foot.html";i:1603093946;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $title; ?> - 请勿泄露后台地址 - Copyright by 苹果CMS内容管理系统</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css?v=1024">
    <link rel="stylesheet" href="/static/css/admin_style.css?v=1024">
    <script type="text/javascript" src="/static/js/jquery.js?v=1024"></script>
    <script type="text/javascript" src="/static/layui/layui.js?v=1024"></script>
    <script>
        var ROOT_PATH="",ADMIN_PATH="<?php echo $_SERVER['SCRIPT_NAME']; ?>", MAC_VERSION='v10';
    </script>
</head>
<body>
<script>
    var MAC_VERSION='<?php echo $version['code']; ?>',PHP_VERSION='<?php echo PHP_VERSION ?>',THINK_VERSION='<?php echo THINK_VERSION ?>';
</script>
<div class="page-container">
    <?php $pass="<strong class='green'>√</strong>";$error="<strong class='red'>×</strong>";?>

    <blockquote class="layui-elem-quote layui-quote-nm mt10">
        <p class="f-20 text-success">请不要修改系统文件，以免升级出现故障！本程序不内置任何数据，添加任何数据均是个人行为！请在遵守法律的前提下使用程序，否则后果自负！</p>
        <p>登录次数：<?php echo $info['admin_login_num']; ?>  上次登录IP：<?php echo long2ip($info['admin_last_login_ip']); ?>  上次登录时间：<?php echo mac_day($info['admin_last_login_time']); ?></p>
    </blockquote>

    <table class="layui-table" >
        <tbody>
        <tr>
            <td width="130">运行环境</td>
            <td><?php echo PHP_OS ?> (<?php echo $_SERVER['SERVER_SOFTWARE'] ?>)</td>
        </tr>
        <tr>
            <td>服务器IP/端口</td>
            <td><?php echo $_SERVER['HTTP_HOST'] ?></td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td><?php echo PHP_VERSION ?></td>
        </tr>
        <tr>
            <td>ThinkPHP版本</td>
            <td><?php echo THINK_VERSION; ?></td>
        </tr>
        <tr>
            <td>最大上传限制</td>
            <td><?php echo get_cfg_var("file_uploads") ? get_cfg_var("upload_max_filesize") : $error;?></td>
        </tr>
        <tr>
            <td>服务器日期</td>
            <td><?php echo date('Y-m-d'); ?></td>
        </tr>
        <tr>
            <td colspan="2">当前版本：<span class="layui-badge"><?php echo $version['code']; ?></span></td>
        </tr>
        </tbody>
    </table>
    <?php if($update_sql): ?>
    <table class="tbinfo pleft layui-table" ><thead><th colspan="4">数据库更新提示</th></thead><tr><td colspan="4"><font class="tif s20">提示，发现本地有数据库升级脚本？是否执行升级操作！执行完毕后将自动删除脚本！</font><a class="j-iframe" title="点击进升级数据库脚本" data-href="<?php echo url('update/step2'); ?>"><font class="tit s20">【点击进升级数据库脚本】</font></a> </td></tr></table>
    <?php endif; ?>
</div>
<script type="text/javascript" src="/static/js/admin_common.js"></script>
</body>
</html>