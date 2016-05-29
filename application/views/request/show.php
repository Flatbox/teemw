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

$CI = &get_instance();
$CI->load->library('table');

if (isset($mode)== false){
  $mode = 'DISPLAY';
}

echo "<h1> demande d'offre </h1>";
echo "<h3>valide jusqu'à: ";
echo form_label($expirationDate);
echo '</h3>';
if ($mode == 'BROOKERS'){
// $js = 'onClick="redirect(\'' . base_url() . 'offer/anserToRequest/'.$id.'\')"';
echo anchor('offer/anserToRequest/' . $id, 'proposer une offre', "class='btn btn-default'");
// echo form_button('anserTo_'+$id,'proposer une offre', $js);
}

$titleRow = array(
  'de' => 'de',
  'à' => 'à');

$departure= array(
    $titleRow,
    array($departure_start, $departure_end)
);
$arrival = array(
  $titleRow,
  array($arrival_start, $arrival_end)
);

$adresse =  array(
  $titleRow,
  array($departure_loc['line1'], $arrival_loc['line1']),
  array($departure_loc['line2'], $arrival_loc['line2']),
  array($departure_loc['postCode'].' '.$departure_loc['city'], $arrival_loc['postCode'].' '.$arrival_loc['city']),
  array($departure_loc['state'].' '.$departure_loc['full_state'], $arrival_loc['state'].' '.$arrival_loc['full_state']),
  array('disponnibilité pour enlèvement', 'disponibilité pour livairson'),
  array($CI->table->generate($departure),$CI->table->generate($arrival))
);
echo $CI->table->generate($adresse);
 ?>
