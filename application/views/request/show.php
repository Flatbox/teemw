<?php
/* needed data
array(9) {
  ["mode"] => [DISPLAY|OWNER|BROOKERS]
	["id"]=> string(1) "1"
	["wares"]=> string(1) "1"
	["expirationDate"]=> string(19) "2016-05-22 00:00:00"
	["departure_loc"]=> array(7) {
		["id"]=> string(1) "0"
		["line1"]=> string(22) "rue de rivbaudiÃ¨re 14"
		["line2"]=> NULL
    ["postCode"]=> string(4) "1000"
		["city"]=> string(8) "Lausanne"
		["state"]=> string(2) "CH"
		["full_state"]=> string(6) "SUISSE"
	}
	["departure_start"]=> string(19) "2016-05-22 03:23:21"
	["departure_end"]=> string(19) "2016-05-23 02:14:00"
	["arrival_loc"]=> array(7) {
		["id"]=> string(1) "1"
		["line1"]=> string(13) "bluestrasse 4"
		["line2"]=> NULL
    ["postCode"]=> string(4) "5000"
		["city"]=> string(5) "Aarau"
		["state"]=> string(2) "CH"
		["full_state"]=> string(6) "SUISSE"
	}
	["arrival_start"]=> string(19) "2016-05-21 00:00:00"
	["arrival_end"]=> string(19) "2016-05-23 00:00:00"
}
*/
$timeTitle = array(
  'de' => 'de',
  'à' => 'à');
$adressTitle = array(
    'de' => 'depart',
    'à' => 'arrivée');

if (isset($mode)== false){
  $mode = 'DISPLAY';
}

echo "<h1> demande d'offre </h1>";
echo "<h3>valide jusqu'à: ";
echo form_label($expirationDate);
echo '</h3>';

if ($mode == 'BROOKERS'){
echo anchor('offer/anserToRequest/' . $id, 'proposer une offre', "class='btn btn-default'");
}
  echo '<div class="panel-heading">localisation</div>
  <table class="table">
  <tr>';
  foreach ($adressTitle as $key => $value) {
  echo '<th>'.$value.'</th>';
  }
  echo	'</tr>';
  echo '<tr>';
    echo '<td>'.$departure_loc['line1'].'</td>';
    echo '<td>'.$arrival_loc['line1'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.$departure_loc['line2'].'</td>';
    echo '<td>'.$arrival_loc['line2'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.$departure_loc['postCode'].'&nbsp'.$departure_loc['city'].'</td>';
    echo '<td>'.$arrival_loc['postCode'].'&nbsp'.$arrival_loc['city'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.$departure_loc['state'].'&nbsp'.$departure_loc['full_state'].'</td>';
    echo '<td>'.$arrival_loc['state'].'&nbsp'.$arrival_loc['full_state'].'</td>';
  echo '</tr>';
echo'</table>';
?>
  <div class="panel-heading">Plage temporelle de prise en charge de la marchandise</div>
  <div>
    <?php
    echo form_label("de :");
    echo "&nbsp";
    echo form_label($departure_start);
    ?>
  </div>
  <div>
    <?php
    echo form_label("à :");
    echo "&nbsp";
    echo form_label($departure_end);
    ?>
  </div>
  <div class="panel-heading">Plage temporelle de remise de la marchandise</div>
  <div>
    <?php
    echo form_label("de :");
    echo "&nbsp";
    echo form_label($arrival_start);
    ?>
  </div>
  <div>
    <?php
    echo form_label("à :");
    echo "&nbsp";
    echo form_label($arrival_end);
    ?>
  </div>
