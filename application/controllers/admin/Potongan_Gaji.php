<?php
class Potongan_gaji extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPenggajian');

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

	public function index() {
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->ModelPenggajian->get_data('potongan_gaji')-> result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/potongan_gaji/potongan_gaji', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data() {
        $data['title'] = "Tambah Potongan Gaji";

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/potongan_gaji/tambah_potonganGaji', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_aksi() {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $potongan           = $this->input->post('potongan');
            $jml_potongan       = $this->input->post('jml_potongan');
            }

            $data = array(
                'potongan'      => $potongan,
                'jml_potongan'  => $jml_potongan

            );

            $this->ModelPenggajian->insert_data($data, 'potongan_gaji');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/potongan_gaji');
        }

        public function update_data($id) {
        $where = array('id' => $id);
        $data['title'] = "Update Potongan Gaji";
        $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id= '$id'")->result();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/potongan_gaji/update_potonganGaji', $data);
        $this->load->view('template_admin/footer');
        
        }

        public function update_data_aksi() {
            $this->_rules();

            if($this->form_validation->run() == FALSE) {
                $this->update_data();
            } else {
                $id                 = $this->input->post('id');
                $potongan           = $this->input->post('potongan');
                $jml_potongan       = $this->input->post('jml_potongan');
                }

                $data = array(
                'potongan'      => $potongan,
                'jml_potongan'  => $jml_potongan

                );

                $where = array(
                    'id' => $id

                );

                $this->ModelPenggajian->update_data('potongan_gaji', $data, $where);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('admin/potongan_gaji');
            
        }

        public function _rules() {
            $this->form_validation->set_rules('potongan','Jenis Potongan','required');
            $this->form_validation->set_rules('jml_potongan','Jumlah Potongan','required');
        }

        public function delete_data($id) {
            $where = array('id' => $id);
            $this->ModelPenggajian->delete_data($where, 'potongan_gaji');
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('admin/potongan_gaji');
        }

    }
?>