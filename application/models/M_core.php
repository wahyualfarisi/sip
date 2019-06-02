<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_core extends CI_Model{

  function get_all($table)
  {
    return $this->db->get($table);
  }

  function get_where($table, $where)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);

    return $this->db->get();
  }

  function update_table($table, $data, $where)
  {
    $this->db->where($where);
    return $this->db->update($table, $data);
  }

  function delete_rows($table, $where)
  {
    $this->db->where($where);
    return $this->db->delete($table);
  }

  function add_data($table, $data)
  {
    return $this->db->insert($table, $data);
  }

}
