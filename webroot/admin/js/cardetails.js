/* Car details validation */
function carValidation()
{
	var car_name = $("#car_name").val();
	var car_dealer_email = $("#car_dealer_email").val();
	var car_image_thumbnail = $("#car_image_thumbnail").val();
	var car_price = $("#car_price").val();
	var car_brand = $("#car_brand").val();
	var car_category = $("#car_category").val();
	var car_small_description = $("#car_small_description").val();
	var car_general_info = $("#car_general_info").val();
	var car_general_feature = $("#car_general_feature").val();
	var car_technical_specification = $("#car_technical_specification").val();
	if(car_name == '' || car_dealer_email == '' || car_image_thumbnail == '' || car_price == '' || car_brand == '' || car_category == '' || car_small_description == '')
	{
		if(car_name == '')
		{
			$("#errormsg_car_name").css("display","block");
			$("#car_name").focus(); 
			return false;
		}
		if(car_dealer_email == '')
		{
			$("#errormsg_car_dealer_email").css("display","block");
			$("#car_dealer_email").focus(); 
			return false;
		}
		if(car_image_thumbnail == '')
		{
			$("#errormsg_car_image_thumbnail").css("display","block");
			//$("#car_image_thumbnail").focus(); 
			return false;
		}
		if(car_price == '')
		{
			$("#errormsg_car_price").css("display","block");
			$("#car_price").focus(); 
			return false;
		}
		if(car_brand == '')
		{
			$("#errormsg_car_brand").css("display","block");
			$("#car_brand").focus(); 
			return false;
		}
		if(car_category == '')
		{
			$("#errormsg_car_category").css("display","block");
			$("#car_category").focus(); 
			return false;
		}
		if(car_small_description == '')
		{
			$("#errormsg_car_small_description").css("display","block");
			$("#car_small_description").focus(); 
			return false;
		}
	}
	else
	{
		$('#carID').removeClass('active');
		$('#tab_1').removeClass('active');
		$('#imagesID').addClass('active');
		$('#tab_2').addClass('active');
		$('#tab_li').removeAttr('style');
		$('#img_li').removeAttr('style');
		return true;
	}
}

/* Show car details */
function showCarDetails()
{
	$('#carID').addClass('active');
	$('#tab_1').addClass('active');
	$('#imagesID').removeClass('active');
	$('#tab_2').removeClass('active');
	$('#specificationID').removeClass('active');
	$('#tab_3').removeClass('active');
}

/* Show images */
function showImages()
{
	$('#imagesID').addClass('active');
	$('#tab_2').addClass('active');
	$('#specificationID').removeClass('active');
	$('#tab_3').removeClass('active');
	$('#carID').removeClass('active');
	$('#tab_1').removeClass('active');
}

/* Show specification */
function showSpecification()
{
	var car_img_name_1 = $('#car_img_name_1').val();
	if(car_img_name_1 == '')
	{
		$("#errormsg_car_img_name_1").css("display","block");
		return false;
	}
	else
	{
		$("#errormsg_car_img_name_1").css("display","none");
		$('#imagesID').removeClass('active');
		$('#tab_2').removeClass('active');
		$('#specificationID').addClass('active');
		$('#tab_3').addClass('active');		
		$('#spec_li').removeAttr('style');
		$('#carID').removeClass('active');
		$('#tab_1').removeClass('active');
	}
}
/* Show specification update */
function showSpecification_update()
{
	$('#imagesID').removeClass('active');
	$('#tab_2').removeClass('active');
	$('#specificationID').addClass('active');
	$('#tab_3').addClass('active');		
	$('#spec_li').removeAttr('style');
	$('#carID').removeClass('active');
	$('#tab_1').removeClass('active');
}

/* Error remove */
function errorRemove(name)
{
	$("#errormsg_"+name).css("display","none");
}

/* Email validation */
function emailValidation(val)
{
	$('#errormsg_'+val).css('display','none');
	var email_value = $('#'+val).val();
	if(email_value.length > 5)
	{
		if (validateEmail(email_value))
		{  
			$('#errormsg_'+val+'_validation').css('display','none');
			return true;  
		}  
		else
		{
			$('#errormsg_'+val+'_validation').css('display','block');
		}		
	}
	else
	{
		$('#errormsg_'+val+'_validation').css('display','none');
	}	
}
/* Check email type */
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}