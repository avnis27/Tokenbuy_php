<!-- Modal -->
	<div class="modal fade" id="myModal2" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p><font color="red" class="text-center">First delete or complete old pending transection</font></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
    <script src="<?php echo base_url(); ?>webroot/frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/frontend/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>webroot/frontend/js/Notify/bootstrap-notify.js"></script>
    <script src="<?php echo base_url(); ?>webroot/frontend/js/Notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/frontend/js/mainCustom.js"></script>
    <script>
		$(function(){ 
			$('.button-checkbox').each(function(){
				var $widget = $(this),
					$button = $widget.find('button'),
					$checkbox = $widget.find('input:checkbox'),
					color = $button.data('color'),
					settings = {
							on: {
								icon: 'glyphicon glyphicon-check'
							},
							off: {
								icon: 'glyphicon glyphicon-unchecked'
							}
					};

				$button.on('click', function () {
					$checkbox.prop('checked', !$checkbox.is(':checked'));
					$checkbox.triggerHandler('change');
					updateDisplay();
				});

				$checkbox.on('change', function () {
					updateDisplay();
				});

				function updateDisplay() {
					var isChecked = $checkbox.is(':checked');
					// Set the button's state
					$button.data('state', (isChecked) ? "on" : "off");

					// Set the button's icon
					$button.find('.state-icon')
						.removeClass()
						.addClass('state-icon ' + settings[$button.data('state')].icon);

					// Update the button's color
					if (isChecked) {
						$button
							.removeClass('btn-default')
							.addClass('btn-' + color + ' active');
							$button.val(1);
							$("#user_agree").attr('checked', 'checked');
							$(".user_agree").closest('div').find('.require_alert').remove();
							$(".user_agree").css({borderColor: ''});
					}
					else
					{
						$button
							.removeClass('btn-' + color + ' active')
							.addClass('btn-default');
							$button.val('');
							$("#user_agree").removeAttr('checked', 'checked');
					}
				}
				function init() {
					updateDisplay();
					// Inject the icon if applicable
					if ($button.find('.state-icon').length == 0) {
						$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
					}
				}
				init();
			});
			
			var startDate = new Date('0');
			var FromEndDate = new Date();
			var ToEndDate = new Date();

			ToEndDate.setDate(ToEndDate.getDate()+365);
			
			/* date of expiry  */
			$('#passE_datepicker').datepicker({
				format: 'dd/mm/yyyy',
				weekStart: 1,
				startDate: '0',
				autoclose: true
			}); 
			$('#drivE_datepicker').datepicker({
				format: 'dd/mm/yyyy',
				weekStart: 1,
				startDate: '0',
				autoclose: true
			}); 
			$('#nationaE_datepicker').datepicker({
				format: 'dd/mm/yyyy',
				weekStart: 1,
				startDate: '0',
				autoclose: true
			}); 
		});
    </script>
    <script>
		$(function(){
			$('.dropdown').on('show.bs.dropdown', function(e){
				$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
			  });
			  
			  $(document).ready(function(){
			// Prepare the preview for profile picture
				$("#wizard-picture").change(function(){
					readURL(this);
				});
			});
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		});
		
		/* Change status */
		function setStatus(ID, PAGE, status, name) 
		{
			var str = 'id='+ID+'&status='+status+'&name='+name;
			jQuery.ajax({
				type :"POST",
				url  :PAGE,
				data : str,
				success:function(data)
				{			
					if(data==1)
					{
						var a_spanid = 'active_'+name+''+ID ;
						var d_spanid = 'inactive_'+name+''+ID ;
						if(status !="1")
						{
							$("#"+a_spanid).hide();
							$("#"+d_spanid).show();
							jQuery("#msg_div").html();
						}
						else
						{			
							$("#"+d_spanid).hide();
							$("#"+a_spanid).show();
							jQuery("#msg_div").html();
						}
					}
				} 
			});
		}
		
		$("#msg_div_front").fadeOut(5000);
		$("#msg_div_login").fadeOut(5000);
	</script>
   <!-- Code to handle taking the snapshot and displaying it locally -->
	<script>

		function take_snapshot() {
			
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>
    
	
  </body>
</html>