    <?php $this->load->view('header')?>
     <?php  if($responce = $this->session->flashdata('msg')): ?>


     
                <div class="col">
                   <div class="alert alert-success text-center text-primary font-weight-bold"><?php echo $responce;?></div>
                   
                </div>
             
            <?php endif;?>
    <section class=" signup-form login pt-80 pb-80">
          <div class="container">
                <div class="col-xl-12 col-lg-8 flex-v-center ">
                    <div class="form-area bg-yellow white ">
                    	<label><span class="btn btn-success" style="float:right"><a href="<?php echo base_url();?>users/registration">Registration</a></span></label>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>users/list_view">
							<div class="form-group row">
								<div class="col-sm-2">
									<label class="control-label" for="first_name">User Name</label>
								</div>
								<div class="col-sm-4">
									<input type="text" value="" id="name" name="name"class="form-control">
								</div>
								<div class="col-sm-2">
									<label class="control-label" for="email">Email</label>
								</div>
								<div class="col-sm-4">
									<input type="text" value="" id="email" name="email"class="form-control">
								</div>
								
							</div>
							<div class="form-group row">
								
								<div class="col-sm-2">
									<label class="control-label" for="mobile">Mobile</label>
								</div>
								<div class="col-sm-4">
									<input type="text" value="" id="mobile" name="mobile"class="form-control">
								</div>
								<div class="col-sm-2">
									<label class="control-label" for="birth_date">Birthday</label>
								</div>
								<div class="col-sm-4">
									<input type="date" value="" id="birth_date" name="dob"class="form-control">
								</div>
							</div>
							<div class="form-group row">
								
								
								<div class="col-sm-2">
									<label class="control-label" for="createDate">Create Date</label>
								</div>
								<div class="col-sm-4">
									<input type="date" value="" id="createDate" name="createDate"class="form-control">
								</div>
							</div>							
							<div class="form-group row">
								<div class="col-sm-12 text-right">
									<button id="search_members" class="btn btn-success"> Search</button>
								</div>
							</div>
						</form>

										</div>
									</div>
								</div>
						</section>		
						
						<hr class="divider" />
						 <section class=" signup-form login pt-80 pb-80">
          <div class="container">
                <div class="col-xl-12 col-lg-8 flex-v-center ">
                    <div class="form-area bg-yellow white ">
						<table style="color: #0b7cec;"class="table  table-stripe table-responsive" id="my_id_table_to_export">
														<a href="#" class="btn btn-success"onclick="download_table_as_csv('my_id_table_to_export');">Download as CSV</a>

							<thead>
							<tr>
								<th>SL.NO.</th>
								<th>Name</th>						
								<th>Email</th>
								<th>Mobile</th>
								<th>Status</th>
								<th>Action</th>				

							</tr>
							</thead>
									<tbody class="fbody">	 
                               
								<?php 	$i=1;
									foreach($members as $member) { ?>
									<tr><td><?php echo $i;?> </td>
									<td><?php echo $member->user_name;?> </td>
									<td><?php echo $member->user_email;?> </td>
									<td><?php echo $member->user_mobile;?> </td>
									<td><?php if($member->user_active ==1)
									{echo 'Active';}
									else {echo "inactive";}?> </td>
																						
									<td><p><a href="<?php echo base_url();?>users/editMemberview/<?php echo $member->user_id;?>" class="btn btn-sm btn-info"> EDIT</a>

									 <a href="<?php echo base_url();?>users/view_user/<?php echo $member->user_id;?>" class="btn btn-sm btn-success"> VIEW</a>
									 <a href="<?php echo base_url();?>users/delete_user/<?php echo $member->user_id;?>" class="btn btn-sm btn-danger"> DELETE</a></p> 
									  </td></tr>
									<?php $i++;}
									
									?>
							</tbody>
								<tfoot>
						<tr>
							<td colspan="6" class="text-center">
								<ul class="pagination">
									<!-- Show pagination links -->
									<?php foreach ($links as $link) {
										echo "<li>". $link."</li>";
									} ?>
								</ul>
							</td>
						</tr>
						<tr>
							<td colspan="6"><p>Showing <?php echo $per_page;?> of <?php echo $total_records;?></p></td>
						</tr>
						</tfoot>
						</table>

							</div>
							</div>
							</div>
							</section>
    <?php $this->load->view('footer')?>

