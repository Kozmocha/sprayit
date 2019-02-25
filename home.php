<?php
session_start();

//If the system session does not have an access token from the user, they will be redirected to the Google login page for authorization.
if(!isset($_SESSION['access_token'])) {
	header('Location: google-login.php');
	exit();	
}

?>
<!DOCTYPE html>
<html>
<head>

	<!-- Required stylesheet for Date & Time Picker widget, which is used to test event creation. -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.css" />

	<!-- Script for Google API connection. -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<!-- Script for Date & Time Picker widget to help test event creation. -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.js"></script>

</head>
<body>

	<!-- This is a block for the input forms. The input is made simple by the Date & Time widget for easy testing. -->
	<div id="form-container">
		<input type="text" id="event-title" placeholder="Event Title" autocomplete="off" />
		<select id="event-type"  autocomplete="off">
			<option value="FIXED-TIME">Fixed Time Event</option>
			<option value="ALL-DAY">All Day Event</option>
		</select>
		<input type="text" id="event-start-time" placeholder="Event Start Time" autocomplete="off" />
		<input type="text" id="event-end-time" placeholder="Event End Time" autocomplete="off" />
		<input type="text" id="event-date" placeholder="Event Date" autocomplete="off" />
		<button id="create-event">Create Event</button>
	</div>

	<!-- Below is generated script code used to test the create event API. -->
	<script>

		//Function that checks to make sure the start time is not less than the end time for an event.
		function AdjustMinTime(ct) {
			var dtob = new Date(),
		  		current_date = dtob.getDate(),
		  		current_month = dtob.getMonth() + 1,
		  		current_year = dtob.getFullYear();
		  			
			var full_date = current_year + '-' +
							(current_month < 10 ? '0' + current_month : current_month) + '-' + 
				  			(current_date < 10 ? '0' + current_date : current_date);

			if(ct.dateFormat('Y-m-d') == full_date)
				this.setOptions({ minTime: 0 });
			else 
				this.setOptions({ minTime: false });
		}

		//This code is for the Date & Time widget from: "http://xdsoft.net/jqplugins/datetimepicker/".
		//This is currently being used as a quick way to test event creation.
		$("#event-start-time, #event-end-time").datetimepicker({ format: 'Y-m-d H:i', minDate: 0, minTime: 0, step: 5, onShow: AdjustMinTime, onSelectDate: AdjustMinTime });
		$("#event-date").datetimepicker({ format: 'Y-m-d', timepicker: false, minDate: 0 });

		$("#event-type").on('change', function(e) {
			if($(this).val() == 'ALL-DAY') {
				$("#event-date").show();
				$("#event-start-time, #event-end-time").hide();
			}
			else {
				$("#event-date").hide(); 
				$("#event-start-time, #event-end-time").show();
			}
		});

		//Sends a request through Ajax to create an event.
		$("#create-event").on('click', function(e) {
			if($("#create-event").attr('data-in-progress') == 1)
				return;

			var blank_reg_exp = /^([\s]{0,}[^\s]{1,}[\s]{0,}){1,}$/,
				error = 0,
				parameters;

			$(".input-error").removeClass('input-error');

			if(!blank_reg_exp.test($("#event-title").val())) {
				$("#event-title").addClass('input-error');
				error = 1;
			}

			if($("#event-type").val() == 'FIXED-TIME') {
				if(!blank_reg_exp.test($("#event-start-time").val())) {
					$("#event-start-time").addClass('input-error');
					error = 1;
				}		

				if(!blank_reg_exp.test($("#event-end-time").val())) {
					$("#event-end-time").addClass('input-error');
					error = 1;
				}
			}
			else if($("#event-type").val() == 'ALL-DAY') {
				if(!blank_reg_exp.test($("#event-date").val())) {
					$("#event-date").addClass('input-error');
					error = 1;
				}	
			}

			if(error == 1)
				return false;

			if($("#event-type").val() == 'FIXED-TIME') {
				// If end time is earlier than start time, then interchange them
				if($("#event-end-time").datetimepicker('getValue') < $("#event-start-time").datetimepicker('getValue')) {
					var temp = $("#event-end-time").val();
					$("#event-end-time").val($("#event-start-time").val());
					$("#event-start-time").val(temp);
				}
			}

			parameters = { 	title: $("#event-title").val(), 
							event_time: {
								start_time: $("#event-type").val() == 'FIXED-TIME' ? $("#event-start-time").val().replace(' ', 'T') + ':00' : null,
								end_time: $("#event-type").val() == 'FIXED-TIME' ? $("#event-end-time").val().replace(' ', 'T') + ':00' : null,
								event_date: $("#event-type").val() == 'ALL-DAY' ? $("#event-date").val() : null
							},
							all_day: $("#event-type").val() == 'ALL-DAY' ? 1 : 0,
						};

			$("#create-event").attr('disabled', 'disabled');
			$.ajax({
		        type: 'POST',
		        url: 'ajax.php',
		        data: { event_details: parameters },
		        dataType: 'json',
		        success: function(response) {
		        	$("#create-event").removeAttr('disabled');
		        	alert('Event created with ID : ' + response.event_id);
		        },
		        error: function(response) {
		            $("#create-event").removeAttr('disabled');
		            alert(response.responseJSON.message);
		        }
		    });
		});
	</script>
</body>
</html>