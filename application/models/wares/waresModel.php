<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class WaresModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function createWare($name, $desc, $goodsArray)
  {
    // Create an array with the values for the insert on the table Wares
    $data = array(
      'name' => $name ,
      'description' => $desc
    );

    $this->db->insert('Wares', $data); // Create a new ware
    $id = $this->db->insert_id(); // Get the ID of the last insert

    // For each goods selected by the user, insert a line in the wares constitution
    foreach ($goodsArray as $key => $value) {
      $data = array(
        'wares' => $id,
        'goods' => $key,
        'number' => $value
      );

      $this->db->insert('WaresConstitution', $data);
    }
    return $id;
  }
  function OLD_get_wares_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('Wares');
    $row = $query->row(0);

    $respons =  array(
      'id' => $row->id,
      'name' => $row->name,
      'description' => $row->description
    );


    $this->db->where('wares', $id);
    $query = $this->db->get('WaresConstitution');
    $result = $query->result_array();

    $content = array(
      'boxes' =>  array(),
      'pallets' => array(),
      'passengers' => array()
    );


    foreach ($result as $row) {
      $goodsId = $row['goods'];
      $goodsQuantity = $row['number'];

      $goods = $this->goodsmodel->get_goods_by_id($goodsId);
      $goods['quantity'] = $goodsQuantity;


      switch ($goods['goodsType']) {
        case 'Passenger':
          array_push( $content['passengers'], $goods);
          break;

        case 'Pallet':
          array_push( $content['pallets'], $goods);
          break;

        case 'Box':
          array_push( $content['boxes'], $goods);
          break;
      }

    }

          if(count($content['passengers']) < 1){
            unset($content['passengers']);
          }

          if(count($content['boxes']) < 1){
            unset($content['boxes']);
          }

          if(count($content['pallets']) < 1){
            unset($content['pallets']);
          }

          $respons['content'] = $content;
          return $respons;
  }
  function get_wares_by_id($id){

    $this->db->where('id', $id);
    $query = $this->db->get('Wares');
    $row = $query->row(0);

    $respons =  array(
      'id' => $row->id,
      'name' => $row->name,
      'description' => $row->description,
      'content' => array()
    );


    $boxQuery ="SELECT waresconstitution.number , box.hight_mm , box.length_mm, box.width_mm , box.weight_kg
            FROM box
            INNER JOIN waresconstitution ON box.id = waresconstitution.goods
            WHERE waresconstitution.wares = ?";
      $palletQuery="SELECT waresconstitution.number , pallet.hight_mm , pallet.length_mm, pallet.width_mm , pallet.weight_kg
                FROM pallet
                INNER JOIN waresconstitution ON pallet.id = waresconstitution.goods
                WHERE waresconstitution.wares = ?";
      $passagerQuery="SELECT waresconstitution.number , passenger.type
                FROM passenger
                INNER JOIN waresconstitution ON passenger.id = waresconstitution.goods
                WHERE waresconstitution.wares = ?";


  $query = $this->db->query($boxQuery, array($id));
  if ($query->num_rows() > 0){
        $respons['content']['boxes'] =  $query->result_array();
  }

  $query = $this->db->query($palletQuery, array($id));
  if ($query->num_rows() > 0){
      $respons['content']['pallets'] =  $query->result_array();
  }

  $query = $this->db->query($passagerQuery, array($id));
  if ($query->num_rows() > 0){
      $respons['content']['passengers'] =  $query->result_array();
  }
return $respons;
  }

}
