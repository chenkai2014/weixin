<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="/index.php/member_admin/index">管理员管理</a></li>
            <li role="presentation"><a href="/index.php/fans_admin/index">粉丝管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/Member_admin/index">
            <div class="form-group">用户名：<input type="text" class="form-control" name="username"></div>
            <div class="form-group">姓名：<input type="text" class="form-control" name="name"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="搜索"></div>
            <div class="form-group"><a class="form-control btn-danger" href="/index.php/Member_admin/add">增加用户</a></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>用户名</td>
                <td>密码</td>
                <td>姓名</td>
                <td>手机号</td>

                <td>操作</td>
            </tr>
            <?php foreach($member_list as $value){ ?>
                <tr>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['password']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['mobile']; ?></td>
                    <td><a href="/index.php/Member_admin/showEdit?member_id=<?php echo $value['member_id']; ?>">编辑</a>丨<a href="/index.php/Member_admin/delete?member_id=<?php echo $value['member_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
