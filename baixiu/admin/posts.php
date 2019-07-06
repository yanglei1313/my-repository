<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>

<body>
  <script>
    NProgress.start()
  </script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->
    <?php
    include_once("./public/_navbar.php")
    ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select name="" class="form-control input-sm">
            <option value="">所有分类</option>
            <option value="">未分类</option>
          </select>
          <select name="" class="form-control input-sm">
            <option value="">所有状态</option>
            <option value="">草稿</option>
            <option value="">已发布</option>
          </select>
          <button class="btn btn-default btn-sm">筛选</button>
        </form>
        <ul class="pagination pagination-sm pull-right">
          <!-- <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li> -->
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>

  <!-- <div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li class="active"><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
          <li><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->
  <?php $current_page = "posts" ?>
  <?php
  include_once("./public/_aside.php")
  ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>
  <script>
    // $(function() {
    //   function makePageButton() {
    //     var start = currentPage - 2;
    //     if (start < 1) {
    //       start = 1;
    //     }
    //     var end = start + 4;

    //     if (end > pagecount) {
    //       end = pagecount;
    //     }
    //     var html = "";
    //     if (currentPage != 1) {
    //       html += '<li class="item" data-page="' + (currentPage - 1) + '"><a href="javascript:;">上一页</a></li>';
    //     }
    //     for (var i = start; i <= end; i++) {
    //       if (i == currentPage) {
    //         html += '<li class="item active" data-page="' + i + '"><a href="javascript:;">' + i + '</a></li>'
    //       } else {
    //         html += '<li class="item" data-page="' + i + '"><a href="javascript:;">' + i + '</a></li>'
    //       }
    //     }
    //     if (currentPage != pagecount) {
    //       html += '<li class="item" data-page="' + (currentPage + 1) + '"><a href="javascript:;">下一页</a></li>'
    //     }
    //   }
    //   $.ajax({
    //     type: "get",
    //     url: "api/_getPostsData.php",
    //     data: {
    //       currentPage: currentPage,
    //       pageSize: 10,
    //     },
    //     success: function(res) {
    //       if (res.code == 1) {
    //         var data = res.data;
    //         pageCount = res.pageCount;
    //         makePageButton();
    //         $("tbody").empty();
    //         $.each(data, function(e, v) {
    //           var str = `<tr>
    //         <td class="text-center"><input type="checkbox"></td>
    //         <td>${v.title}</td>
    //         <td>${v.nickname}</td>
    //         <td>${v.name}</td>
    //         <td class="text-center">${v.created}</td>
    //         <td class="text-center">${v.status}</td>
    //         <td class="text-center">
    //           <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
    //           <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
    //         </td>
    //       </tr>`
    //           $(str).appendTo("tbody")
    //         })
    //       }
    //     }
    //   });



    //   var pageSize = 10;
    //   var currentPage = 1;
    //   // console.log(html);
    //   var pagecount = 10;


    //   // console.log(html);
    //   $(".pagination").html(html)

    //   $(".pagination").on("click", ".item", function() {

    //     currentPage = parseInt($(this).attr("data-page"));
    //     console.log(currentPage);

    //     $.ajax({
    //       url: "api/getpage.php",
    //       type: "post",
    //       data: {
    //         currentPage: currentPage,
    //         pageSize: 10,
    //       },
    //       success: function(res) {
    //         // console.log(res.data);
    //         if (res.code == 1) {
    //           var str = "";
    //           var data = res.data;
    //           $("tbody").empty();
    //           $.each(data, function(e, v) {
    //             str = `<tr>
    //         <td class="text-center"><input type="checkbox"></td>
    //         <td>${v.title}</td>
    //         <td>${v.nickname}</td>
    //         <td>${v.name}</td>
    //         <td class="text-center">${v.created}</td>
    //         <td class="text-center">${v.status}</td>
    //         <td class="text-center">
    //           <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
    //           <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
    //         </td>
    //       </tr>`
    //             $(str).appendTo("tbody")
    //           })

    //         }
    //       }
    //     })
    //   })
    // })
    //实现当前页高亮
    //先声明一个变量来记录当前页,在动态生成的分页按钮中让当前页高亮
    var currentPage = 1;
    var pageSize = 10;
    var pageCount = 10;

    makePageButton()

    //设置当前显示起始页，为当前页码-2
    function makePageButton() {
      var start = currentPage - 2;

      //如果当起始页已经为1，则将起始页码置为1
      if (start < 1) {
        start = 1
      }
      //设置当前显示结束页码，为起始页码+4
      var end = start + 4

      //先把分页按钮渲染出来
      var html = ""
      //当当前页为1时，隐藏上一页按钮
      if (currentPage != 1) {
        html += '<li class="item" data-page="' + (currentPage - 1) + '"><a href="#">上一页</a></li>'
      }

      for (var i = start; i <= end; i++) {
        if (i == currentPage) {
          html += '<li class="item active" data-page="' + i + '"><a href="#">' + i + '</a></li>'
        } else {
          html += '<li class="item" data-page="' + i + '"><a href="#">' + i + '</a></li>'
        }
      }

      if (currentPage != pageCount) {
        html += '<li class="item" data-page="' + (currentPage + 1) + '"><a href="#">下一页</a></li>'
      }


      $(".pagination").html(html)
    }

    var statusData = {
      drafted: "草稿",
      published: "已发布",
      trashed: "已作废"
    }

    //获取数据渲染页面

    $.ajax({
      type: "post",
      url: "api/_getPostsData.php",
      data: {
        pageSize: pageSize,
        currentPage: currentPage,
      },
      success: function(res) {
        // console.log(res);
        if (res.code == 1) {
          var data = res.data;
          var str = "";
          $.each(data, function(e, v) {
            str = `<tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>${v.title}</td>
            <td>${v.nickname}</td>
            <td>${v.name}</td>
            <td class="text-center">${v.created}</td>
            <td class="text-center">${statusData[v.status]}</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>`
            $(str).appendTo("tbody")
          })
        }
      }
    })

    $(".pagination").on("click", ".item", function() {
      currentPage = parseInt($(this).attr("data-page"));
      console.log(currentPage);

      $.ajax({
        type: "post",
        url: "api/_getPostsData.php",
        data: {
          currentPage: currentPage,
          pageSize: pageSize,
        },
        success: function(res) {
          console.log(res);
          if (res.code == 1) {
            pageCount = res.pageCount;
            var data = res.data;
            $("tbody").empty();

            makePageButton();
            var str = "";
            $.each(data, function(e, v) {
              str = `<tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>${v.title}</td>
            <td>${v.nickname}</td>
            <td>${v.name}</td>
            <td class="text-center">${v.created}</td>
            <td class="text-center">${statusData[v.status]}</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>`
              $(str).appendTo("tbody")
            })
          }
        }
      })

    })
  </script>
</body>

</html>