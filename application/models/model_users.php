<?php

class Model_users extends CI_Model{
    //function to check if username/email is in the db
    public function can_log_in(){
        $this->db->where('user_email', $this->input->POST('email'));
        $this->db->where('password', md5($this->input->POST('password')));

        $query = $this->db->get('users');

        if($query->num_rows() == 1){
            return TRUE;
        }

        else{
            return FALSE;
        }
    }
}
?>
