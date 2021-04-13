<?php
if ($_POST['senha']!='!@#Ex2020') {
  header('location:viewer.php?erro=1');
}else{
  if (isset($_POST['video_id'])) {
   $video_id = $_POST['video_id'];
 } else {
   $video_id = 352481567;   
 }
}

$chat = 15000;

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="source/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="source/plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <title>Mensagens Recebidas</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="min-height: 38rem">
          <div class="card-header">
            <h4 class="text-center">Mensagens da Transmissão: <?=$video_id?></h4>
          </div>
          <div class="card-body">
            <table id="example" class="table table-sm table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Usuário</th>
                  <th>E-mail</th>
                  <th style="width: 50%">Mensagem</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>  
  </div>
  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      var table = $('#example').DataTable( {
        "pagingType": "full_numbers",
        "lengthMenu": [
        [25, 50, -1],
        [25, 50, "Todas"]
        ],
        responsive: true,
        language: {
         sLengthMenu:    "Mostrar _MENU_ mensagens",
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
        searchPlaceholder: "Buscar Mensagens",
      },
      "ajax":{
        "url":"dados.php?video_id=<?=$video_id?>",
        "dataSrc": ""
      },
      "columns":[
      {"data":"sent"},
      {"data":"nome"},
      {"data":"email"},
      {"data":"mensagem"}
      ]
    } ); //end of datatables
      setInterval( function () {
    table.ajax.reload( null, false ); // user paging is not reset on reload
  }, <?=$chat?> );
      table
      .order( [ 0, 'desc' ] )
      .draw();

    } ); //end of document.ready
  </script>
  
</body>
</html>