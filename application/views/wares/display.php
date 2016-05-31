<?php
/*
array(4) {
  ["id"]=>  string(1) "1"
  ["name"]=>  string(11) "carcaison 1"
  ["description"]=>  string(19) "cargaison de test 1"
  ["content"]=>  array(2) {
    ["pallets"]=>    array(1) {
      [0]=>      array(5) {
        ["number"]=>        string(1) "2"
        ["hight_mm"]=>        string(4) "1800"
        ["length_mm"]=>        string(4) "1200"
        ["width_mm"]=>        string(3) "800"
        ["weight_kg"]=>        string(4) "1000"
      }
    }
    ["passengers"]=>    array(1) {
        [0]=>      array(2) {
        ["number"]=>        string(1) "2"
        ["type"]=>        string(6) "enfant"
      }
    }
  }
}
*/
$frenchType = array(
  'pallets' => 'Palletes',
  'Box' => 'Carton',
  'passengers' => 'Passagers'
);

$solideTitle = array(
  'number' => 'Quantité',
  'hight_mm' => 'Hauteur en mm',
  'length_mm' => 'Longueur en mm',
  'width_mm' => 'Largeur en mm',
  'weight_kg' => 'Poids max en kg'
);
$personTitle = array(
  'number' => 'Quantité',
  'type' => 'type'
);

?>
  <div>
<?php
  echo form_label($name);
  echo "<br/>";
  echo form_label($description);
?>
  </div>
  <div class="panel panel-default">
<?php
  foreach ($content as $type => $typeContent) {
    echo '<div class="panel-heading">'.$frenchType[$type].'</div>
    	<table class="table">
    		<tr>';
        $neededTitle = array();
        switch ($type) {
          case 'pallets':
              $neededTitle = $solideTitle;
            break;
          case 'Box':
                $neededTitle = $solideTitle;
              break;
          case 'passengers':
              $neededTitle = $personTitle;
            break;
        }
        foreach ($neededTitle as $key => $value) {
          echo '<th>'.$value.'</th>';
        }
    	echo	'</tr>';
        foreach ($typeContent as $key => $row) {
          echo '<tr>';
          foreach ($row as $key => $data) {
            echo '<td>'.$data.'</td>';
          }
          echo '</tr>';
        }
    echo'</table>';
  }
  ?>
  </div>
