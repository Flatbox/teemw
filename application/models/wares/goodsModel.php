<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GoodsModel extends CI_Model
{
  function __construct()
	{
		parent::__construct();
  }

  function get_goods_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('Goods');

    if ($query->num_rows() != 1)
    return NULL;

    $row = $query->row();
    $type = $row->goods_type;
    $query = $this->db->get($type);

    $tmp = $query->row(0);
    $row = get_object_vars($tmp);
    $row['goodsType']=   $type;
    return $row;
  }

  function get_all_goods()
  {
    $query = $this->db->get('Goods');
    return $query->result_array();
  }

  function get_all_boxes() {
    $query = $this->db->get('Box');
    return $query->result_array();
  }

  function get_all_pallets() {
    $query = $this->db->get('Pallet');
    return $query->result_array();
  }

  function get_all_passengers() {
    $query = $this->db->get('Passenger');
    return $query->result_array();
  }
}
