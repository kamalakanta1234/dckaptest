<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Users_model extends CI_Model{
     public function __construct()
        {
                parent::__construct();
                
        
        }


        public function countries(){
        	$country=$this->db->select('*')->get('countries')->result();
        	return $country;
        }
        public function get_state($country_id){
        		   $this->db->order_by('name','ASC');
        	$state=$this->db->select('id,name')->where('country_id',$country_id)->get('states')->result();

        	$output = '<option value="">Select State</option>';
          foreach($state as $row)
          {
           $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
          }
          return $output;
         

        }
         public function get_city($state_id){
        		   $this->db->order_by('name','ASC');
        	$state=$this->db->select('id,name')->where('state_id',$state_id)->get('cities')->result();

        	$output = '<option value="">Select City</option>';
          foreach($state as $row)
          {
           $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
          }
          return $output;
         

        }

         public function user_registration_model($registerdata){

         $isinserted=$this->db->insert('user_registration', $registerdata );
         if ($isinserted) {
              return true;          
         }else{
          return false;
         }
        
        }

        public function update_user($registration,$user_id){

          $this->db->where('user_id',$user_id);
          $this->db->limit('1');
          $data=$this->db->update('user_registration',$registration);
          if($data){
            return true;
          }else{
            return false;
          }
        }
        public function delete($user_id){

        	$this->db->where('user_id',$user_id);
        	$this->db->limit('1');
        	$data=$this->db->update('user_registration',array('user_active'=> 0));
        	if($data){
        		return true;
        	}else 
        	return false;

        }
        public function total_user($mobile,$dob,$email,$create_date,$name){

                      $this->db->where('user_active',1);
                        if(!empty($mobile)){
                          $this->db->where('user_mobile',$mobile);
                        }
                        if(!empty($dob)){
                          $this->db->where('user_dob',$dob);
                        }
                        if(!empty($email)){
                          $this->db->where('user_email',$email);
                        }
                        if(!empty($create_date)){
                          $this->db->where('user_created_at',$create_date);
                        }
                        if(!empty($name)){
                          $this->db->where('user_full_name',$name);
                                            }
                        
                      return $data = $this->db->select('*')->get('user_registration')->result();
          
                   }

      
        public function all_users($per_page = -1,$page = 1,$mobile,$dob,$email,$create_date,$name){

                         if($per_page > -1)
                         {
                          $this->db->limit($per_page, ($page - 1)*$per_page);
                         }
                        $this->db->select('*');
                        $this->db->order_by('user_name', 'ASC');
                        $this->db->where('user_active',1);
                         if(!empty($mobile)){
                          $this->db->where('user_mobile',$mobile);
                        }
                        if(!empty($dob)){
                          $this->db->where('user_dob',date("Y-m-d", strtotime($dob)));
                        }
                        if(!empty($email)){
                          $this->db->where('user_email',$email);
                        }
                        if(!empty($create_date)){
                          $this->db->where('user_created_at',date("Y-m-d", strtotime($create_date)));
                        }
                        if(!empty($name)){
                          $this->db->where('user_full_name',$name);
                                            }
                        $query = $this->db->get('user_registration');
                       return $family=$query->result();
                       

                          }
                        }
    ?>