<?php
  session_start();
  session_destroy();
  if (isset($_GET['video_id'])) {
    $video_id = $_GET['video_id'];
  }else{
    $video_id = 352481567;
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

      <form action="valida_acesso.php" method="POST">
        <div class="form-group has-feedback">
        <label>Insira o seu Nome</label>
          <input type="text" name= "nome" class="form-control" placeholder="Nome Completo" required>
        </div>
        <div class="form-group has-feedback">
            <label>Insira o seu E-mail</label>
          <input type="email" name= "email" class="form-control" placeholder="E-mail" required>
          <input type="hidden" name="video_id" value="<?=$video_id?>">
        </div>
        <button type="submit" class="btn btn-primary float-right">Acessar</button>
      </form>
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
