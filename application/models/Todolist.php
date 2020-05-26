<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todolist extends CI_Model {
    
    public function create($tableName,$data){
      $id = $this->db->insert($tableName,$data);
      return $id;     
    }

public function delete($tableName,$clause){
     $this->db->delete($tableName,$clause);
    }

public function update($tableName,$data,$clause){
      $this->db->update($tableName,$data,$clause);

    }

    public function fetchOne($tableName,$where){
      $this->db->select();
      $this->db->from($tableName);
      $this->db->where($where);
      $query =$this->db->get();
     return  $query->result();
    }

public function fetchAll($tableName){
      $this->db->select();
      $this->db->from($tableName);
      $query =$this->db->get();
     return $query->result();
    }

public function send_mail($data){
        $mail_message='Dear '.$data['fullname'].','. "\r\n";
        $mail_message.='Thanks for contacting  us.<br> Regarding to forgot password,<br> Your <b>token(OTP)</b> is <b>'.$data['random_code'].'</b>'."\r\n";
        $mail_message.='<br>This token provide you with opportunity <br>to change your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>WiserTech&copy2020';
try{     
  $this->load->library("email");   
$this->email->from('akoyetunji@gmail.com', 'Akeem Adekunle');
$this->email->to('abibatalao28@gmail.com');
$this->email->subject('Forgot Password');
$this->email->message('Testing the email class.');
$this->email->send();
}catch(Exception $ex){

}
return $mail_message;
}
}

