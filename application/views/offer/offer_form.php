<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/base/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/script.js" ></script>

<?php

$this->output->enable_profiler(true);

echo form_open('offer/anserToRequest/'.$id);
echo '<br/>';
echo '<br/>';


// ---------------------------time array-----------------------------------
$hours = array(
  '' => '',
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

    '' => '',
  '00'  => '00',
  '15'  => '15',
  '30'  => '30',
  '45'  => '45'
);

// ---------------------------Departure address line 1--------------------------
$textfieldData = array(
  'id'          => 'price',
  'maxlength'   => '80',
  'size'        => '30',
  'name'       	=> 'price',
  'value'				=> set_value('price')
);

echo form_label('Prix proposé: ');
echo form_input($textfieldData);
echo form_error('price');
echo '<br/>';
echo '<br/>';

// ---------------------------Departure address line 1--------------------------
$textfieldData = array(
  'id'          => 'dep_add_1',
  'maxlength'   => '80',
  'size'        => '30',
  'name'       	=> 'dep_add_1',
  'value'				=> $departure_loc['line1']
);

echo form_label('Dep Address line 1: ');
echo form_input($textfieldData);
echo form_error('dep_add_1');
echo '<br/>';

// ---------------------------Departure address line 2--------------------------
$textfieldData = array(
  'id'          => 'dep_add_2',
  'maxlength'   => '80',
  'size'        => '30',
  'name'       	=> 'dep_add_2',
  'value'				=> $departure_loc['line2']
);

echo form_label('Dep Address line 2: ');
echo form_input($textfieldData);
echo form_error('dep_add_2');
echo '<br/>';

// ---------------------------Departure postcode-------------------------------
$textfieldData = array(
  'id'          => 'dep_postcode',
  'maxlength'   => '8',
  'size'        => '8',
  'name'       	=> 'dep_postcode',
  'class'       => 'postcode',
  'value'				=> $departure_loc['postCode']
);
echo "<div>";
echo form_label('Departure postcode: ');
echo form_input($textfieldData);
echo form_error('dep_postcode');

// ---------------------------Departure city-----------------------------------
$textfieldData = array(
  'id'          => 'dep_city',
  'size'        => '30',
  'name'       	=> 'dep_city',
  'class'       => 'city',
  'value'				=> $departure_loc['city'],
  'readonly'    => 'true'
);

echo form_label('Departure city: ');
echo form_input($textfieldData);
echo form_error('dep_city');

echo form_input(array('type'=>'hidden', 'id' =>'dep_city_id', 'class' => 'city_id', 'name' => 'dep_city_id', 'value' => $departure_loc['city_id']));
echo "</div>";

// ---------------------------Departure date start------------------------------
$textfieldData = array(
  'id'          => 'dep_start',
  'maxlength'   => '10',
  'size'        => '10',
  'name'       	=> 'dep_start',
  'value'				=> substr ($arrival_start , 0, 10),
  'class'       => 'date'
);

echo form_label('Departature date start: ');
echo form_input($textfieldData);
echo form_error('dep_start');
echo '<br/>';

// ---------------------------Departure time start------------------------------
echo form_label('Departure start hour: ');
echo form_dropdown('dep_start_hour', $hours);
echo form_label('minutes: ');
echo form_dropdown('dep_start_minutes', $minutes);
echo '<br/>';

// ---------------------------Departure date end--------------------------------
$textfieldData = array(
  'id'          => 'dep_end',
  'maxlength'   => '10',
  'size'        => '10',
  'name'       	=> 'dep_end',
  'value'				=> substr ($arrival_end , 0, 10),
  'class'       => 'date'
);

echo form_label('Departature date end: ');
echo form_input($textfieldData);
echo form_error('dep_end');
echo '<br/>';

// ---------------------------Departure time end------------------------------
echo form_label('Departure end hour: ');
echo form_dropdown('dep_end_hour', $hours);
echo form_label('minutes: ');
echo form_dropdown('dep_end_minutes', $minutes);

$textfieldData = array(
  'id'          => 'dep_end',
  'maxlength'   => '10',
  'size'        => '10',
  'name'       	=> 'dep_end',
  'value'				=> substr ($arrival_end , 0, 10),
  'class'       => 'time'
);

set_value('dep_end_hour', '10');
set_value('dep_end_minutes', '30');



echo '<br/>';


echo '<br/>';

// ---------------------------Arrival address line 1----------------------------
$textfieldData = array(
  'maxlength'   => '80',
  'size'        => '30',
  'name'       	=> 'arr_add_1',
  'id'          => 'arr_add_1',
  'value'				=> $arrival_loc['line1']
);

echo form_label('Arrival Address line 1: ');
echo form_input($textfieldData);
echo form_error('arr_add_1');
echo '<br/>';

// ---------------------------Arrival address line 2----------------------------
$textfieldData = array(
  'maxlength'   => '80',
  'size'        => '30',
  'name'       	=> 'arr_add_2',
  'id'          => 'arr_add_2',
  'value'				=> $arrival_loc['line2']
);

echo form_label('Arrival Address line 2: ');
echo form_input($textfieldData);
echo form_error('arr_add_2');
echo '<br/>';

// ---------------------------Arrival postcode----------------------------------
$textfieldData = array(
  'maxlength'   => '8',
  'size'        => '8',
  'name'       	=> 'arr_postcode',
  'id'          => 'arr_postcode',
  'class'       => 'postcode',
  'value'				=> $arrival_loc['postCode']
);

echo "<div>";
echo form_label('Arrival postcode: ');
echo form_input($textfieldData);
echo form_error('arr_postcode');

// ---------------------------Arrival city--------------------------------------
$textfieldData = array(
  'size'        => '30',
  'name'       	=> 'arr_city',
  'id'          => 'arr_city',
  'class'       => 'city',
  'value'				=> $arrival_loc['city'],
  'readonly'    => 'true'
);

echo form_label('Arrival city: ');
echo form_input($textfieldData);
echo form_error('arr_city');
echo form_input(array('type'=>'hidden', 'id' =>'arr_city_id', 'class' => 'city_id', 'name' => 'arr_city_id', 'value' => $arrival_loc['city_id']));
echo "</div>";

// ---------------------------Arrival date start------------------------------
$textfieldData = array(
  'id'          => 'arr_start',
  'maxlength'   => '10',
  'size'        => '10',
  'name'       	=> 'arr_start',
  'value'				=> substr ($arrival_start , 0, 10),
  'class'       => 'date'
);

echo form_label('Arrival date start: ');
echo form_input($textfieldData);
echo form_error('arr_start');
echo '<br/>';

// ---------------------------Arrival time start------------------------------
echo form_label('Arrival start hour: ');
echo form_dropdown('arr_start_hour', $hours);
echo form_label('minutes: ');
echo form_dropdown('arr_start_minutes', $minutes);
echo '<br/>';

// ---------------------------Arrival date end--------------------------------
$textfieldData = array(
  'id'          => 'arr_end',
  'maxlength'   => '10',
  'size'        => '10',
  'name'       	=> 'arr_end',
  'value'				=> substr ($arrival_end , 0, 10),
  'class'       => 'date'
);

echo form_label('Arrival date end: ');
echo form_input($textfieldData);
echo form_error('arr_end');
echo '<br/>';

// ---------------------------Arrrival time end------------------------------
echo form_label('Arrival end hour: ');
echo form_dropdown('arr_end_hour', $hours);
echo form_label('minutes: ');
echo form_dropdown('arr_end_minutes', $minutes);

echo '<br/>';

// ---------------------------Submit button-------------------------------------
echo form_submit('submit',"proposer l'offre");

?>
