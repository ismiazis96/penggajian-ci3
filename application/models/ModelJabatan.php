<?php
Class ModelJabatan extends CI_Model
{
  function TampilJabatan() 
    {
        $this->db->order_by('id_jabatan', 'ASC');
        return $this->db->from('data_jabatan')
          ->get()
          ->result();
    }

    function Getjabatan($nama_jabatan = '')
    {
      return $this->db->get_where('data_jabatan', array('nama_jabatan' => $nama_jabatan))->row();
    }
    function HapusJabatan($nama_jabatan)
    {
        $this->db->delete('data_jabatan',array('nama_jabatan' => $nama_jabatan));
    }
}