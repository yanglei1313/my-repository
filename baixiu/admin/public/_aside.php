<div class="aside">
    <div class="profile">
        <img class="avatar" src="../static/uploads/avatar.jpg">
        <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
        <li class="active">
            <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
        </li>

        <?php
        $postArr = ["posts", "post-add", "categories"];
        $bool = in_array($current_page, $postArr);
        ?>
        <li>
            <a href="#menu-posts" class="<?php echo $bool ? "" : "collapsed" ?>" data-toggle="collapse" aria-expanded="<?php echo $bool ? "true" : "false" ?>">
                <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
            </a>


            <ul id="menu-posts" class="collapse <?php echo $bool ? "in" : "" ?>" aria-expanded="<?php echo $bool ? "true" : "false" ?>">
                <li class="<?php echo $current_page == "posts" ? "active" : "" ?>"><a href="posts.php">所有文章</a></li>
                <li class="<?php echo $current_page == "post-add" ? "active" : "" ?>"><a href="post-add.php">写文章</a></li>
                <li class="<?php echo $current_page == "categories" ? "active" : "" ?>"><a href="categories.php">分类目录</a></li>
            </ul>
        </li>
        <li>
            <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
        </li>
        <li>
            <a href="users.php"><i class="fa fa-users"></i>用户</a>
        </li>

        <?php
            $postArr = ["nav-menus","slides","settings"];
            $bool = in_array($current_page,$postArr)
        ?>
        <li>
            <a href="#menu-settings" class="<?php echo $bool ? "" : "collapsed" ?>" data-toggle="collapse" aria-expanded="<?php echo $bool ? "true" : "false" ?>">
                <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
            </a>
            <ul id="menu-settings" class="collapse <?php echo $bool ? "in" : "" ?>" aria-expanded="<?php echo $bool ? "true" : "false" ?>">
                <li class="<?php echo $current_page == "nav-menus" ? "active" : "" ?>"><a href="nav-menus.php">导航菜单</a></li>
                <li class="<?php echo $current_page == "slides" ? "active" : "" ?>"><a href="slides.php">图片轮播</a></li>
                <li class="<?php echo $current_page == "settings" ? "active" : "" ?>"><a href="settings.php">网站设置</a></li>
            </ul>
        </li>
    </ul>
</div>


<script src="../../static/assets/vendors/jquery/jquery.js"></script>;
<script>
    // $.ajax({
    //     type:"get",
    //     url:"./api/_getUserId.php",
    //     success:function(res){
    //         if(res.code == 1){

                var avatar = localStorage.getItem("avatar");
            
                var nickname = localStorage.getItem("nickname");
                $(".avatar img").attr("src",avatar);
                // $(".avatar img").attr("src",res.avatar);
                //attr修改目标元素中的属性值第一个参数为要修改的属性名，第二个参数为要修改的内容。
                // $(".name").text(res.nickname);
                $(".name").text(nickname);
                console.log(avatar);
                console.log(nickname);
    //         }
    //     }
    // })
</script>