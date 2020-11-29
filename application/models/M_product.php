<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_product extends CI_Model
{
    public function get_product()
    {
        return $this->db->get('product')->result_array();
    }

    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
}