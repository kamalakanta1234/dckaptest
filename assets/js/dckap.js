// $(document).ready(function(){ 
// $("#registeration_user_admin").click(function(abc){
// 		//abc.stopImmediatePropagation();
		

// 		postData={};
// 		postData.first_name=$('#fname').val().trim();
// 		postData.user_name=$('#user_name').val().trim();
// 		postData.address=$('#address').val().trim();
// 		postData.city=$('#city').val().trim();
// 		postData.state=$('#state').val().trim();
// 		postData.country=$('#country').val().trim();
// 		postData.mobile=$('#mobile').val().trim();
// 		postData.email_address=$('#email_address').val().trim();
			
   	
// if(postData.mobile.length < 10 ){
// 	alert("Mobile Number  must be 10 Digit");return false;
// } 
// if(postData.first_name.length < 3 ){
// 	alert("name cant be empty");return false;
// } if(postData.address.length < 3 ){

// 	alert("address field Cant be empty");return false;
// }if(postData.city.length < 1){

// alert("city is mandatory");return false;

// }
// if(postData.state.length < 1){

// alert("state is mandatory");return false;

// }
// if(postData.country.length < 1){

// alert("country is mandatory");return false;

// }
// if(postData.email_address.length < 1){

// alert("email_address is mandatory");return false;

// }

// 				if(postData.mobile.length > 0 ){
//  					if(isNaN(postData.mobile)){
// 						alert("Letters and Special Charecters is Not allowed in mobile ");
	
// 						return false;
// 						}
// 				}

// 		$.post(BASEURL + "users/user_registration",postData, function(response){
			
// 			if(response == 'success'){

// 				alert("Registration Succesfull");
// 				setTimeout(function(){
// 				window.location.reload();
// 				}, 300);

// 			}
// 			else{
// 				alert(response);
// 			}



// 		});
		
// return false;


// 	});
// });


