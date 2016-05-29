<?php
	echo form_open('request/createWare');

// Prepare all fields
	$nameField = array(
		'maxlength'   => '35',
		'size'        => '35',
		'name'       	=> 'name',
		'value'				=> set_value('name'),
		'class'				=> 'form-control',
		'style'       => 'max-width: 400px',
	);

	$descField = array(
		'maxlength'   => '140',
		'size'        => '140',
		'name'       => 'desc',
		'value'				=> set_value('desc'),
		'class'				=> 'form-control',
		'style'       => 'max-width: 400px',
	);

	$goodField = array(
		'maxlength'   => '3',
		'size'        => '10',
		'style'       => 'width:100px',
	);

// ----------------------------------------------------------------------------
?>
<div class="form-group">
  <?php
		echo form_label('Nom');
		echo form_input($nameField);
		echo '<div style="color: red">' . form_error('name') . '</div>';
	?>
</div>

<div class="form-group">
	<?php
		echo form_label('Description');
		echo form_input($descField);
		echo '<div style="color: red">' . form_error('desc') . '</div>';
	?>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Cartons</div>
	<table class="table">
		<tr>
			<th>Hauteur en mm</th>
			<th>Longueur en mm</th>
			<th>Largeur en mm</th>
			<th>Poids max en kg</th>
			<th>Quantité</th>
		</tr>

		<?php
			foreach ($boxes as $box) {
				echo '<tr>';
					echo '<td>';
						echo $box['hight_mm'];
					echo '</td>';
					echo '<td>';
						echo $box['length_mm'];
					echo '</td>';
					echo '<td>';
						echo $box['width_mm'];
					echo '</td>';
					echo '<td>';
						echo $box['weight_kg'];
					echo '</td>';
					echo '<td>';
						$goodField['name'] = $box['id'];
						echo form_input($goodField);
					echo '</td>';
				echo '</tr>';
			}
		?>
	</table>
</div>
<br/>

<div class="panel panel-default">
  <div class="panel-heading">Pallettes</div>
	<table class="table">
		<tr>
			<th>Hauteur en mm</th>
			<th>Longueur en mm</th>
			<th>Largeur en mm</th>
			<th>Poids max en kg</th>
			<th>Quantité</th>
		</tr>

		<?php
			foreach ($pallets as $pallet) {
				echo '<tr>';
					echo '<td>';
						echo $pallet['hight_mm'];
					echo '</td>';
					echo '<td>';
						echo $pallet['length_mm'];
					echo '</td>';
					echo '<td>';
						echo $pallet['width_mm'];
					echo '</td>';
					echo '<td>';
						echo $pallet['weight_kg'];
					echo '</td>';
					echo '<td>';
						$goodField['name'] = $pallet['id'];
						echo form_input($goodField);
					echo '</td>';
				echo '</tr>';
			}
		?>
	</table>
</div>
<br/>

<div class="panel panel-default">
  <div class="panel-heading">Passagers</div>
	<table class="table">

	<tr>
		<th>Type</th>
		<th>Description</th>
		<th>Nombre de personnes</th>
	</tr>

	<?php
		foreach ($passengers as $passenger) {
			echo '<tr>';
				echo '<td>';
					echo $passenger['type'];
				echo '</td>';
				echo '<td>';
					echo $passenger['description'];
				echo '</td>';
				echo '<td>';
					$goodField['name'] = $passenger['id'];
					echo form_input($goodField);
				echo '</td>';
			echo '</tr>';
		}
	?>
	</table>
</div>

<?php
	echo form_submit('submit', 'Valider cargaison', "class='btn btn-default'");
	echo '<br/><br/>';
?>
