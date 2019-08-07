<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flat-ui.css">
    <?php include 'connection.php'; ?>
</head>
<body>
    <div id="container">
    <nav class="navbar navbar-inverse navbar-embosse navbar-expand-lg navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="#">ONM</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav mr-auto">
            <li class="active"><a href="#fakelink">Contact</a></li>
            <li><a href="#fakelink">About</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
    </nav><!-- /navbar -->
    
<div class="progress">
  <div class="progress-bar" style="width: 40%;"></div>
  <div class="progress-bar progress-bar-warning" style="width: 10%;"></div>
  <div class="progress-bar progress-bar-danger" style="width: 10%;"></div>
  <div class="progress-bar progress-bar-success" style="width: 10%;"></div>
  <div class="progress-bar progress-bar-info" style="width: 10%;"></div>
</div>
    <div class="form-group form-inline">
        <form action="login.php" method="POST">
        <b>NIM</b> <br>
        <input type="number" name="username"><br>
        <b>Password</b><br>
        <input type="password" name="password"><br>
        <br>
        <input type="submit" name="btn_simpan" value="Login" class="btn-primary">
    </form>
    </div>
</body>
</html>