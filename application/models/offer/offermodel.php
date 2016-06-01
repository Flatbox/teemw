<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class OfferModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function createOffer($owner, $request, $price)
  {
    $data = array(
      'owner'  => $owner ,
      'request' => $request,
      'price' => $price,
      'status' => 1
    );

    $this->db->insert('offer', $data); // Create a new offer
  }
  function createOfferArray($data)
  {

    $insert = array(
      'owner'  => $data['owner'],
      'request'  => $data['request'],
      'price'  => $data['price'],
      'status'  => 1,
      'departure_loc'  => NULL,
      'departure_start'  => NULL,
      'departure_end'  => NULL,
      'arrival_loc'  => NULL,
      'arrival_start'  => NULL,
      'arrival_end'  => NULL
    );
    if(isset($data['departure_loc'])){
      $insert['departure_loc']=$data['departure_loc']['id'];
    }
    if(isset($data['departure_start'])){
      $insert['departure_start']=$data['departure_start'];
    }
    if(isset($data['departure_end'])){
      $insert['departure_end']=$data['departure_end'];
    }
    if(isset($data['arrival_loc'])){
      $insert['arrival_loc']=$data['arrival_loc']['id'];
    }
    if(isset($data['arrival_start'])){
      $insert['arrival_start']=$data['arrival_start'];
    }
    if(isset($data['arrival_end'])){
      $insert['arrival_end']=$data['arrival_end'];
    }


    $this->db->insert('offer', $insert); // Create a new offer
  }

  function get_number_of_offer($request){

    $cmpt=0;

    $this->db->where('request', $request);
    $query = $this->db->get('offer');

    if ($query->num_rows() < 1)
    return $cmpt;

    $row = $query->result_array();

    return $cmpt=count($row);

  }

}
