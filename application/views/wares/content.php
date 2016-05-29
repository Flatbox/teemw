
<?php

$this->output->enable_profiler(true);

$CI = &get_instance();
$CI->load->library('table');


$title = array(
    'number' => 'nombre',
    'hight_mm' => 'hauteur',
    'length_mm' => 'longuer',
    'width_mm' => 'largeur',
    'weight_kg' => 'poids max');
if (isset($content['boxes'])){
  array_unshift ($content['boxes'], $title );
}
if (isset($content['pallets'])){
  array_unshift ($content['pallets'], $title );
}
$title = array(
    'number' => 'nombre',
    'type' => 'type');
if (isset($content['pallets'])){
  array_unshift ( $content['passengers'], $title );
}


echo '<H4>Contenu</H4>';
  foreach ($content as $key => $value) {
  echo '<h3>'.$key.'</h3>';
  echo $CI->table->generate($value);
}

 ?>
