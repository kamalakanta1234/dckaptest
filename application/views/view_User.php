<!-- signup start -->
  <?php $this->load->view('header')?>

    <section class=" signup-form login pt-80 pb-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-xl-2 col-lg-2">
                   
                </div>
                <div class="col-xl-8 col-lg-8 flex-v-center ">
                    <div class="form-area bg-yellow white ">
                      <h2 class="f-700 mb-15 text-white"></h2>
                              <?php  if($responce = $this->session->flashdata('msg')): ?>


     
                <div class="col">
                   <div class="alert alert-success text-center text-primary font-weight-bold"><?php echo $responce;?></div>
                   
                </div>
             
            <?php endif;?>

    <script type="text/javascript">
        
        window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3500);
    </script>
                      
                        
                            <div class="row">
                             <div class="col form-group relative mb-25 mb-sm-20">
                                <span class="titl">Profile Image</span><br>
                                <img src="<?php echo base_url();?>uploads/<?php echo $user[0]['user_profile_image']?>" width="300px" height="200px">
                               
                            </div>

                            
                        </div>
                            <div class="row">
                            <div class="  col form-group relative mb-25 mb-sm-20">
                                 <span class="titl">Youe Name</span><input type="text" class="form-control bg-white input-lg input-white shadow-5" name="fname" id="fname" value="<?php echo $user[0]['user_full_name']?>" placeholder="First Name"disabled>
                                <span style="color: #fff;"><?php echo form_error('fname') ?></span>
                            </div>
                            
                             <div class="  col form-group relative mb-25 mb-sm-20">
                                <span class="titl">UserName</span> <input type="text" class="form-control bg-white input-lg input-white shadow-5" name="user_name" id="user_name" value="<?php echo $user[0]['user_name']?>"id="name" placeholder="user name"disabled>
                                <span style="color: #fff;"><?php echo form_error('user_name') ?></span>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="  col form-group relative mb-25 mb-sm-20">
                               <span class="titl">D-O-B</span> <input type="date" class="form-control bg-white input-lg input-white shadow-5" name="date" id="date" id="date" placeholder="DOB" value="<?php echo $user[0]['user_dob'];?>"disabled>
                                <span style="color: #fff;"><?php echo form_error('date') ?></span>
                            </div>
                            <div class="  col-md-6 form-group relative mb-25 mb-sm-20">
                                <span class="titl">Address</span> <input type="text" class="form-control bg-white input-lg input-white shadow-5" name="address" id="address" value="<?php echo $user[0]['user_address']?>" placeholder="Adress "disabled>
                                <span style="color: #fff;"><?php echo form_error('address') ?></span>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                           
                             <div class="  col form-group relative mb-25 mb-sm-20">
                                 <span class="titl">Mobile Number</span><input type="text" class="form-control bg-white input-lg input-white shadow-5" name="mobile" id="mobile" maxlength="10" value="<?php echo $user[0]['user_mobile']?>"id="name" placeholder="Mobile No."disabled>
                                <span style="color: #fff;"><?php echo form_error('mobile') ?></span>
                                                            </div>

                             <div class="  col form-group relative mb-25 mb-sm-20">
                                <span class="titl">Country</span> <select class="form-control bg-white input-lg input-white shadow-5" name="country" id="country"disabled> 
                                    <option value="<?php echo $user[0]['user_country']?>"> <?php echo $user[0]['country_name'];?></option>
                                    <?php foreach($country as $country){?>
                                        
                                        <option value="<?php echo $country->id;?>"> <?php echo $country->name?></option>
                                                                <?php }?>
                                </select>
                                <span style="color: #fff;"><?php echo form_error('country') ?></span>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="  col form-group relative mb-25 mb-sm-20">

                                <span class="titl">State</span>
                             <select class="form-control bg-white input-lg input-white shadow-5" name="state" id="state" disabled>
                                    <option value="<?php echo $user[0]['user_state']?>"><?php echo $user[0]['state_name']?></option>
                                </select>
                                     <span style="color: #fff;"><?php echo form_error('state') ?></span>
                            </div>
                            <div class="  col-md-6 form-group relative mb-25 mb-sm-20">
                                     <span class="titl">City</span>
                                 <select class="form-control bg-white input-lg input-white shadow-5" name="city" id="city"disabled>
                                    <option value="<?php echo $user[0]['user_city']?>"><?php echo $user[0]['city']?></option>
                                    </select>
                                <span style="color: #fff;"><?php echo form_error('city') ?></span>
                            </div>
                             
                            
                            
                        </div>
                        
                        
                            <div class="form-group relative mb-25 mb-sm-20">
                                <span class="titl">Email</span> <input type="email" class="form-control bg-white input-lg input-white shadow-5" name="email" value="<?php echo $user[0]['user_email']?>" id="email" placeholder="Email" disabled>
                                <span style="color: #fff;"><?php echo form_error('email') ?></span>
                            </div>
                            
                            
                            
                       
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2">
                   
                </div>
            </div>
        </div>
    </section>
    <!-- signup end -->
    
    <!-- Modal -->

    <?php $this->load->view('footer')?>

<script type="text/javascript">
$(document).ready(function(){
    var url="<?php echo base_url();?>"
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url: url+'users/get_state',
                data:'country_id='+countryID,
                success:function(data){
                    
                    $('#state').html(data);
                    $('#city').html('<option value="">Select city </option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select state</option>');
            $('#city').html('<option value="">Select city</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url: url+'users/get_city',
                data:'state_id='+stateID,
                success:function(data){
                    $('#city').html(data);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select city</option>'); 
        }
    });
});
</script>