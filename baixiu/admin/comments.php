<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Comments &laquo; Admin</title>
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
    <?php include_once("public/_navbar.php"); ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有评论</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <div class="btn-batch" style="display: none">
          <button class="btn btn-info btn-sm">批量批准</button>
          <button class="btn btn-warning btn-sm">批量拒绝</button>
          <button class="btn btn-danger btn-sm">批量删除</button>
        </div>
        <ul class="pagination pagination-sm pull-right">
          <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>作者</th>
            <th>评论</th>
            <th>评论在</th>
            <th>提交于</th>
            <th>状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr class="danger">
            <td class="text-center"><input type="checkbox"></td>
            <td>大大</td>
            <td>楼主好人，顶一个</td>
            <td>《Hello world》</td>
            <td>2016/10/07</td>
            <td>未批准</td>
            <td class="text-center">
              <a href="post-add.php" class="btn btn-info btn-xs">批准</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>大大</td>
            <td>楼主好人，顶一个</td>
            <td>《Hello world》</td>
            <td>2016/10/07</td>
            <td>已批准</td>
            <td class="text-center">
              <a href="post-add.php" class="btn btn-warning btn-xs">驳回</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>大大</td>
            <td>楼主好人，顶一个</td>
            <td>《Hello world》</td>
            <td>2016/10/07</td>
            <td>已批准</td>
            <td class="text-center">
              <a href="post-add.php" class="btn btn-warning btn-xs">驳回</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr> -->
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
      <li>
        <a href="#menu-posts" class="collapsed" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse">
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li class="active">
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
  <?php
  $current_page = "comments";
  ?>
  <?php include_once("public/_aside.php"); ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>;
  <script src="../static/assets/vendors/twbs-pagination/jquery.twbsPagination.js"></script>;
  <script src="../static/assets/vendors/art-template/template-web.js"></script>

  <!-- <script type="text/template",id="template">
    {{each list val}}
    <tr>
      <td class="text-center"><input type="checkbox"></td>
      <td>{{val.author}}</td>
      <td>{{val.content}}</td>
      <td>{{val.content}}</td>
      <td>{{val.created}}</td>
      <td>
        {{if val.status == "held"}}
        待审核
        {{if val.status == "approved"}}
        已审核
        {{if val.status == "rejected"}}
        已拒绝
        {{if val.status == "trashed"}}
        已删除
        {{/if}}
      </td>
      <td class="text-center">
        <a href="post-add.php" class="btn btn-warning btn-xs">驳回</a>
        <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
      </td>
    </tr>
    {{/each}}
  </script> -->

  <script type="text/template" , id="template">
    {{each list val}}
    <tr>
      <td class="text-center"><input type="checkbox"></td>
      <td>{{val.author}}</td>
      <td style = width:400px>{{val.content}}</td>
      <td>{{val.title}}</td>
      <td>{{val.created}}</td>
      <td>
        {{if val.status == "held" }}
        未审核
        {{else if val.status == "approved" }}
        已审核
        {{else if val.status == "rejected" }}
        已拒绝
        {{else if val.status == "trashed" }}
        已删除
        {{/if}}
      </td>
      <td class="text-center">
        <a href="post-add.php" class="btn btn-warning btn-xs">驳回</a>
        <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
      </td>
    </tr>
    {{/each}}
  </script>
  <script>
    $(function() {
      var currentPage = 1;
      var pageSize = 10;
      var pageCount;

      getCommentsData()

      function getCommentsData() {
        $.ajax({
          url: "api/_getCommentsData.php",
          type: "post",
          data: {
            currentPage: currentPage,
            pageSize: pageSize,
          },
          success: function(res) {
            console.log(res.data);
            
            // alert(123)
            if (res.code == 1) {
              pageCount = res.pageCount;
              var data = res.data;
              var html = template("template", {list: res.data});
              console.log(html);
              $("tbody").html(html);
              // console.log(123);

              $('.pagination').twbsPagination({
                totalPages: pageCount, //最大页码数
                visiblePages: 5, //总共显示多少个分页按钮
                prev:"上一页",
                next:"下一页",
                first: "",
                last: null,
                initiateStartPageClick: false,//关闭插件默认加载首页的功能
                onPageClick: function(event, page) { //点击每个分页按钮的时候执行的操作
                  // 回调函数有两个参数, 第一个是时间对象, 第二个是当前的页码数
                  currentPage = page;
                  // 每次点击分页的按钮, 也要获取数据
                  getCommentsData();
                }
              });
            }
          }
        })
      }
    })
  </script>
</body>

</html>