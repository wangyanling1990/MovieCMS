<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"/www/wwwroot/maccms/application/admin/view/index/login.html";i:1603093946;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理中心 - Copyright by 苹果CMS内容管理系统</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css?v=1024">
    <link rel="stylesheet" href="/static/css/admin_style.css?v=1024">
    <style type="text/css">
        body {
            color:#999;
            background:url('<?php echo $background; ?>');
            background-size:cover;
        }
    </style>
</head>
<body class="login-body body">
<div class="login-head">
    <h1><a href="//www.maccms.la/">欢迎使用</a></h1>
</div>
<div class="login-box">
    <form class="layui-form layui-form-pane" method="post" action="">
        <div class="layui-form-item">
            <h3>系统管理</h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">账号：</label>
            <div class="layui-input-block">
                <input type="text" name="admin_name" class="layui-input" lay-verify="admin_name" placeholder="账号" autocomplete="on" maxlength="20"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>
            <div class="layui-input-block">
                <input type="password" name="admin_pwd" class="layui-input" lay-verify="admin_pwd" placeholder="密码" maxlength="20"/>
            </div>
        </div>
        <?php if($GLOBALS['config']['app']['admin_login_verify'] != '0'): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">验证码：</label>
            <div class="layui-input-block">
                <input type="number" name="verify" class="layui-input" lay-verify="verify" placeholder="验证码" maxlength="4"  max="9999"/><img id="verify_img" src="/index.php/verify/index.html" onclick="this.src = this.src+'?'">
            </div>
        </div>
        <?php endif; ?>
        <button type="button" class="layui-btn btn-submit" lay-submit="" lay-filter="sub">立即登录</button>
    </form>
    <div class="copyright">
        © MacCMS All Rights Reserved.
    </div>

    <fieldset class="layui-elem-field">
        <legend>免责声明</legend>
        <div class="layui-field-box">
            本程序开源且永久免费无任何内置数据，请在遵守当地法律的前提下使用，对用户在使用过程中的信息内容本程序不负任何责任！自由！平等！分享！开源！
        </div>
    </fieldset>
</div>

<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/admin_common.js"></script>
<script type="text/javascript">
    layui.use(['form', 'layer'], function () {
        // 操作对象
        var form = layui.form
                , layer = layui.layer
                , $ = layui.jquery;

        // 验证
        form.verify({
            admin_name: function (value) {
                if (value == "") {
                    return "请输入用户名";
                }
            },
            admin_pwd: function (value) {
                if (value == "") {
                    return "请输入密码";
                }
            },
            verify: function (value) {
                if (value == "") {
                    return "请输入验证码";
                }
            }
        });

        // 提交监听
        form.on('submit(sub)', function (data) {
            layer.msg('数据提交中...',{time:500000});
            $.post("<?php echo url('index/login'); ?>",data.field,function(r){
                if(r.code==1){
                    location.href="<?php echo url('index/index'); ?>";
                }
                else{
                    layer.msg(r.msg,{time:1800});
                    $('#verify_img').click();
                }
            });
            return false;
        });


        $("input[name='admin_name']").bind('keypress',function(event){
            if(event.keyCode == "13") {
                if($("input[name='admin_name']").val()!=''){
                    $("input[name='admin_pwd']").focus();
                }
            }
        });

        $("input[name='admin_pwd']").bind('keypress',function(event){
            if(event.keyCode == "13") {
                if($("input[name='admin_pwd']").val()!=''){
                    $("input[name='verify']").focus();
                }
            }
        });

        $("input[name='verify']").bind('keypress',function(event){
            if(event.keyCode == "13") {
                if($("input[name='verify']").val()!=''){
                    $('.btn-submit').click();
                }
            }
        });
    });

</script>
</body>
</html>