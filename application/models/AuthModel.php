<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    public function login($username, $password) {
        // Query untuk mengambil informasi pengguna berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() === 1) {
            $user = $query->row();

            // Verifikasi kata sandi
            if (password_verify($password, $user->password)) {
                return $user; // Kredensial valid
            }
        }

        return NULL; // Kredensial tidak valid
    }

    public function getUser($user_id){
        return $this->db->get_where('users', array('user_id' => $user_id))->row();
    }
}
