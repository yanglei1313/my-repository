<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
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
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display : none">
        <strong>错误！</strong>
        <span id="msg">发生XXX错误</span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form>
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="slug">类名</label>
              <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="button" value="添加" id="btn-add">
              <input id="btn-edit" style="display:none" class="btn btn-primary" type="button" value="编辑完成" id="btn-add">
              <input id="btn-cancel" style="display:none" class="btn btn-primary" type="button" value="取消编辑" id="btn-add">

            </div>


          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a id="delall" class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>类名</th>

                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <th>Slug</th>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <th>Slug</th>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <th>Slug</th>

                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
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
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li class="active"><a href="categories.php">分类目录</a></li>
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
  <?php $current_page = "categories" ?>
  <?php
  include_once("./public/_aside.php")
  ?>

  <script src="../static/assets/vendors/jquery/jquery.min.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>
  <script>
    $.ajax({
      type: "get",
      url: "api/_getCategory.php",
      success: function(res) {
        // alert(111)
        if (res.code == 1) {
          //判断请求数据是否成功，如果成功执行以下操作
          var data = res.data;
          //将返回值中的data对象存入一个遍量中方便操作
          console.log(data);
          //发送ajax请求请求数据库中数据
          var str = "";
          //声明一个空字符串用来存储动态页面
          $.each(data, function(e, v) {
            //遍历接口返回的数据
            str = `<tr data-categoryId=${v.id}>
                <td class="text-center"><input type="checkbox"></td>
                <td>${v.name}</td>
                <td>${v.slug}</td>
                <th>${v.classname}</th>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs edit" data-categoryId=${v.id}>编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs del ">删除</a>
                </td>
              </tr>`
            //将遍历的数据填入HTML结构中生成动态页面
            // console.log(str);

            $(str).appendTo("tbody");
            //将生成的动态页面放入容器中
          })
        } else {
          $("#msg").text(res.msg);
          $(".alert").show();
          //如请求失败，则弹出提示框，将返回的提示信息填入提示框
        }
      }
    });

    $("#btn-add").on("click", function() {
      //给添加按钮添加一个点击事件
      var name = $("#name").val();

      var slug = $("#slug").val();

      var classname = $("#classname").val();
      //将用户输入的数据存入变量

      if (name == "") {
        $("#msg").text("名称不能为空");
        $(".alert").show();
        return;
      }
      if (slug == "") {
        $("#msg").text("别名不能为空");
        $(".alert").show();
        return;

      }
      if (classname == "") {
        $("#msg").text("类名不能为空");
        $(".alert").show();
        return;
      }
      //验证用户输入是否为空，如果为空则弹出提示信息并结束代码执行。

      $.ajax({
        type: "post",
        url: "api/_addCategory.php",
        data: {
          name: name,
          slug: slug,
          classname: classname,
        },
        //查询用户输入的信息数据库中是否存在，如果不存在将用户输入信息存入数据库
        success: function(res) {
          if (res.code == 1) {
            //如果操作成功执行以下操作
            var addstr = "";
            //声明一个空字符串用来渲染页面
            addstr = `<tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>${name}</td>
                <td>${slug}</td>
                <th>${classname}</th>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>`
              //将拼接好的字符串存入事先声明好的空字符串，字符串模板`后不能加空格
            $(addstr).appendTo("tbody");
            //将拼接好的HTML渲染到页面上
            location.reload()
            //重新加载页面，以便其他功能正常使用。暂用
          } else {
            $("#msg").text(res.msg);
            $(".alert").show();
            //如果请求操作失败，弹出提示框并将返回的提示信息填入提示框
          }
        }
      })
    })


    var currentRow;
    //声明一个全局变量

    $("tbody").on("click", ".edit", function() {
      //给编辑按钮添加一个点击事件委托
      $("#btn-add").hide();
      $("#btn-edit").show();
      $("#btn-cancel").show();
      //点击编辑按钮时，添加按钮隐藏，编辑相关按钮显示，
      currentRow = $(this).parents("tr")

      //将当前点击编辑所在的tr存入全局变量以便后面调用

      var categoryId = $(this).attr("data-categoryId")
      //获取到编辑按钮中的ID将其存入一个变量
      console.log(categoryId);
      $("#btn-edit").attr("data-categoryId", categoryId)
      //给编辑完成按钮添加一个自定义属性，属性值为ID变量，其实就是将编辑按钮的id存给编辑完成按钮

      var name = $(this).parents("tr").children().eq(1).text();
      var slug = $(this).parents("tr").children().eq(2).text();
      var classname = $(this).parents("tr").children().eq(3).text();

      $("#name").val(name);
      $("#slug").val(slug);
      $("#classname").val(classname);
      //将当前点击的表格中的信息放入输入框中，用来编辑
    });

    $("#btn-edit").on("click", function() {
      //给编辑完成按钮添加一个点击事件
      var categoryId = $(this).attr("data-categoryId");
      //将当前的ID存入一个变量
      var name = $("#name").val();
      var slug = $("#slug").val();
      var classname = $("#classname").val();

      if (name == "") {
        $("#msg").text("名称不能为空");
        $(".alert").show();
        return;
      }
      if (slug == "") {
        $("#msg").text("别名不能为空");
        $(".alert").show();
        return;

      }
      if (classname == "") {
        $("#msg").text("类名不能为空");
        $(".alert").show();
        return;
      }
      //判断用户编辑购的信息是否为空，如果为空弹出提示信息并结束执行
      $.ajax({
        url: "./api/_getedit.php",
        type: "POST",
        data: {
          name: name,
          slug: slug,
          classname: classname,
          id: categoryId,
        },
        //发送ajax请求，将修改后的请求存入数据库
        success: function(res) {
          if (res.code == 1) {
            var name = $("#name").val();
            var slug = $("#slug").val();
            var classname = $("#classname").val();
            //将修改后的信息存入变量
            $("#name").val("");
            $("#slug").val("");
            $("#classname").val("");
            //清空输入框
            currentRow.children().eq(1).text(name);
            currentRow.children().eq(2).text(slug);
            currentRow.children().eq(3).text(classname);
            //此时全局变量为之前存入的tr，将保存修改信息的变量重新渲染到页面上
            $("#btn-add").show();
            $("#btn-edit").hide();
            $("#btn-cancel").hide();
            //隐藏编辑相关按钮，显示添加按钮
          }
        }
      })
    })

    $("#btn-cancel").on("click", function() {
      $("#name").val("");
      $("#slug").val("");
      $("#classname").val("");
      $("#btn-add").show();
      $("#btn-edit").hide();
      $("#btn-cancel").hide();
    });

    $("tbody").on("click", ".del", function() {

      var row = $(this).parents("tr");

      var categoryId = row.attr("data-categoryId");
      console.log(categoryId);


      $.ajax({
        type: "POST",
        url: "./api/_delCategory.php",
        data: {
          id: categoryId
        },
        success: function(res) {
          if (res.code == 1) {
            row.remove()
          }
        }
      })
    })

    $("thead input").on("click", function() {

      var status = $(this).prop("checked");

      $("tbody input").prop("checked", status)

      if ($("tbody input:checked").size() >= 2) {
        $("#delall").show();
      } else {
        $("#delall").hide();
      }
    })

    $("tbody").on("click", "input", function() {
      var all = $("thead input");
      var cks = $("tbody input");

      all.prop("checked", cks.size() == $("tbody input:checked").size());

      if ($("tbody input:checked").size() >= 2) {
        $("#delall").show();
      } else {
        $("#delall").hide();
      }
    })

    $("#delall").on("click", function() {

      var ids = [];

      var cks = $("tbody input:checked");

      cks.each(function(e, v) {
        var id = $(v).parents("tr").attr("data-categoryId");
        ids.push(id);
      })
      $.ajax({
        type: "post",
        url: "api/_delAllCategory.php",
        data: {
          ids: ids
        },
        success: function(res) {
          if (res.code == 1) {

            cks.parents("tr").remove()
          }
        }
      })
    })
  </script>
</body>

</html>