<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/index.php/member_admin/index">管理员管理</a></li>
                <li role="presentation"><a href="/index.php/carport_admin/index">粉丝管理</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
                <li role="presentation" class="active"><a href="">编辑管理员</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="get" action="/index.php/member_admin/edit">
            <input type="hidden" name="member_id" value="<?php echo $member_info['member_id'] ?>">
            <div class="form-group">用户名：<input type="text" name="username" class="form-control" value="<?php echo $member_info['username'] ?>"></div>
            <div class="form-group">密码：<input type="text" name="password" class="form-control" value="<?php echo $member_info['password'] ?>"></div>
            <div class="form-group">姓名：<input type="text" name="name" class="form-control" value="<?php echo $member_info['name'] ?>"></div>
            <div class="form-group">手机号：<input type="text" name="mobile" class="form-control" value="<?php echo $member_info['mobile'] ?>"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="确定修改"></div>
        </form>
    </div>
</div>
