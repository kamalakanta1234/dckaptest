$(document).ready(function(){ 
	//var BASE_URL = "<?php echo base_url();?>";

$("#lotp").addClass('hidden');
$("#loginOtp").addClass('hidden');
		


$("#otp").click(function(e){
		e.stopImmediatePropagation();
		

		if($("#otp").hasClass("disabled"))
		{
			swal("Wait", "Recovery is already in progress, please wait!", "info");
			return false;
		}

		//var email = $("#femail").val().trim();
		var mobile = $("#mobile").val().trim();
		var member_id = null;

		if($("#forgotModal .profile-selector").hasClass('hidden') == false)
		{
			member_id = $("#fmember_id").val();
		}

		
		if(mobile.length < 10)
		{
			alert("Please enter mobile phone number to retrieve login details!");
			return false;
		}


		
		//We have 1 field now. So we can attempt to recover
		$.post('http://localhost:8088/chaturmas/'+ "Users/user_login", {'mobile' : mobile}, function(data){

			if(data.status >= 2)
			{
				// alert(mobile);
				
				swal('Multiple Profiles', 'We have found multiple profiles with this mobile number.', 'info');
				$('.profile-selector').removeClass('hidden');

				$('#fmember_id').html('');
				var opts = '';
				for(var i = 0; i < data.members.length; i++)
				{
                    opts = opts + '<option value="' + data.members[i].first_name + '">' + data.members[i].first_name + ' ' + data.members[i].last_name + '</option>';
				}
				$('#fmember_id').html('<option value="">आप किस प्रोफ़ायल  से लॉगिन करना चाहते हैं?</option>' + opts);
                $('#fmember_id').val('');
                $('#fmember_id').trigger('change');
                
               
                $("#btnRecoverLogin").removeClass("disabled");
				$("#lotp").removeClass('hidden');
				$("#loginOtp").removeClass('hidden');

				$('#final_otp').removeClass('hidden');
				$('#otp').addClass('hidden');
				$('#mobile').prop('disabled',true);

				return;
			}
		if(data.status == 1){
			$("#user_first_name").val(data.members[0].first_name);
			$("#user_mobile").val(data.members[0].mobile);

		}
				  if(typeof(data.members) != "undefined" && data.members !== null){

			if(data.members[0].mobile)
			{
			var name= $("#user_first_name").val().trim();
			
			$.post('http://localhost:8088/chaturmas/'+ "Users/otp_login", {'name' : name,'mobile' : mobile}, function(response){
			if(response == 'success')
			{
				$("#lotp").removeClass('hidden');
				$("#loginOtp").removeClass('hidden');

				$('#mobile').addClass('hidden');
				$('#final_otp').addClass('hidden');
				$('#otp').addClass('hidden');


				swal(" OTP  has been sent on registered mobile number via SMS!", "success");
			}
			else{
			swal("Something went Wrong.", "Please try again!");

					}
			})

		
			}
		}else
			{
				swal('No Registered profile Found', "We couldn't find an associated account with details you provided.", 'info');
			}
			
		});	
		
		return false;
	});



$("#final_otp").click(function(ef){
		ef.stopImmediatePropagation();
		 var postData= {};
		 postData.mobile = $("#mobile").val().trim();
		 postData.name = $("#fmember_id").val().trim();
		
		$('#user_first_name').val(postData.name); 
        $('#user_mobile').val(postData.mobile);
  if(postData.name.length == ""){
  	 alert('choose  atleast one member');
  	 return false;
  }
		
		$.post(BASEURL + "users/otp_login",postData, function(response){
		

			if(response == 'success')
			{
				$('#mobile').addClass('hidden');
				$('#final_otp').addClass('hidden');
				$('#otp').addClass('hidden');
				$('#user_first_name').val(postData.name); 
       		    $('#user_mobile').val(postData.mobile);
       		    $("#fmember_id").prop('disabled', true);

       		    
				swal(" OTP  has been sent on registered mobile number via SMS!", "success");
				return true;
			}
			else{
			swal("Something went Wrong.", "Please try again!");
				return false;
					}
			})
		return false
	});

$("#resend_otp").click(function(ef){
		ef.stopImmediatePropagation();


		var postData= {};
		 postData.mobile = $("#user_mobile").val().trim();
		 postData.name = $("#user_first_name").val().trim();
		
		
  
		
		$.post(BASEURL + "users/otp_login",postData, function(response){
		

			if(response == 'success')
			{
				$('#mobile').addClass('hidden');
				$('#final_otp').addClass('hidden');
				$('#otp').addClass('hidden');
				$('#user_first_name').val(postData.name); 
       		    $('#user_mobile').val(postData.mobile);
       		    $("#fmember_id").prop('disabled', true);

       		    
				swal(" OTP  has been sent on registered mobile number via SMS!", "success");
				return true;
			}
			else{
			swal("Something went Wrong.", "Please try again!");
				return false;
					}
			})



	})





$("#loginOtp").click(function(efh){
	efh.stopImmediatePropagation();
	postData={};
	postData.name=$('#user_first_name').val().trim();
	postData.mobile=$('#user_mobile').val().trim();
	postData.otp=$('#lotp').val().trim();
	postData.type="otp";

	
	$.post(BASEURL + "users/check_otp",postData, function(response){
		
		if(response=='success'){

			var a = confirm('Otp  Matched Redirect to You dashboard','success');

				if(a){
				$.post(BASEURL + "users/login_mem",postData, function(response){
				if(response.result == 'success')
					{
					
						window.location.href = BASEURL + 'users/dashboard'

					}

				});
				return false;
			}
						


		}else{

			swal('Otp Not Matched Enter correct Otp','info');
			return false;

		}


	});

return false;

})


$("#loginwithMid").click(function(jk){
	jk.stopImmediatePropagation();
				postData={};
				postData.mid=$('#uname').val().trim();
				postData.pas=$('#pwd').val().trim();
				
				//postData.mobile=postData.mid=$('#uname').val().trim();

				if(postData.mid.length == 6){
					//alert('=6');

				$.post(BASEURL + "users/login_mem",postData, function(response){
					//alert(response);
					
					if(response.result == 'success')
					{
						//swal('This is  dashboard','success');

						window.location.href = BASEURL + 'users/dashboard';
					}else{

						swal('Please give correct memeber Id and password');
						return false
					}

				});
				return false;
			}else if(postData.mid.length > 6){
				//alert('>6');

					$.post(BASEURL + "users/login_mem",postData, function(response){
					
					if(response.result == 'success')
					{
						//swal('This is  dashboard','success');

						window.location.href = BASEURL + 'users/dashboard';
					}else{

						swal('Please give correct memeber Id and password');
						return false
					}

				});
				return false;

			}
			

})



	$("#recover_pass_btn").click(function(ekl){
		ekl.stopImmediatePropagation();
		postData={};
		postData.memid= $('#mid').val().trim();
		postData.mob_num= $('#mob').val().trim();

if(postData.memid.length < 1 || postData.mob_num.length < 1 ){

			alert("Please provide all required details.");
			return false;
}
if(postData.memid.length > 0){
		if(isNaN(postData.memid)){
				swal("Only digit is allowed");
			return false;
			
		}
	 if(postData.memid.length < 6 || postData.memid.length > 6){
			swal("please give 6 digit member id");
			return false;
		}
	}

if(postData.mob_num.length > 0){
		if(isNaN(postData.mob_num)){
				swal("Only digit is allowed");
				return false;
			}

	if(postData.mob_num.length < 10 || postData.mob_num.length > 10){
			swal("Please give 10 digit Mobile Number");
			return false;
		}
	}

		var confrm=confirm("यदि आप पासवर्ड पुनर्प्राप्त कर रहे हैं फिर आपका sadhumargi सदस्य प्रोफ़ाइल पासवर्ड बदल जाएगा और पुनर्प्राप्त पासवर्ड का उपयोग साधुमर्गी सदस्य प्रोफ़ाइल लॉगिन और चैटुअर्मास लॉगिन दोनों के लिए किया जा सकता है।");
		if(confrm){


			$.post(BASEURL + "users/recover_pass",postData, function(response){
				
				if (response.message == 'success'){

					swal("password is Changed and Sent to your Registered Mobile Number Please Login ");
					 location.reload(); 
				}else if(response.message == 'No profile found'){
					swal("No profile found ");
					return false;
				}else{
					swal("Something went wrong ! Please Try Again ");
					false
				}

			});

			return false;
		}


	});

$("#registeration_user_admin").click(function(abc){
		//abc.stopImmediatePropagation();
		

		postData={};
		postData.first_name=$('#fname').val().trim();
		postData.last_name=$('#last_name').val().trim();
		postData.address=$('#address').val().trim();
		postData.address2=$('#address2').val().trim();
		postData.city=$('#city').val().trim();
		postData.district=$('#district').val().trim();
		postData.state=$('#state').val().trim();
		postData.pincode=$('#pincode').val().trim();
		postData.country=$('#country').val().trim();
		postData.mobile=$('#mobile').val().trim();
		postData.email_address=$('#email_address').val().trim();
		postData.password=$('#password').val().trim();
			
   
				if(postData.mobile.length > 0){
 					if(isNaN(postData.mobile)){
						alert("Letters and Special Charecters is Not allowed in mobile ");
	
					return false;
						}
				}

		$.post(BASEURL + "dashboard/user_registration_admin",postData, function(response){
			
			if(response == 'success'){

				alert("Registration Succesfull");
				setTimeout(function(){
				window.location.reload();
				}, 300);

			}else if(response == 'mobile'){

			alert("  mobile number Exsist. Please use another Mobile Number");
			return false;
			}
			else if(response == 'unsuccess'){
			alert(" Something Went Wrong Registration Not Complete ");

			}
			else{
				alert(response);
			}



		});
		
return false;


	});




});

