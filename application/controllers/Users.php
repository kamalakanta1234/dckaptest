<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors',0);
   class Users extends CI_Controller{
     public function __construct()
        {
                parent::__construct();

               $this->load->model('users_model');

               
                
        }


        public function registration(){

              $country['country']=$this->users_model->countries();
              $this->load->view('register',$country);
        }

        public function get_state(){

          $country_id=$this->input->post('country_id');
          $state=$this->users_model->get_state($country_id);
          print_r($state);
          die();

        
        }
         public function get_city(){

          $state_id=$this->input->post('state_id');
          $cities=$this->users_model->get_city($state_id);
          print_r($cities);
          die();

        
        }
        
     public function user_registration(){
           
          if(($this->input->post('id_user'))!= null)
             $user_id = $this->input->post('id_user');

        $this->form_validation->set_rules('fname', 'First name', 'trim|required');
       $this->form_validation->set_rules('user_name', 'User name', 'trim|required');
       $this->form_validation->set_rules('address', 'Address 1', 'trim|required');
       $this->form_validation->set_rules('city', 'City', 'trim|required');
       $this->form_validation->set_rules('state', 'State', 'trim|required');
       $this->form_validation->set_rules('country', 'Country', 'trim|required');
       $this->form_validation->set_rules('mobile', 'Mobile no', 'trim|required|exact_length[10]|integer');
       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      if(empty($_FILES['profile_image']['name'])&&empty($user_id)){
          $this->form_validation->set_rules('profile_image', 'profile_image', 'required');
        }
      





                if(!empty($_FILES['profile_image']['name'])){
              

                    $new_name                   = time().$_FILES["profile_image"]['name'];
                    $config['file_name']        = $new_name;
                    $config['upload_path']      = 'uploads/';
                    $config['allowed_types']    = 'gif|jpg|png';
                    // $config['file_name'] = $_FILES['profile_image']['name'];

                      //Load upload library and initialize configuration
                     $this->load->library('upload',$config);
                     $this->upload->initialize($config);
                    if($this->upload->do_upload('profile_image')){
                      $uploadData = $this->upload->data();

                      $profile_image = $new_name;
                    }else{
                        $profile_image = '';
                            }
                    }else{
                        $profile_image = '';
                    }
                  $image = $profile_image;

                 
          if ($this->form_validation->run() == true) {

           if (isset($_POST['registeration'])) {

            $registerdata= array(
          'user_full_name'=> $this->input->post('fname',true),
          'user_name'=> $this->input->post('user_name',true),
          'user_address'=> $this->input->post('address',true),
          'user_city'=> $this->input->post('city',true),
          'user_state'=> $this->input->post('state',true),
          'user_country'=> $this->input->post('country',true),
          'user_mobile'=> $this->input->post('mobile',true),
          'user_email'=> $this->input->post('email',true),
          'user_dob'=> $this->input->post('date',true),
          'user_created_at'=> date('Y-m-d'),

         );

            if(!empty($profile_image)){      
               $registerdata['user_profile_image']=$profile_image;
             }
                               if($user_id){
                            $updated=$this->users_model->update_user($registerdata,$user_id);
                              if($updated){
                              $this->session->set_flashdata('msg', 'Updataion  Succesfull');
                              $country['country']=$this->users_model->countries();
                              redirect('users/list_view');
                                            }else{
                                               $this->session->set_flashdata('msg', 'updataion failed ! plz try again later');
                                               redirect('users/list_view');
                                            }
                          }else{
                           $inserted=$this->users_model->user_registration_model($registerdata);


                          

                           if($inserted){ 
                            
                            $this->session->set_flashdata('msg', 'Registration Succesfull');
                            $country['country']=$this->users_model->countries();
                            $this->load->view('register',$country);
                                            }
                                      }  
                                    }
                         
                                    } else {

                         $this->session->set_flashdata('msg', 'Registration Not Succesfull ! plz try again later');
                         $country['country']=$this->users_model->countries();
                         $this->load->view('register',$country);
        
       }      
        
     }

   






public function list_view(){

$mobile=$this->input->post('mobile');
$dob=$this->input->post('dob');
$name=$this->input->post('name');
$email=$this->input->post('email');
$create_date=$this->input->post('createDate');
if(!empty($mobile)){
      $mobile= $mobile; 
     }else
      $mobile=NULL;

       if(!empty($dob)){
      $dob= $dob;
     }else
      $dob=NULL;

       if(!empty($name)){
      $name= $name;
     }else
      $name=NULL;
  if(!empty($create_date)){
      $create_date= $create_date;
     }else
      $create_date=NULL;

      if(!empty($email)){
      $email= $email;
     }else
  
    $row = $this->users_model->total_user($mobile,$dob,$email,$create_date,$name);
    if(!empty($row))
    $total_row = count($row);

      else
    $total_row =0;
   $this->load->library('pagination');
    $config = array();
    $config["base_url"] = base_url('users/list_view');
    

    $config["total_rows"] = $total_row;
    $config['num_links'] = $total_row;

    $config["per_page"] = 300;
    $config['use_page_numbers'] = TRUE;
    $config['display_pages'] = TRUE;

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    //For NEXT PAGE Setup
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    //Customizing the “Digit” Link
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    if($this->uri->segment(3))
    {
      $page = ($this->uri->segment(3)) ;
    }
    else
    {
      $page = 1;
    }

    $this->pagination->initialize($config);

      $data['members'] = $this->users_model->all_users($config['per_page'],$page,$mobile,$dob,$email,$create_date,$name);


    $data['per_page'] = $page * count($data['members']);
    $data['total_records'] = $config['total_rows'];

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links );



    $this->load->view('list', $data);

}

public function delete_user(){
      $user_id=$this->uri->segment(3);
      $data=$this->users_model->delete($user_id);
  if($data){
     $this->session->set_flashdata('msg', 'User Deleted Succesfully');
                              redirect('users/list_view');
  
  }else{
     $this->session->set_flashdata('msg', 'User Delete unSuccesfull');
                              redirect('users/list_view');
  }

}


    public function editMemberview(){
      $user_id=$this->uri->segment(3);
     $this->db->select('a.user_id,a.user_full_name,a.user_name,a.user_email,a.user_mobile,a.user_dob,a.user_country,a.user_state,a.user_profile_image,a.user_address,a.user_state,a.user_city,c.name as country_name,s.name as state_name,k.name as city');
    $this->db->from('user_registration a'); 
    $this->db->join('countries c', 'c.id=a.user_country', 'left');
    $this->db->join('states s', 's.id=a.user_state', 'left');
        $this->db->join('cities k', 'k.id=a.user_city', 'left');

    $this->db->where('a.user_id',$user_id);
    $query = $this->db->get(); 
   

       $data['user'] = $query->result_array();
       $data['country']=$this->users_model->countries();


       $this->load->view('edit_User',$data);
    }
    public function view_user(){
            $user_id=$this->uri->segment(3);
     $this->db->select('a.user_id,a.user_full_name,a.user_name,a.user_email,a.user_mobile,a.user_dob,a.user_country,a.user_state,a.user_profile_image,a.user_address,a.user_state,a.user_city,c.name as country_name,s.name as state_name,k.name as city');
    $this->db->from('user_registration a'); 
    $this->db->join('countries c', 'c.id=a.user_country', 'left');
    $this->db->join('states s', 's.id=a.user_state', 'left');
        $this->db->join('cities k', 'k.id=a.user_city', 'left');

    $this->db->where('a.user_id',$user_id);
    $query = $this->db->get(); 
   

       $data['user'] = $query->result_array();
       $data['country']=$this->users_model->countries();


       $this->load->view('view_User',$data);
    }
}


     ?>