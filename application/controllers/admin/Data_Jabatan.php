<?php
class Data_jabatan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('ModelJabatan');

        if($this->session->userdata('hak_akses') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('login');
        }
    }

	function index()
	{
        $data['title'] = "Data Jabatan";

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan/list_jabatan', $data);
        $this->load->view('template_admin/footer');
    }

    function TampilJabatan()
    {
        $data['hasil']=$this->ModelJabatan->TampilJabatan();
        $this->load->view('admin/jabatan/data_jabatan',$data);
    }

    function tambah_jabatan()
    {
        $aksi=$this->input->post('aksi');
        $this->load->view('admin/jabatan/tambah_jabatan',$aksi);
    }

    function edit_jabatan()
    {
        $nama_jabatan=$this->input->post('nama_jabatan');
        $data['hasil']=$this->ModelJabatan->Getjabatan($nama_jabatan);
        $this->load->view('admin/jabatan/edit_jabatan',$data);
    }
    function hapus_jabatan()
    {
        $nama_jabatan=$this->input->post('nama_jabatan');
        $data['hasil']=$this->ModelJabatan->Getjabatan($nama_jabatan);
        $this->load->view('admin/jabatan/hapus_jabatan',$data);
    }

    function simpanJabatan()
    {
        $data = array(
            'nama_jabatan'=>$this->input->post('nama_jabatan'),
            'gaji_pokok'=>$this->input->post('gaji_pokok'),
            'tj_transport'=>$this->input->post('tj_transport'),
            'uang_makan'=>$this->input->post('uang_makan')
            );
            $this->db->insert('data_jabatan',$data);
    }

    function editJabatan()
    {
        $data = array(
            'nama_jabatan'=>$this->input->post('nama_jabatan_baru'),
            'gaji_pokok'=>$this->input->post('gaji_pokok'),
            'tj_transport'=>$this->input->post('tj_transport'),
            'uang_makan'=>$this->input->post('uang_makan')
		);
        $nama_jabatan = $this->input->post('nama_jabatan_lama');
        $this->db->where('nama_jabatan', $nama_jabatan);
        $this->db->update('data_jabatan',$data);
    }
    function hapusJabatan()
    {
        $nama_jabatan=$this->input->post('nama_jabatan');
        $this->db->delete('data_jabatan',array('nama_jabatan' => $nama_jabatan));
    }
}
?>