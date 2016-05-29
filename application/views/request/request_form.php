<?php
/*
$data = array(
  'owner'  => $owner ,
  'wares' => $wares,
  'expirationDate' => $expirationDate,
  'departure_loc' => $departure_loc,
  'departure_start' => $departure_start,
  'departure_end' => $departure_end,
  'arrival_loc' => $arrival_loc,
  'arrival_start' => $arrival_start,
  'arrival_end' => $arrival_end
);
*/

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

  $expirationDateField = array(
    'id'          => 'exp_date',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'exp_date',
    'value'				=> set_value('exp_date'),
    'style'       => 'max-width: 180px',
    'class'       => 'form-control date'
  );

  $departureAddressLine1Field = array(
    'id'          => 'dep_add_1',
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'dep_add_1',
    'value'				=> set_value('dep_add_1'),
    'style'       => 'max-width: 400px',
    'class'       => 'form-control'
  );

  $departureAddressLine2Field = array(
    'id'          => 'dep_add_2',
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'dep_add_2',
    'value'				=> set_value('dep_add_2'),
    'style'       => 'max-width: 400px',
    'class'       => 'form-control'
  );

  $departurePostcodeField = array(
    'id'          => 'dep_postcode',
    'maxlength'   => '8',
    'size'        => '8',
    'name'       	=> 'dep_postcode',
    'class'       => 'form-control postcode',
    'style'       => 'max-width: 180px',
    'value'				=> set_value('dep_postcode')
  );

  $departureCityField = array(
    'id'          => 'dep_city',
    'size'        => '30',
    'name'       	=> 'dep_city',
    'class'       => 'form-control city',
    'style'       => 'max-width: 400px',
    'value'				=> set_value('dep_city'),
    'readonly'    => 'true'
  );

  $departureDateStartField = array(
    'id'          => 'dep_start',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'dep_start',
    'style'       => 'max-width: 180px',
    'value'				=> set_value('dep_start'),
    'class'       => 'form-control date'
  );

  $departureDateEndField = array(
    'id'          => 'dep_end',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'dep_end',
    'style'       => 'max-width: 180px',
    'value'				=> set_value('dep_end'),
    'class'       => 'form-control date'
  );

  $arrivalAddressLine1Field = array(
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'arr_add_1',
    'id'          => 'arr_add_1',
    'style'       => 'max-width: 400px',
    'value'				=> set_value('arr_add_1'),
    'class'       => 'form-control'
  );

  $arrivalAddressLine2Field = array(
    'maxlength'   => '80',
    'size'        => '30',
    'name'       	=> 'arr_add_2',
    'id'          => 'arr_add_2',
    'style'       => 'max-width: 400px',
    'value'				=> set_value('arr_add_2'),
    'class'       => 'form-control'
  );

  $arrivalPostcodeField = array(
    'maxlength'   => '8',
    'size'        => '8',
    'name'       	=> 'arr_postcode',
    'id'          => 'arr_postcode',
    'style'       => 'max-width: 180px',
    'class'       => 'form-control postcode',
    'value'				=> set_value('arr_postcode')
  );

  $arrivalCityField = array(
    'size'        => '30',
    'name'       	=> 'arr_city',
    'id'          => 'arr_city',
    'class'       => 'form-control city',
    'style'       => 'max-width: 400px',
    'value'				=> set_value('arr_city'),
    'readonly'    => 'true'
  );

  $arrivalDateStartField = array(
    'id'          => 'arr_start',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'arr_start',
    'style'       => 'max-width: 180px',
    'value'				=> set_value('arr_start'),
    'class'       => 'form-control date'
  );

  $arrivalDateEndField = array(
    'id'          => 'arr_end',
    'maxlength'   => '10',
    'size'        => '10',
    'name'       	=> 'arr_end',
    'style'       => 'max-width: 180px',
    'value'				=> set_value('arr_end'),
    'class'       => 'form-control date'
  );
// ----------------------------------------------------------------------------
  echo form_open('request/createRequest');
?>

<div class="form-group">
    <?php echo form_label('Cargaison: ');?>
    <?php
      if(!$this->session->userdata('wares_created')) {
        $data = array(
          'name'      => 'select_wares',
          'content'     => 'Sélectionner marchandises',
          'onClick'   => "redirect('" . base_url() . "wares/showGoods')",
          'class'     => 'btn btn-default'
        );
        echo '<br/>';
        echo form_button($data);
      }
      else {
        echo '<br/>';
        echo 'Marchandise sélectionnée';
        echo form_input(array('type'=>'hidden', 'id' =>'wares_created', 'name' => 'wares_created', 'value' => '1'));
      }

      echo '<div style="color: red">' . form_error('wares_created') . '</div>';
    ?>
  </div>

<!-- Expiration date -->
<div class="form-group">
  <?php
    echo form_label('Date d\'expiration ');
    echo form_input($expirationDateField);
    echo '<div style="color: red">' . form_error('exp_date') . '</div>';
    ?>
</div>

<!-- Expiration time -->
<div class="form-group">
  <?php
    echo form_label('Heure d\'expiration: ');
    echo '<br/>';
    echo form_label('Heures : &nbsp');
    echo form_dropdown('exp_hour', $hours);
    echo '&nbsp';
    echo form_label('&nbspMinutes: &nbsp');
    echo form_dropdown('exp_minutes', $minutes);
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
    echo form_input(array('type'=>'hidden', 'id' =>'dep_city_id', 'class' => 'city_id', 'name' => 'dep_city_id', 'value' => set_value('dep_city_id')));
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
      echo form_dropdown('dep_start_hour', $hours);
      echo '&nbsp';
      echo form_label('&nbspMinutes: &nbsp');
      echo form_dropdown('dep_start_minutes', $minutes);
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
      echo form_dropdown('dep_end_hour', $hours);
      echo '&nbsp';
      echo form_label('&nbspMinutes: &nbsp');
      echo form_dropdown('dep_end_minutes', $minutes);
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
    echo form_input(array('type'=>'hidden', 'id' =>'arr_city_id', 'class' => 'city_id', 'name' => 'arr_city_id', 'value' => set_value('arr_city_id')));
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

<?php
// ---------------------------Submit button-------------------------------------
  echo form_submit('submit', 'Valider cargaison', "class='btn btn-default'");
  echo '<br><br>';
?>
