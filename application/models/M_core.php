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

  function getMaxNumber($table, $field)
  {
    $query = $this->db->query("SELECT max($field) as maxKode FROM $table ");
    return $query;
  }

  function get_order($table, $field, $method)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->order_by($field, $method);
    return $this->db->get();
  }

  function gettablesearch($query, $table, $field)
  {
    $query = "SELECT * FROM $table WHERE $field LIKE '%$query%' ";
    return $this->db->query($query);
  }

}
