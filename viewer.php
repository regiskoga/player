<?php
  session_start();
  session_destroy();
  if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];
  } else{
    $erro = 0;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transmissão ao Vivo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="source/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="source/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
      <div class="login-logo">
        <img src="img/logo_exitus.png" width="auto" style="padding-top: 20px; max-height: 12rem">
        
      </div>
    <div class="card-body login-card-body">

      <form action="admin.php" method="POST">
        <div class="form-group has-feedback">
        <label>Número da Transmissão</label>
          <input type="text" name= "video_id" class="form-control" placeholder="Código da Transmissão" required>
        </div>
        <div class="form-group has-feedback">
            <label>Senha de Acesso</label>
          <input type="password" name= "senha" class="form-control" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn btn-primary float-right">Acessar</button>
      </form>
      <?php echo $erro==1 ? "Senha Inválida" :"" ?>
  </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="source/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="source/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
