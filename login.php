

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/ico" href="gambar/kubarr.ico">
  <title>Rjb - Admin</title>
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
  <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body>

    <div class="main">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-4" >
        <center><h1 class="page-header">Form Login</h1></center>
        <form action="proses/proses_login.php" method="POST">
          <div class="form-group">
            <label>Username</label><br>
            <input type="text" name="username" class="form-control" placeholder="Username"/>
            <br>
            <label>Password</label><br>
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <br>
            <center><button type="submit" name="submit" value="login" class="btn btn-warning ">LOGIN</button></center>
          </form>
        </div>
        <div class="col-sm-4">
        </div>    
      </div>  
    </div>
  </body>
  </html>
