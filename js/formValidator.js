/* Regular Expressions */
var rege = /^\b[A-Za-z]+[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b$/;
var regPhoneNum = /^\b[0-9]{7}\b$/;
var regNumber= /^\b[0-9\.]*\b$/;
$(document).ready(
			function(){
				$('#ContactUsForm').submit(
						function(){
							var name=$('#cu_name').val();
							var email=$('#cu_email').val();
							var subject=$('#cu_subject').val();
							var message=$('#cu_message').val();
							if((name=='')||(subject=='')||(message=='')){
								alert('All fields are required!');
								return false;
							}
							if (!rege.test(email))
							{
								alert('Please enter a valid e-mail address!');
								return false;
							}
							$.ajax (
									{
										url:"sendContactUs.ajax.php",
										type:"POST",
										data:{name:name,email:email,subject:subject,message:message},
										success:function(msg){
											if(msg.trim()=="sent"){
												alert('Thank you, your message was sent successfully and we will reply as soon as possible!');
											}
											else if(msg.trim()=="failed"){
												alert("Sorry, your message failed to send, try again later please!");
											}
										},
										error:function(){
											alert('An error occured, please try again later ');
										}
									}
								);
						}
				);
				
				$('#cu_submit').click(
						function(){
							$('#ContactUsForm').submit();
							return false;
						}
				);
			}
	);