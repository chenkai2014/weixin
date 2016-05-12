<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">管理员管理</a></li>
            <li role="presentation"><a href="/index.php/fans_admin/index">粉丝管理</a></li>
            <li role="presentation"><a href="">消息记录查看</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/fans_admin/showLog">
            <input type="hidden" name="fans_id" value="<?php echo $fans_id;  ?>">
            <div class="form-group">时间：<input type="text" class="form-control" name="date_start" id="date_start">~<input type="text" class="form-control" name="date_end" id="date_end"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="搜索"></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>时间</td>
                <td>消息内容</td>
            </tr>
            <?php foreach($message_list as $value){ ?>
                <tr>
                    <td><?php echo date('Y-m-d H:i:s',$value['create_time']); ?></td>
                    <td><?php echo $value['content']; ?></td>
                    <!--<td><a href="/index.php/house_admin/delete?house_id=<?php /*echo $value['house_id']; */?>">删除</a></td>-->
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<link rel="stylesheet" href="/jquery/jquery-ui-1.11.4/jquery-ui.min.css" >
<script src="/jquery/jquery.min.js"></script>
<script src="/jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
    $('#date_start').datepicker();
    $('#date_end').datepicker();
</script>
