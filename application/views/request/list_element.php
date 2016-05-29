<?php

echo "<h1>ID: ";
echo form_label($id);
echo " - ";
echo form_label($wares['description']);
echo '</h1>';
echo "<h3>valide jusqu'à: ";
echo form_label($expirationDate);
echo '</h3>';

echo "
      <table>
        <th>De</th>
        <th>A<th>
      ";
echo '<tr>';
echo '<td>';
echo form_label($departure_loc['line1']);
echo '</td>';
echo '<td>';
echo form_label($arrival_loc['line1']);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo form_label($departure_loc['line2']);
echo '</td>';
echo '<td>';
echo form_label($arrival_loc['line2']);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo form_label($departure_loc['postCode']);
echo " ";
echo form_label($departure_loc['city']);
echo '</td>';
echo '<td>';
echo form_label($arrival_loc['postCode']);
echo " ";
echo form_label($arrival_loc['city']);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo form_label($departure_loc['state']);
echo " ";
echo form_label($departure_loc['full_state']);
echo '</td>';
echo '<td>';
echo form_label($departure_loc['state']);
echo " ";
echo form_label($arrival_loc['full_state']);
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo "<table>
        <th>De</th>
        <th>A<th>
      ";
echo '<tr>';
echo '<td>';
echo form_label($departure_start);
echo '</td>';
echo '<td>';
echo form_label($departure_end);
echo '</td>';
echo '/<tr>';
echo '</table>';
echo '</td>';
echo '<td>';
echo "
      <table>
        <th>De</th>
        <th>A<th>
      ";
echo '<tr>';
echo '<td>';
echo form_label($arrival_start);
echo '<td>';
echo '<td>';
echo form_label($arrival_end);
echo '</td>';
echo '</tr>';
echo '</td>';

echo '</table>';
echo '</table>';

 ?>
