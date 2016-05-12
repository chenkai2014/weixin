
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/index.php/member_admin/index">管理员管理</a></li>
                <li role="presentation"><a href="/index.php/fans_admin/index">粉丝管理</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
                <li role="presentation" class="active"><a href="">新增会员</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="post" action="/index.php/member_admin/save">
            <div class="form-group">用户名：<input type="text" class="form-control" name="username"></div>
            <div class="form-group">密码：<input type="text" class="form-control" name="password"></div>
            <div class="form-group">姓名：<input type="text" class="form-control" name="name"></div>
            <div class="form-group">手机号：<input type="text" class="form-control" name="mobile"></div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="增加"></div>
        </form>
    </div>
</div>
