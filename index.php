<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" > 
  <link rel="stylesheet" href="style.css" > 
</head>
<body>

  <?php 

  $processosFilhos = array
  (
    array(
      "423224"=>array(
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
      )
    ),
    array(
      "523111"=>array(
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
      )
    ),
    array(
      "143222"=>array(
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
      )
    ),
    array(
      "123232"=>array(
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),
        array("12/01/2020","11509","1.134,00","1 PARCELA PEAE/2019","BANPARA","105","6013406"),

      )
    )
  );

  ?>

  <div class="container">
    <?php

    $html = '';

    foreach ($processosFilhos as $key => $processo) {

      $detailsRepasses = (array_values($processo));

      $html .= "<div class=\"wrapContainer\">
      <h4>".array_keys($processo)[0]."</h4>";

      // $html .= "<div class=\"collapseContent activeCollapse\">";
      $html .= "<div class=\"collapseContent\">";

      $html .= "<table  class='table tableCustomChild table-striped table-bordered customTable'>
      <tr>
      <th>Data Repasse</th>
      <th>N Ordem Bancaria</th>
      <th>Valor R$</th>
      <th>Referência</th>
      <th>Banco</th>
      <th>N Agência</th>
      <th>N Conta Corrente</th>
      <th colspan='2'>Editar</th>
      </tr>";


      foreach ($detailsRepasses as $repasses) {

       $i = 0;
       $proc = array_keys($processo)[0];
       $totalValores = 0; 

       foreach ($repasses as $r) {

        $totalValores += str_replace(',',".",str_replace('.',"",$r[2]));            
        $html .= "<tr>
        <td>".$r[0]."</td>
        <td>".$r[1]."</td>
        <td><input data-id='".$proc."_".$i."' class='inputEditChild' type='text' value='".$r[2]."' name='vl'></td>
        <td><input data-id='".$proc."_".$i."' class='inputEditChild' type='text' value='".$r[3]."' name='fl'></td>
        <td>".$r[4]."</td>
        <td>".$r[5]."</td>
        <td>".$r[6]."</td>
        <td>
        <a data-id='".$proc."_".$i."' href='#' class='btnEdRepChild' data-toggle=\"tooltip\" title=\"Editar\"><i class=\"fa fa-pencil-square-o\"></i></a> 
        </td>
        <td>
        <a data-id='".$proc."_".$i."' href='#' class='btnConfirmUpChild' data-toggle=\"tooltip\" title=\"Confirmar alteração!\"><i class=\"fa fa-check-square-o\"></i></a>
        </td>
        </tr>";
        $i++;
      }
      $html .= "<tr><td colspan='2'></td><td>Total: ". number_format($totalValores,2, ",", ".") ." </td><td colspan='6'></tr>";

    }

    $html .= "</table>
    </div>
    </div>";
  }

  echo $html;

  ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="main.js" ></script>

</body>
</html>
