<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doer extends CI_Controller {

		public function  __construct(){

          parent:: __construct();
		$this->load->model("Todolist");
      $this->load->library("form_validation");
      $this->load->library("session");
      $this->emailAddr="";
	}

public function index(){
$records=$this->Todolist->fetchAll("login");
$data=array("users"=>$records);
$this->load->view("login",$data);
  }
  
public function createLogin(){
if($this->input->post("submit")){
$this->form_validation->set_rules("username","Username",'required');
 $this->form_validation->set_rules("password","Password",'required');
  if ($this->form_validation->run() == TRUE)
			   {
     $username=$this->input->post("username");
	   $password=md5($this->input->post("password"));
      $signup=array("username"=>$username,"password"=>$password);
    $record=$this->Todolist->fetchOne("signup", $signup);
     if(!empty($record)){
     $this->session->set_userdata(array("username"=>$username)); 
     redirect(site_url("doer/viewlist"));
    }    
}
}
 $this->load->view("login");
    }

    public function resetpassword(){
if($this->input->post("submit")){
 $this->form_validation->set_rules("email","Email",'required|valid_email');
  if($this->form_validation->run() == TRUE)
			   {
     $email=$this->input->post("email");
	   $signup=array("email"=>$email);
    $record=$this->Todolist->fetchOne("signup", $signup);
     if(!empty($record)){
      $otp= rand(100000,999999);
      $expiryDate =strtotime("+10 minutes");
      $newRecord=array("random_code"=>$otp,"email"=>$email,"expiry_time"=>$expiryDate);
      $this->Todolist->create("forgot_password",$newRecord);
      $newRecord['fullname'] = $record[0]->fullname;
     echo $message =$this->Todolist->send_mail($newRecord);

    }    
    else {
        echo "<script>alert(' $email not found, please enter correct email id')</script>";
    }
    //redirect(site_url("doer/resetpassword2"));
  }
}
 $this->load->view("resetpassword");
    }

 public function resetpassword2(){
    if($this->input->post("submit")){
       $this->emailAddr=$this->input->post("email");
   $this->form_validation->set_rules("email","email",'required');
    $this->form_validation->set_rules("reset","Reset Code",'required|callback_check_token');
   $this->form_validation->set_rules("newpassword","New Password",'trim|required');
	$this->form_validation->set_rules("confirmpass", "Password Confirmation",'trim|required|matches[newpassword]');
 if($this->form_validation->run() == TRUE)
			{
      $email=$this->input->post("email");
       $newpassword = md5($this->input->post("newpassword"));
       $signupData=array("password"=>$newpassword);
      $where=array("email"=>$email);
            $record=$this->Todolist->update("signup", $signupData,$where);
      redirect(site_url());
}
    } 
    
   $this->load->view("resetpassword2");
    }

    public function check_token($token){
       $email=$this->emailAddr;
       $record=$this->Todolist->fetchOne("forgot_password",array("email"=>$email,"random_code"=>$token));
       if (empty($record))
                {
                        $this->form_validation->set_message('check_token', 'Please enter a valid access code');
                        return FALSE;
                }
                $now = strtotime("now");
                $expiryTime = $record[0]->expiry_time;
                if($now > $expiryTime){
                     $this->form_validation->set_message('check_token', 'Sorry, the token you entered has expired');
                        return FALSE;
                }
                return true;

    }

 public function logout(){
$username=$this->session->userdata("username");
    if($username !=null){
      $this->session->unset_userdata("username");   
    }
    redirect(site_url());
         }

public function signup(){
$data = array("userId"=>"");
if($this->input->post("submit")){
   $this->form_validation->set_rules("fullname","Fullname",'required|min_length[5]');
   $this->form_validation->set_rules("username","Username",'required|is_unique[signup.username]');
   $this->form_validation->set_rules("email","Email",'trim|required|valid_email|is_unique[signup.email]');
	$this->form_validation->set_rules("password","Password","trim|required|min_length[8]");
	$this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'trim|required|matches[password]');
  if ($this->form_validation->run() == TRUE)
			   {
      $fullname=$this->input->post("fullname");
      $username=$this->input->post("username");
       $email=$this->input->post("email");
      $phonenumber=$this->input->post("phonenumber");
      $gender=$this->input->post("gender");
      $hashedpassword = md5($this->input->post("password"));
      $signup_array=array("fullname"=>$fullname,"username"=>$username,"email"=>$email,"phonenumber"=>$phonenumber,"gender"=>$gender,
      "password"=>$hashedpassword);
	   $id=$this->Todolist->create("signup", $signup_array);
      $data["userId"]=$id; 
      redirect(site_url());
                  }
            }
       $this->load->view("signup"); 
         }

public function createlist(){
 $username= $this->session->userdata("username");
 if($username!=null){
if($this->input->post("submit")){
      $events =$this->input->post("events");
	   $description=$this->input->post("description");
	   $date=$this->input->post("date");
	   $list_array=array("events"=>$events,"description"=>$description,"date"=>$date,"username"=>$username);
      $id=$this->Todolist->create("list", $list_array);
redirect(site_url("doer/viewlist"));  
 }
$this->load->view("create_list");
}
else{
redirect(site_url());
}
}

public function removefromList(){
   $username=$this->session->userdata("username");
    if($username !=null){
       $id=$this->input->get("id");
       $where_clause =array("id"=>$id);
       $this->Todolist->delete("list",$where_clause);
       redirect("doer/viewlist");
    }
else {
  redirect(site_url());
 }

}
public function updatetableList(){
   $username=$this->session->userdata("username");
    if($username !=null){
       $id=$this->input->get("id");
       $where_clause =array("id"=>$id);
       $record=$this->Todolist->fetchOne("list",$where_clause);
       $data=array("list"=>$record);
      $this->load->view("create_list2",$data); 
   }
  else {
   redirect(site_url());
}
 }

public function updatelistrecord(){
    if($this->input->post("submit")){
       $events =$this->input->post("events");
       $description =$this->input->post("description");
       $date=$this->input->post("date");
       $username=$this->input->post("username");
       $id=$this->input->post("list_id");
       $list_array=array("events"=>$events,"description"=>$description,"date"=>$date);
       $where=array("id"=>$id);
       $username=$this->Todolist->update("list",$list_array,$where);
    } 
    $this->load->view("updated");

   }

  public function viewlist(){
   $username=$this->session->userdata("username");
  if($username !=null){
       $where_clause =array("username"=>$username);
       $record=$this->Todolist->fetchOne("list",$where_clause);
       $data=array("list"=>$record);
       $this->load->view("view_list",$data);
  }
   else {
     redirect(site_url());
 }

   }
}

  