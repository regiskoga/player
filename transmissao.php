<?php 
session_start();
if (isset($_GET['video_id'])) {
  $video_id = $_GET['video_id'];
}else{
  $video_id = 352481567;
}
require "banco/queries.php";
$live = q_live($video_id);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">

 <title>Webmeeting Exitus</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 <link rel="stylesheet" href="source/swal/sweetalert2.css">
 <style type="text/css">

  body, html{
    height: 100%;
  }

  body{
    background-color: #f0f0f0;
    margin: 0;
  }
  .menu{
    background-color: #fff;
    height: 100%;
    width: 250px;
  }
  iframe {
   display: block;       / iframes are inline by default /
   background: #fff;
   border: none;         / Reset default border /
   height: 100vh;        / Viewport-relative units /
   width: 100vw;
 }
</style>
</head>

<body>
  <nav class="navbar navbar-light bg-light" >
    <a class="navbar-brand" href=""><strong><img src="img/logo_exitus.png" style="max-height: 2rem"></strong> Webmeeting</a>
    <!-- Navbar content -->



  </div>

  <div class="content">
    <div class="btn-group" style="margin-right: 20px;">   

      <a href="http://www.exitusead.com.br/aovivo/faq" target="_blank" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="left" title="Perguntas Frequentes">Ajuda <i class="far fa-question-circle"></i></a>

      <a href="teste.php" target="_blank" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Teste a sua Conexão">Teste <i class="fas fa-tachometer-alt"></i></a>

      <a href="tel:1150931013" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="(11)5093-1013">Suporte <i class="fas fa-phone-square"></i></a>

    </div>

    <div class=" btn-group float-right">
      <!--       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" title="Envie sua mensagem">Mensagem</button> -->
      <!-- <a href="https://wa.me/5511968473574" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="(11) 96847-3574"><i class="fab fa-whatsapp"></i></a> -->
    </div>
  </div>
</nav>
<div class="container-fluid" style="height: 90%; padding-top: 4px; ">
  <div class="row" style="height: 100%; ">
   <div class="col-md-9">
    <iframe src="https://player.vimeo.com/video/<?=$video_id?>?autoplay=true" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media"></iframe>
  </div>
  <div class="col-md-3" style= "padding-top: 12px;">
    <div class="card" >
     <div class="card-header">
      Envio de Mensagens
    </div>
    <div class="card-body">
      <form id="frm_mensagem">
       <textarea rows="8" maxlength="255" class="form-control" id="txt_mensagem"></textarea>
       <button type="button" id="btn_mensagem" style="margin-top: 10px" class="btn btn-primary float-right">enviar</button>
     </form>
   </div>
 </div>
 <br>
 <!-- <a href="https://especialistaembelezanatura.typeform.com/to/EmjfVj" target="_blank" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Link caso necessário">Link caso necessário</a> -->
</div>    
</div>
</div>  
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalCenterTitle">Envie sua mensagem</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" onclick="limpar()">&times;</span>
    </button>
  </div>
            <!-- <form id="frm_mensagem">
               <div class="modal-body">
                  <div class="form-group">
                     <textarea class="form-control" id="txt_mensagem" name="txt_mensagem" rows="3"></textarea>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpar()">Cancelar</button>
                  <button type="button" id="btn_mensagem" class="btn btn-primary">Enviar</button>
               </div>
             </form> -->
           </div>
         </div>
       </div>

       <!-- jQuery -->
       <script src="source/plugins/jquery/jquery.min.js"></script>
       <!-- Bootstrap 4 -->
       <script src="source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
       <!-- Sweetalert -->
       <script src="source/swal/sweetalert2.js"></script>

       <script type="text/javascript">

        $(function(){ 
         $("#btn_mensagem").on('click', function(){  

          var txt_mensagem = $('#txt_mensagem').val();

          if (txt_mensagem != '') {
           $.post('salvar.php',
           {
            txt_mensagem: txt_mensagem
          }, 
          function(data){
            if (data == 1) {
             $('.modal').modal('hide');
             $('#txt_mensagem').val("");
             swal("Mensagem Enviada", "", "success");
           }else{
             swal("Falha!", "Mensagem Não Enviada", "error");
           }
         });
         } else {
           swal("Campo Vazio!", "Escreva Uma Mensagem", "error");
         }
       });
       });

        function limpar(){
         $('#txt_mensagem').val("");
       }

       $(function () {
         $('[data-toggle="tooltip"]').tooltip()
       })
     </script>

     <?=$live['name']?>
   </body>

   </html>