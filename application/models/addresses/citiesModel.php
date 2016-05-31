<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CitiesModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  // Got from http://www.codersmount.com/2012/09/jquery-ui-autocomplete-in-codeigniter-with-database/
  function get_cities_by_postcode($q)
  {
    $this->db->select('id, postCode, name, CONCAT(postCode, " ", name) AS postCode_city', FALSE);
    $this->db->like('postCode', $q, 'after');
    $query = $this->db->get('Cities');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label'] = $row['postCode_city'];
        $new_row['value'] = $row['postCode'];
        $new_row['id'] = $row['id'];
        $new_row['name'] = $row['name'];
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }

  function create_address($city_id, $line1, $line2) {
    $data = array(
      'city'  => $city_id ,
      'line1' => $line1,
      'line2' => $line2
    );

    $this->db->insert('address', $data); // Create a new address
    return $this->db->insert_id(); // Return the ID of the last insert
  }
  
  function get_adress_by_id($id){
    // Get the address
    $this->db->where('id', $id);
    $query = $this->db->get('address');
    $adress = $query->row_array();

    // Get the city by the id returned above
    $this->db->where('id', $adress['city']);
    $query = $this->db->get('cities');
    $tmp = $query->row_array();

    // Format the array
    $adress['city_id'] = $tmp['id'];
    $adress['postCode'] = $tmp['postCode'];
    $adress['city'] = $tmp['name'];
    $adress['state'] = $tmp['state'];

    // Get the name of the country by the iso_code
    $this->db->where('iso_code', $adress['state']);
    $query = $this->db->get('states');
    $tmp = $query->row_array();

    $adress['full_state'] = $tmp['name_FR'];

    return $adress;
  }
}
