<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RequestModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function createRequest($owner, $wares, $expirationDate, $departure_loc, $departure_start, $departure_end, $arrival_loc, $arrival_start, $arrival_end)
  {
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

    $this->db->insert('request', $data); // Create a new request
  }
  function getRequestById($id){
    $this->db->where('id', $id);
    $query = $this->db->get('request');

    if ($query->num_rows() != 1)
    return NULL;

    $row = $query->row(0);

    $data = get_object_vars($row);

    return $data;

  }

  function get_request_by_owner($owner)
  {
    $this->db->where('owner', $owner);
    $query = $this->db->get('request');
    $row = $query->row(1);

    $respons =  array(
      'id' => $row->id,
      'owner' => $row->owner,
      'wares' => $row->wares,
      'expirationDate' => $row->expirationDate,
      'departure_loc' => $row->departure_loc,
      'departure_start' => $row->departure_start,
      'departure_end' => $row->departure_end,
      'arrival_loc' => $row->arrival_loc,
      'arrival_start' => $row->arrival_start,
      'arrival_end' => $row->arrival_end
    );

    return $respons;

  }
  function getValideRequest(){
    $sql = "SELECT * FROM request WHERE expirationDate >= NOW()";
    $query = $this->db->query($sql);

    $data = $query->row(0);

    return $query->result_array();
  }

}
