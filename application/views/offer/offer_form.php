<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/base/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/script.js" ></script>

<?php

$this->output->enable_profiler(true);

$presetValues  = array(
  'dep_add_1' => $departure_loc['line1'],
  'dep_add_2' => $departure_loc['line2'],
  'dep_postcode' => $departure_loc['postCode'],
  'dep_city' => $departure_loc['city'],
  'dep_city_id' => $departure_loc['city_id'],

  'dep_start' => substr ($departure_start , 0, 10),
  'dep_start_hour' => substr ($departure_start , 11, 2),
  'dep_start_minutes' => '15',

  'dep_end' => substr ($departure_end , 0, 10),
  'dep_end_hour' => substr ($departure_end , 11, 2),
  'dep_end_minutes' => substr ($departure_end , 14, 2),

  'arr_add_1' => $arrival_loc['line1'],
  'arr_add_2' => $arrival_loc['line2'],
  'arr_postcode' => $arrival_loc['postCode'],
  'arr_city' => $arrival_loc['city'],
  'arr_city_id' => $arrival_loc['city_id'],

  'arr_start' => substr ($arrival_start , 0, 10),
  'arr_start_hour' => substr ($arrival_start , 11, 2),
  'arr_start_minutes' => substr ($arrival_start , 14, 2),

  'arr_end' => substr ($arrival_end , 0, 10),
  'arr_end_hour' => substr ($arrival_end , 11, 2),
  'arr_end_minutes' => substr ($arrival_end , 14, 2)
);

// Prepare all fields

  $hours = array(
    '00'  => '00',
    '01'  => '01',
    '02'  => '02',
    '03'  => '03',
    '04'  => '04',
    '05'  => '05',
    '06'  => '06',
    '07'  => '07',
    '08'  => '08',
    '09'  => '09',
    '10'  => '10',
    '11'  => '11',
    '12'  => '12',
    '13'  => '13',
    '14'  => '14',
    '15'  => '15',
    '16'  => '16',
    '17'  => '17',
    '18'  => '18',
    '19'  => '19',
    '20'  => '20',
    '21'  => '21',
    '22'  => '22',
    '23'  => '23',
  );

  $minutes = array(
    '00'  => '00',
    '15'  => '15',
    '30'  => '30',
    '45'  => '45'
  );

  $priceField = array(
    'id'          => 'price',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'price',
    'style'       => 'max-width: 180px',
  );

  $departureAddressLine1Field = array(
    'id'          => 'dep_add_1',
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'dep_add_1',
    'value'       => $presetValues['dep_add_1'],
    'style'       => 'max-width: 400px',
    'class'       => 'form-control'
  );

  $departureAddressLine2Field = array(
    'id'          => 'dep_add_2',
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'dep_add_2',
    'value'       => $presetValues['dep_add_2'],
    'style'       => 'max-width: 400px',
    'class'       => 'form-control'
  );

  $departurePostcodeField = array(
    'id'          => 'dep_postcode',
    'maxlength'   => '8',
    'size'        => '8',
    'name'       	=> 'dep_postcode',
    'value'       => $presetValues['dep_postcode'],
    'class'       => 'form-control postcode',
    'style'       => 'max-width: 180px'
  );

  $departureCityId =array(
    'type'        =>'hidden',
    'id'          =>'dep_city_id',
    'class'       => 'city_id',
    'name'        => 'dep_city_id',
    'value'       => $presetValues['dep_city_id']
  );

  $departureCityField = array(
    'id'          => 'dep_city',
    'size'        => '30',
    'name'       	=> 'dep_city',
    'value'       => $presetValues['dep_city'],
    'class'       => 'form-control city',
    'style'       => 'max-width: 400px',
    'readonly'    => 'true'
  );

  $departureDateStartField = array(
    'id'          => 'dep_start',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'dep_start',
    'value'       => $presetValues['dep_start'],
    'style'       => 'max-width: 180px',
    'class'       => 'form-control date'
  );

  $departureDateEndField = array(
    'id'          => 'dep_end',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'dep_end',
    'value'       => $presetValues['dep_end'],
    'style'       => 'max-width: 180px',
    'class'       => 'form-control date'
  );

  $arrivalAddressLine1Field = array(
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'arr_add_1',
    'id'          => 'arr_add_1',
    'value'       => $presetValues['arr_add_1'],
    'style'       => 'max-width: 400px',
    'class'       => 'form-control'
  );

  $arrivalAddressLine2Field = array(
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'arr_add_2',
    'id'          => 'arr_add_2',
    'value'       => $presetValues['arr_add_2'],
    'style'       => 'max-width: 400px',
    'class'       => 'form-control'
  );

  $arrivalPostcodeField = array(
    'maxlength'   => '8',
    'size'        => '8',
    'name'       	=> 'arr_postcode',
    'id'          => 'arr_postcode',
    'value'       => $presetValues['arr_postcode'],
    'style'       => 'max-width: 180px',
    'class'       => 'form-control postcode'
  );

  $arrivalCityId =array(
    'type'        =>'hidden',
    'id'          =>'arr_city_id',
    'class'       => 'city_id',
    'name'        => 'arr_city_id',
    'value'       => $presetValues['arr_city_id']
  );

  $arrivalCityField = array(
    'size'        => '30',
    'name'       	=> 'arr_city',
    'id'          => 'arr_city',
    'value'       => $presetValues['arr_city'],
    'class'       => 'form-control city',
    'style'       => 'max-width: 400px',
    'readonly'    => 'true'
  );

  $arrivalDateStartField = array(
    'id'          => 'arr_start',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'arr_start',
    'value'       => $presetValues['arr_start'],
    'style'       => 'max-width: 180px',
    'class'       => 'form-control date'
  );

  $arrivalDateEndField = array(
    'id'          => 'arr_end',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'arr_end',
    'value'       => $presetValues['arr_end'],
    'style'       => 'max-width: 180px',
    'class'       => 'form-control date'
  );

// ----------------------------------------------------------------------------
  echo form_open('offer/anserToRequest/'.$id);
?>
<div class="form-group">
  <?php
    echo form_label('Prix: ');
    echo form_input($priceField);
    echo '<div style="color: red">' . form_error('price') . '</div>';
  ?>
</div>



<!-- Departure address line 1 -->
<div class="form-group">
  <?php
    echo form_label('Adresse de départ ligne 1: ');
    echo form_input($departureAddressLine1Field);
    echo '<div style="color: red">' . form_error('dep_add_1') . '</div>';
  ?>
</div>

<!-- Departure address line 2 -->
<div class="form-group">
  <?php
    echo form_label('Adresse de départ ligne 2: ');
    echo form_input($departureAddressLine2Field);
    echo '<div style="color: red">' . form_error('dep_add_2') . '</div>';
  ?>
</div>

<!-- Departure postcode -->
<div class="form-group">
  <?php
    echo form_label('Code postal de départ: ');
    echo form_input($departurePostcodeField);
    echo '<div style="color: red">' . form_error('dep_city') . '</div>';

// Departure city
    echo '<br/>';
    echo form_label('Ville de départ: ');
    echo form_input($departureCityField);
    echo form_input($departureCityId);
  ?>
</div>
<?php
// Departure date start
  echo form_label('Plage temporelle de prise en charge de la marchandise');
?>
<div class="row">
  <div class="form-group col-md-6">
    <?php
      echo form_label('Début: ');
      echo '<br/>';
      echo form_label('Date: ');
      echo form_input($departureDateStartField);
      echo '<div style="color: red">' . form_error('dep_start') . '</div>';

// Departure time start
      echo form_label('Heure : &nbsp');
      echo form_dropdown('dep_start_hour', $hours, $presetValues['dep_start_hour']);
      echo '&nbsp';
      echo form_label('&nbspMinutes: &nbsp');
      echo form_dropdown('dep_start_minutes', $minutes, $presetValues['dep_start_minutes']);
    ?>
  </div>

<!-- Departure date end -->
  <div class="form-group col-md-6">
    <?php
      echo form_label('Fin: ');
      echo '<br/>';
      echo form_label('Date: ');
      echo form_input($departureDateEndField);
      echo '<div style="color: red">' . form_error('dep_end') . '</div>';

// Departure time end
      echo form_label('Heure : &nbsp');
      echo form_dropdown('dep_end_hour', $hours, $presetValues['dep_end_hour']);
      echo '&nbsp';
      echo form_label('&nbspMinutes: &nbsp');
      echo form_dropdown('dep_end_minutes', $minutes, $presetValues['dep_end_minutes']);
    ?>
  </div>
</div>

<!-- Arrival address line 1 -->
<div class="form-group">
  <?php
    echo form_label('Adresse d\'arrivée ligne 1: ');
    echo form_input($arrivalAddressLine1Field);
    echo '<div style="color: red">' . form_error('arr_add_1') . '</div>';
  ?>
</div>

 <!-- Arrival address line 2 -->
<div class="form-group">
  <?php
    echo form_label('Adresse d\'arrivée ligne 2: ');
    echo form_input($arrivalAddressLine2Field);
    echo form_error('arr_add_2');
  ?>
</div>

 <!-- Arrival postcode -->
<div class="form-group">
  <?php
    echo form_label('Code postal d\'arrivée: ');
    echo form_input($arrivalPostcodeField);
    echo '<div style="color: red">' . form_error('arr_city') . '</div>';

// Arrival city
    echo '<br/>';
    echo form_label('Ville d\'arrivée: ');
    echo form_input($arrivalCityField);
    echo form_input($arrivalCityId);
  ?>
</div>

<!-- Arrival date start -->
<?php
  echo form_label('Plage temporelle de remise de la marchandise');
?>
<div class="row">
  <div class="form-group col-md-6">
    <?php
      echo form_label('Début: ');
      echo '<br>';
      echo form_label('Date: ');
      echo form_input($arrivalDateStartField);
      echo '<div style="color: red">' . form_error('arr_start') . '</div>';

// Arrival time start
      echo form_label('Heure : &nbsp');
      echo form_dropdown('arr_start_hour', $hours);
      echo '&nbsp';
      echo form_label('&nbspMinutes: &nbsp');
      echo form_dropdown('arr_start_minutes', $minutes);
    ?>
  </div>

<!-- Arrival date end -->
  <div class="form-group col-md-6">
    <?php
      echo form_label('Fin: ');
      echo '<br/>';
      echo form_label('Date: ');
      echo form_input($arrivalDateEndField);
      echo '<div style="color: red">' . form_error('arr_end') . '</div>';

// Arrrival time end
      echo form_label('Heure : &nbsp');
      echo form_dropdown('arr_end_hour', $hours);
      echo '&nbsp';
      echo form_label('&nbspMinutes: &nbsp');
      echo form_dropdown('arr_end_minutes', $minutes);
    ?>
  </div>
</div>

<<?php


// ---------------------------Submit button-------------------------------------
echo form_submit('submit',"proposer l'offre");

?>
