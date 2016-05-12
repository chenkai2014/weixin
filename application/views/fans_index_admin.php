<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">管理员管理</a></li>
            <li role="presentation" class="active"><a href="/index.php/fans_admin/index">粉丝管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/fans_admin/index">
            <div class="form-group">用户昵称：<input class="form-control" type="text" name="nickname"></div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="搜索"></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>用户ID</td>
                <td>用户昵称</td>
                <td>所在城市</td>
                <td>OPENID</td>
                <td>操作</td>
            </tr>
            <?php foreach($fans_list as $value){ ?>
                <tr>
                    <td><?php echo $value['fans_id']; ?></td>
                    <td><?php echo $value['nickname']; ?></td>
                    <td><?php echo $value['city']; ?></td>
                    <td><?php echo $value['open_id']; ?></td>
                    <td><a href="/index.php/fans_admin/showLog?fans_id=<?php echo $value['fans_id']; ?>">查看消息记录</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
