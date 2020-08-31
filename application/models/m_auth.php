<?php
class m_auth extends CI_Model
{
    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/pengaduan/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data();
        }
        print_r($this->upload->display_errors());

        return "default.jpg";
    }

    public function register_m()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[15]|max_length[16]', [
            'required' => 'Mohon masukkan NIK!',
            'min_length' => 'NIK tidak boleh kurang dari 15 suku kata',
            'max_length' => 'NIK tidak boleh melibihi 16 suku kata'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Mohon masukkan nama lengkap anda!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[masyarakat.email]', [
            'required' => 'Mohon masukkan email anda!',
            'valid_email' => 'Mohon masukkan email yang tepat!',
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Mohon masukkan kata sandi!',
            'min_length' => 'Kata Sandi terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', [
            'matches' => 'Kata sandi tidak cocok!'
        ]);
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[10]|max_length[13]', [
            'required' => 'Mohon masukkan Nomor Telepon!',
            'min_length' => 'Nomor terlalu pendek',
            'max_length' => 'Nomor tidak boleh melebihi 13 angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/m_register');
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'tel' => $this->input->post('telp', true),
                'image' => $this->_uploadImage(),
                'tgl_ditambahkan' => time()
            );

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
            redirect('auth/login');
        }
    }

    public function register_ap()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Mohon masukkan nama lengkap anda!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[petugas.email]', [
            'required' => 'Mohon masukkan email anda!',
            'valid_email' => 'Mohon masukkan email yang tepat!',
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Mohon masukkan kata sandi!',
            'min_length' => 'Kata Sandi terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', [
            'matches' => 'Kata sandi tidak cocok!'
        ]);
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[10]|max_length[13]', [
            'required' => 'Mohon masukkan Nomor Telepon!',
            'min_length' => 'Nomor terlalu pendek',
            'max_length' => 'Nomor tidak boleh melebihi 13 angka'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = array(
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => $this->input->post('telp', true),
                'image' => $this->_uploadImage(),
                'level' => $this->input->post('level'),
                'tgl_ditambahkan' => time()
            );

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
            redirect('auth/login');
        }
    }
}
