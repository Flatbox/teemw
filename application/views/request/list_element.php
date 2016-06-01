<?php

  echo "<h3>ID: ";
  echo form_label($id);
  echo " - ";
  echo form_label($wares['name']);
  echo '</h3>';
  echo "<h4>valide jusqu'à: ";
  echo form_label($expirationDate);
  echo '</h4>';

echo "
      <table>
        <th>De</th>
        <th>A<th>
      ";

echo '<tr>';
echo '<td>';
echo form_label($departure_loc['postCode']);
echo " ";
echo form_label($departure_loc['city']);
echo '</td><td></td>';
echo '<td>';
echo form_label($arrival_loc['postCode']);
echo " ";
echo form_label($arrival_loc['city']);
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'Nombre d\'offre: ';
echo form_label($nbrOffre);
echo '</td>';
echo '</tr>';
echo '</table>';

 ?>
