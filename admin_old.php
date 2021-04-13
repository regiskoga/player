<?php
if (isset($_GET['video_id'])) {
   $video_id = $_GET['video_id'];
} else {
   $video_id = 352481567;   
}
$chat = 20000;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="source/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="source/plugins/iCheck/square/blue.css">
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   <title>Administração</title>
</head>
<body onload="ajaxChat()">
   <div class="wrapper">
      <section class="content">
         <div class="container-fluid">
            <div class="row" style="margin-top: 1rem">
               <div class="col-md-12">
                  <div class="card" style="min-height: 37REM">
                     <div class="card-header border-transparent">
                        <h3 class="text-center">Mensagens Recebidas</h3>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="tabela" class="table table-sm table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>Data</th>
                                    <th>Usuário</th>
                                    <th>Email</th>
                                    <th>Mensagem</th>
                                 </tr>
                              </thead>
                              <tbody id="chat">

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <!-- jQuery -->
   <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
   crossorigin="anonymous"></script>
   <script src="source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   
   <script type="text/javascript">
      $(document).ready(function() {
         $('#tabela').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
            ],
            responsive: true,
            language: {
               sLengthMenu:    "Mostrar _MENU_ registros",
               sProcessing:    "Procesando...",
               sZeroRecords:   "Nenhum Registro Encontrado",
               sEmptyTable:    "Nenhum Registro Disponível",
               sInfo:          "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
               sInfoEmpty:     "Mostrando 0 a 0 de 0 registros",
               sInfoFiltered:  "(total de _MAX_ registros)",
               oPaginate: {
                  sFirst:    "Primero",
                  sLast:    "Último",
                  sNext:    "Próximo",
                  sPrevious: "Anterior"
               },
               oAria: {
                  sSortAscending:  ": Ordem Ascendente",
                  sSortDescending: ": Ordem Descendente"
               },
               search: "_INPUT_",
               searchPlaceholder: "Buscar Registros",
            }
         });
         
      </script>
      <script type="text/javascript">

         function ajaxChat(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
               if(req.readyState == 4 && req.status == 200){          
                  document.getElementById('chat').innerHTML = req.responseText;          
               }
            }

            req.open('GET', 'mensagens.php?video_id=<?=$video_id?>', true);
            req.send();
         }

         setInterval(function(){ajaxChat();}, <?=$chat?>);
      </script>
   </body>
   </html>
