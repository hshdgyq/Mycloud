
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>网盘主页</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('../images/home.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
    .container {
      display: flex;
      height: 100vh;
    }
    .menu {
      width: 200px;
      background-color: #f5f5f5;
      padding: 20px;
      box-sizing: border-box;
      overflow-y: scroll;
    }
    .menu ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }
    .menu li {
      margin-bottom: 10px;
    }
    .menu a {
      display: block;
      padding: 5px 10px;
      text-decoration: none;
      color: #333;
      border-radius: 5px;
      background-color: rgba(155, 189, 219, 0.7);
    }
    .menu a:hover {
      background-color: rgba(155, 189, 219, 0.7);;
    }
    .content {
      flex: 1;
      padding: 20px;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="menu">
      <ul>

        <li><a href="ctrl_file.html">文件操作</a></li>
        <li><a href="#">退出</a></li>
      </ul>
    </div>
    <div class="content">
      <h1>欢迎使用网盘</h1>

      

    </div>
  </div>
</body>
</html>