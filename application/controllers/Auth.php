<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        // jika user nya ada, $user mengembalikan nilai
        if ($user) {
            if ($user['is_active'] == 1) {
                // cek passwordnya
                if (password_verify($password, $user['password'])) {
                    echo "passwordnya bener";
// user ketemu, passwordnya bener, tinggal di-redirect ke halaman tertentu dengan session
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Either your email or password is incorrect!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Either your email or password is incorrect!</div>');
            }
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('firstName', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', ['is_unique' => 'This email has already been taken.']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Does Not Match',
            'min_length' => 'Password is Too Short',

        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Cilogin Registration';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/footer');
        } else {
            echo "berhasil";
            $data = [
                'firstName' => htmlspecialchars($this->input->post('firstName', true)),
                'lastName' => htmlspecialchars($this->input->post('lastName', true)),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created. Please Login!</div>');
            redirect('auth');
        }
    }
}
