var  take = '';
function adddata(param,id='')
{	
	var mbe ='Invalid email id';
	var here = $('#'+param); // alert div for show alert message
    var form = here.closest('form');
    var can = '';
	var ing = $('#'+id).val();
	var msg = $('#'+id).data('msg');
	var name = here.data('name');
	var uploadpersent ="";
	var topp = 100;
 	var prv = here.html();
    var formdata = false;
    if (window.FormData)
    {
        formdata = new FormData(form[0]);
    }
    var a = 0;
    var take = '';
    form.find(".required").each(function()
    {
 		var txt = ' *Required';
	    a++;
	    if(a==1)
	    {
	        take = 'scroll';
	    }
		var here = $(this);
			
		if(here.val()!= '')
		{
			here.closest('div').find('.require_alert').remove();
			here.css({borderColor: ''});
		}
		
        if(here.val()=='')
        {		
			
            if(!here.is('select'))
            {
                here.css({borderColor: 'red'});
                if(here.attr('type')=='number')
                {
                    txt = '*Its contain only number';
                }
                
                if(here.closest('div').find('.require_alert').length)
                {

                } 
                else 
                { 
                    here.closest('div').append(''
                        +'  <span id="'+take+'" class="label label-danger require_alert" >'
                        +'      '+txt
                        +'  </span>'
                    );
                }
            } 
            else if(here.is('select'))
            {
		
                here.closest('div').find('.chosen-single').css({borderColor: 'red'});
                here.closest('div').find('.cmultiselect-ui').css({borderColor: 'red'});
     			
                if(here.closest('div').find('.require_alert').length)
                {

                }
                else 
                {
                    here.closest('div').append(''
                        +'  <span id="'+take+'" class="label label-danger require_alert" >'
                        +'      *Required'
                        +'  </span>'
                    );
                }

            }

            $('#param').animate({
                scrollTop: $("#scroll").offset().top - topp
            }, 500);
            can = 'no';
        }

		if (here.attr('type')=='email')
		{
			if(!isValidEmailAddress(here.val()))
			{
				here.css({borderColor: 'red'});
				if(here.closest('div').find('.require_alert').length)
				{
					
				} 
				else 
				{
					here.closest('div').append(''
						+'  <span id="'+take+'" class="label label-danger require_alert" >'
						+'      *'+mbe
						+'  </span>'
					);
				}
				can = 'no';
			}
		}
		
		if (here.attr('type')=='file')
		{
			if(!validate_fileupload(here.val()))
			{
				here.css({borderColor: 'red'});
				if(here.closest('div').find('.require_alert').length)
				{
					
				} 
				else 
				{
					here.closest('div').append(''
						+'  <span id="'+take+'" class="label label-danger require_alert upload-alr" >'
						+'   Only jpg,png,doc,docx,pdf,jpeg,odt formats are allowed.  </span>'
					);
				}
				can = 'no';
			}
		}
		
		
		
		
		
			
		if (here.data('class')=='ethereum')
		{
			if(!validate_ethernum(here.val()))
			{
				here.css({borderColor: 'red'});
				if(here.closest('div').find('.require_alert').length)
				{
					
				} 
				else 
				{
					here.closest('div').append(''
						+'  <span id="'+take+'" class="label label-danger require_alert" >'
						+'      * Start with 0x & length upto 42 char. '
						+'  </span>'
					);
				}
				can = 'no';
			}
		}
		
		
		
		
		
		
		if (here.data('class')=='minChar1')
		{
			if(!validate_ethernum(here.val()))
			{
				here.css({borderColor: 'red'});
				if(here.closest('div').find('.require_alert').length)
				{
					
				} 
				else 
				{
					here.closest('div').append(''
						+'  <span id="'+take+'" class="label label-danger require_alert" >'
						+'      *Enter valid Ethereum wallet address'
						+'  </span>'
					);
				}
				can = 'no';
			}
		}
		
		 
        take = '';
		$('#'+id).val(ing);
			
    });
	
	
	if(can!=='no')
	{
 		$.ajax({
			url: form.attr('action'), // form action url
			type: 'POST', // form submit method get/post
			dataType: 'json', // request type html/json/xml
			data: formdata ? formdata : form.serialize(), // serialize form data 
			cache       : false,
			contentType : false,
			processData : false,
			crossDomain : true,
			
			xhr: function() {
				var xhr = $.ajaxSettings.xhr();
				xhr.upload.onprogress = function(e) {
					console.log(Math.floor(e.loaded / e.total *100) + '%');
					var uploadpersent = Math.floor(e.loaded / e.total *100) + '%';
					 $('#'+id).val(uploadpersent);
				};
				return xhr;
			},
			beforeSend: function() {
			  $('#'+id).val(uploadpersent+'  '+msg); // change submit button text
			  $('#'+id).prop('disabled', true);
			},
			success: function(resp) 
			{
				$('#'+id).prop('disabled', false);
				$('input[type="text"], input[type="email"], input[type="number"], input[type="password"], input[type="select"], textarea').css({borderColor: ''});
				$('.require_alert').remove();
				
				$('#'+id).val(ing);
			    
				if (resp === true) 
				{
				  //successful validation
					$('form').submit();
					return false;
				} 
				else 
				{
					
					if(resp.errors!=null)
					{
						$.each(resp.errors, function(i, v) 
						{
						  	//console.log(i + " => " + v); // view in console for error messages
						  	$("span[id=" + i + "]").remove();
							var msg = ''
									+'  <span id="'+i+'" class="label label-danger require_alert" >'
									+'      *'+v
									+'  </span>';
							
						  $('input[name="' + i + '"]').addClass('inputTxtError').after(msg);
						  $('textarea[name="' + i + '"]').addClass('inputTxtError').after(msg);
						  $('select[name="' + i + '"]').addClass('inputTxtError').after(msg);
						  $('input[name="' + i + '"], select[name="' + i + '"]').addClass('has-error').next('.chosen-container-single').after(msg);
						});
							
						var keys = Object.keys(resp);
						$('input[name="'+keys[0]+'"]').focus();

						$.each(resp.errors1, function(i, v) 
						{
							$('input[name="' + i + '"], textarea[name="' + i + '"],select[name="' + i + '"]').addClass('has-success');
							
							$("span[id=" + i + "]").remove();
							});                            
					}
			 			
					if(resp.status=='failure')
					{
						here.closest('div').find('.require_alert').remove(); 
						$.notify({
						  title: '<strong>Error!</strong>',
						  message: resp.message
						},
						{
						  type: 'danger'
						});
						if(param=='refaral_from')
						{
							$setVer.show();
							$setVer.text(resp.message);
							$setVer.removeClass('serVerify_sucess');
							$setVer.addClass('serVerify_danger');
						}
						
						if(resp.back_url!='')
						{
							setTimeout(function() { window.location.href= resp.back_url; }, 2000);	
						}
						
						if(param=='profile_form')
						{
							$('.close').click();
							setTimeout(function() {  window.location.reload(); }, 3000);	
						}
					
					}
					if(resp.status=='success')
					{
						if(resp.step =='step2'){
							$('#buyBTN').modal('hide');
							$('#last_id_2').val(resp.last_id);
							$('#buy_now_btn1').click();
						}
						else if(resp.step =='step3'){
							
							$('#buyBTN1').modal('hide');
							$('#last_id_3').val(resp.last_id);
							$('#buy_now_btn2step').click();
						}
						else{
					 		
							$.notify({
							  title: '<strong>Success!</strong>',
							  message: resp.message
							},
							{
							  type: 'success'
							});
							here.closest('div').find('.require_alert').remove(); 
							if(resp.back_url!='')
							{
								setTimeout(function() { window.location.href= resp.back_url; }, 2000);	
							}
							
							
						}

						if(param=='profile_form')
						{
							$('.close').click();
							setTimeout(function() {  window.location.reload(); }, 3000);	
						}						
					}
		 		}
				return false;
			},
			error: function(e) 
			{
			   console.log(e)
			}
		});   
	}
	else 
	{
  		//var ih = $('.require_alert').last().closest('.tabtt').attr('id');
 		//$("[href=#"+ih+"]").click();
 		return false;
	}	
	 
 }

  
	



function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
};





function validate_ethernum(fileName)
{
	var max ='42';
	var min ='42';
	
	var alpha    =  /^([0])+([xX])+([0-9a-zA-Z']+)*$/;
	if (fileName == "") {
		
			return false;
	}
	else if (!fileName.match(alpha)) {
		
			return false;
	}
	else if(fileName.length > max) {
		return false;
	}
	else if(fileName.length < min) {
		return false;
	}else{
		return true;
	}
  

	return false;
} 



function cityValidation(Fieldvalue){
   	var alpha2    =  /^[a-zA-Z\s]+$/;
	if (!Fieldvalue.match(alpha2) && Fieldvalue!="") {
 		return false;
 		//Only use character and space
   }else{
	   
	   return true;
   }
}

$('.emailValidation').bind('blur', function() {
	
	$(this).closest('div').find('.require_alert').remove();
	$(this).css({borderColor: ''});
	if (this.value == ""){
         
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *Required'
						+'  </span>'
		);
		return false;
      
    }
	else if(!isValidEmailAddress(this.value))
	{
		var mbe ='Invalid email id';
		$(this).css({borderColor: 'red'});
		if(this.value.length > 1)
		{
			$(this).closest('div').append(''
				+'  <span id="'+take+'" class="label label-danger require_alert" >'
				+'      *'+mbe
				+'  </span>'
			);
			return false;			
		} 		 
	}
});

$('.required').bind('keypress', function() {

	$(this).closest('div').find('.require_alert').remove();
	$(this).css({borderColor: ''});
  
});

//
 $('.required').bind('blur', function() {

	$(this).closest('div').find('.require_alert').remove();
	$(this).css({borderColor: ''});
	
  
});


$('.passport1').bind('blur', function() {

	$(this).closest('div').find('.require_alert').remove();
	$(this).css({borderColor: ''});
  	var lowerCaseLetters = /[a-z]/g;	
	var upperCaseLetters = /[A-Z]/g;
	if (this.value.length < 6) {
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *Password Should be 6 digit /character'
						+'  </span>'
					);
     return false;
    }
	/*
    if(this.value.match(lowerCaseLetters)) 
    {  
   
    }
    else
    {
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
			+'  <span id="scroll" class="label label-danger require_alert" >'
			+'      *Password Should atleast one lower case latters'
			+'  </span>'
		);
		return false;
    }
  	if(this.value.match(upperCaseLetters)) 
	{  

	}
	else
	{
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
				+'  <span id="scroll" class="label label-danger require_alert" >'
				+'      *Password Should atleast one upper case latters'
				+'  </span>'
			);
		return false;
	}
	*/
});

$('.passport2').bind('blur', function() {

	$(this).closest('div').find('.require_alert').remove();
	$(this).css({borderColor: ''});
	var lowerCaseLetters = /[a-z]/g;
	var upperCaseLetters = /[A-Z]/g;
  	var passport1 = $('.passport1').val();
	if (this.value != passport1) {
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
				+'  <span id="scroll" class="label label-danger require_alert" >'
				+'      *Password and Confrim password should be same'
				+'  </span>'
			);
		return false;
	}
	/*
	if(this.value.match(lowerCaseLetters)) 
    {  
   
    }
    else
    {
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
			+'  <span id="scroll" class="label label-danger require_alert" >'
			+'      *Password Should atleast one lower case latters'
			+'  </span>'
		);
		return false;
    }
	if(this.value.match(upperCaseLetters)) 
	{  

	}
	else
	{
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
				+'  <span id="scroll" class="label label-danger require_alert" >'
				+'      *Password Should atleast one upper case latters'
				+'  </span>'
			);
		return false;
	}
	*/
});


$('.ethernum1').bind('change', function() {
	var max ='42';
	var min ='42';
	$(this).closest('div').find('.require_alert').remove();
	$(this).css({borderColor: ''});
  	var alpha    =  /^([0])+([xX])+([0-9a-zA-Z']+)*$/;
	if (this.value == "") {
         
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *Required'
						+'  </span>'
		);
     
    }
    else if (!this.value.match(alpha)) {
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *Its must contain only 0x first two digit'
						+'  </span>'
					);
     
   }
   else if(this.value.length > max) {
		
  		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *Its should not exceed more than '+max+' '
						+'  </span>'
					);
			
    }
	else if(this.value.length < min) {
       
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *Its must have atleast '+min+' '
						+'  </span>'
					);
			
    }
  
	
	
});

 $('.minChar').change(function(e){
	var min = $(this).data('min');
	var max = $(this).data('max');
	$(this).closest('div').find('.require_alert').remove();	
	$(this).css({borderColor: ''});  
	var alpha    =  /^[a-zA-Z]+$/;
	
		if (this.value=='') {		
			$(this).css({borderColor: 'red'});	
			
			$(this).closest('div').append(''	
			+'  <span id="scroll" class="label label-danger require_alert" >'		
			+'      *Required'					
			+'  </span>' 					
			); 		
		}
		else if (!this.value.match(alpha)) {		
			$(this).css({borderColor: 'red'});	
			
			$(this).closest('div').append(''	
			+'  <span id="scroll" class="label label-danger require_alert" >'		
			+'      *Its must contain only character'					
			+'  </span>' 					
			); 		
		}
		else if(this.value.length < min) {
		   
			$(this).css({borderColor: 'red'});
			$(this).closest('div').append(''
							+'  <span id="scroll" class="label label-danger require_alert" >'
							+'      *its must have atleast '+min+' characters'
							+'  </span>'
						);
			
		}
		else if(this.value.length > max) {
			$(this).css({borderColor: 'red'});
			$(this).closest('div').append(''
							+'  <span id="scroll" class="label label-danger require_alert" >'
							+'      *its should not exceed more than '+max+' characters'
							+'  </span>'
						);
						
		}else{
			$(this).closest('div').find('.require_alert').remove();
			$(this).css({borderColor: ''});
		}
	
 });  

$('.minChar').bind('keypress', function(e) {
			$(this).closest('div').find('.require_alert').remove();		$(this).css({borderColor: ''});
		var min = $(this).data('min');
		var max = $(this).data('max');
		var alpha    =  /^[a-zA-Z]+$/;		
		if(e.keyCode == 8){		
		
		if (this.value=='') {		
			$(this).css({borderColor: 'red'});	
			
			$(this).closest('div').append(''	
			+'  <span id="scroll" class="label label-danger require_alert" >'		
			+'      *Required'					
			+'  </span>' 					
			); 		
		}
		else if (!this.value.match(alpha)) 
		{	
			$(this).css({borderColor: 'red'});	
			
			$(this).closest('div').append(''
			+'  <span id="scroll" class="label label-danger require_alert" >'	
			+'      *Its must contain only character'					
			+'  </span>' 					
			); 		
		}		
		else if(this.value.length < min) {
       
		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *its must have atleast '+min+' characters'
						+'  </span>'
					);
		
    }
	else if(this.value.length > max) {
  		$(this).css({borderColor: 'red'});
		$(this).closest('div').append(''
						+'  <span id="scroll" class="label label-danger require_alert" >'
						+'      *its should not exceed more than '+max+' characters'
						+'  </span>'
					);
					
    }else{
		$(this).closest('div').find('.require_alert').remove();
		$(this).css({borderColor: ''});
	}
		} 
});

function checkall(source) 
  {
      checkboxes = document.getElementsByName('terms');
      for(var i=0, n=checkboxes.length;i<n;i++) 
      {
          checkboxes[i].checked = source.checked;
      }
      
   
  }
  
 function checkall2(source) 
  {
      checkboxes = document.getElementsByName('terms2');
      for(var i=0, n=checkboxes.length;i<n;i++) 
      {
          checkboxes[i].checked = source.checked;
      }
      
   
  } 

function getcoll(){
  	copyToClipboardMsg(document.getElementById("copyme"), "msg");
}


function copyToClipboardMsg(elem, msgElem) {
	  var succeed = copyToClipboard(elem);
    var msg;
    if (!succeed) {
        msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
    } else {
        msg = "Text copied to the clipboard."
    }
    if (typeof msgElem === "string") {
        msgElem = document.getElementById(msgElem);
    }
    msgElem.innerHTML = msg;
    setTimeout(function() {
        msgElem.innerHTML = "";
    }, 2000);
}

function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
function removeValidation(){
	$('input[type="text"], input[type="email"], input[type="number"], input[type="password"], input[type="select"], textarea,.chosen-single').css({borderColor: ''});
	
	$('input[type="text"], input[type="email"], input[type="number"], input[type="password"], input[type="select"], textarea,.chosen-single').val('');
	$('input:checkbox').removeAttr('checked')
	$('.require_alert').remove();
	$('.datepicker ').val('');
	
}
 			
function pre(pre,current){			
	var last_id = $('.last_id').val();
	$('.last_id_pre').val(last_id);		
	$('#'+pre).show();            
	$('#'+current).hide();  
}/**This is ssn number*/
function format(input, format, sep) {
    var output = "";
    var idx = 0;
    for (var i = 0; i < format.length && idx < input.length; i++) {
        output += input.substr(idx, format[i]);
        if (idx + format[i] < input.length) output += sep;
        idx += format[i];
    }

    output += input.substr(idx);

    return output;
}

$('.ssnuber').change(function(e) {
	var val = $(this).val();
    var foo = $(this).val().replace(/-/g, ""); // remove hyphens
    // You may want to remove all non-digits here
    // var foo = $(this).val().replace(/\D/g, "");
 	if(val.length == 4 && e.keyCode==189){
	
	}
	else if(val.length == 7 && e.keyCode==189){
 	}
	else if (foo.length > 0) {
        foo = format(foo, [3, 2, 4], "-");
		$(this).val(foo);
    }
  
    
});


$('.btn-add').click(function(e) {
	$('.upload-label').remove();
	$('.btn-remove').removeClass('btn-remove').addClass('btn-add')
				.removeClass('btn-danger').addClass('btn-success')
				.html('<i class="fa fa-plus-circle" aria-hidden="true"></i>');
				 $("[type='file']").clearFiles();
		var control = $(".fileToUpload ");	
			control.val("");		
	control.replaceWith( control = control.clone( true ) );
 });

$('.btn-add1').click(function(e) {
	$('.upload-label').remove();
	$('.btn-remove').removeClass('btn-remove').addClass('btn-add')
				.removeClass('btn-danger').addClass('btn-success')
				.html('<i class="fa fa-plus-circle" aria-hidden="true"></i>');
				
				 $("[type='file']").clearFiles();
				var control = $(".fileToUpload");
				control.val(""); 
	control.replaceWith( control = control.clone( true ) );
});


function showname(e){
	var val = 	$(e).val();
	var val2= val.replace(/.*[\/\\]/, '/');	
		parts = val2.split("/");	
		loc = parts.pop();	
		$(e).next('.validation').text(loc);			
		$(e).closest('div').find('.upload-label').remove();	
		$(e).closest('div').append(''
			+'  <span id="'+take+'" class="label label-danger  upload-label" >'
			+loc +'  </span>'
		);
		$('.btn-add1').removeClass('btn-add1').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
} 	
function showname1(e){

	var val = 	$(e).val();
 	var val2= val.replace(/.*[\/\\]/, '/');	
	parts = val2.split("/");		
	loc = parts.pop();		
	$(e).next('.validation').text(loc);	
	$(e).closest('div').find('.upload-label').remove();	
	$(e).closest('div').append(''
		+'  <span id="'+take+'" class="label label-danger  upload-label" >'
		+loc +'  </span>'
	);
	
	$('.btn-add').removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-minus-circle" aria-hidden="true"></i>');
} 

function myFunction() {
 
  var myButtonClasses = document.getElementById("upload-btn").classList;
 
 
 if (myButtonClasses.contains("btn-danger")) {
	$('.upload-label').remove();
   document.getElementById("fileToUpload1").value = "";
 
 } else {
 
   
	$('#fileToUpload1').click();
 }
} 
function myFunction1() {

  var myButtonClasses = document.getElementById("upload-btn1").classList;
 
 
 if (myButtonClasses.contains("btn-danger")) {
	$('.upload-label').remove();
	document.getElementById("fileToUpload").value = "";
 
 } else {
 
   $('#fileToUpload1').click();
 
 }
} 
$(document).ready(function(){

    $('#ma').change(function(){
       
      $(this).hide();
    
    });
});