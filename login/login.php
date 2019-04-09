<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/csslogin/bootstrap.css" media="screen" title="no title">
    <link rel="stylesheet" href="../assets/csslogin/login.css" media="screen" title="no title">
    <script src="../assets/js/sweetalert.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert.css" media="screen" title="no title">
    <link href="../assets/images/icon/favicon.png" rel="shortcut icon" type="image/x-icon">
    <title>Login | SPKsaw</title>
  </head>
  <body>
    <?php include '../backend/login.php'; ?>
    <div class="utama" align="center">
      <div class="container">
        <div class="row">
          <div class="col-md-2" style="margin-left:-40px;">
          </div>
          <div class="col-md-4 kiri">
            <br><br>
            <img src="../assets/images/lg.png" alt="logo" style="width:100px;"><br><br>
            <h3>SPK SAW</h3>
            <h5>Sistem Pendukung Keputusan Penerimaan Pegawai</h5>
            <h6>Metode SAW</h6>
            <br>
          </div>
          <div class="col-md-5 kanan" align="left">
            <br><br>
            <!-- <h4 style="margin-left:20px;">Login</h4> -->
            <br>
            <div class="formlogin">
              <form method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-success">Login</button>
              </form>
            </div>
            <br><br><br>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="footer">
      © 2018 SPKSAW | <a href="#">SPKSaw</a>
      <br><br><br>
    </div>
  </body>
</html>
