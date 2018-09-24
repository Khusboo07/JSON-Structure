<!DOCTYPE html>
<html>
<head>
	<title> REGISTRATION FORM </title>
	
</head>
<body>
<div class="main">
<div id="content">
<h1 align="center">USER REGISTRATION FORM</h1>
<div id="form_input" align="center">

<?php
echo form_open('Employee/data_submitted',array('method'=>'post'),'id = "regform"');
echo form_label('Name');
$data_name = array(
'name' => 'emp_name',
'class' => 'input_box',
'placeholder' => 'Please Enter Name',
'required' => 'required'
);
echo form_input($data_name);
echo "<br/>";
echo "<br/>";

echo form_label('Email-ID');
$data_email = array(
'type' => 'email',
'name' => 'emp_email',
'class' => 'input_box',
'placeholder' => 'Please Enter Email',
'required' => 'required'
);
echo form_input($data_email);
echo "<br/>";
echo "<br/>";

echo form_label('Password');
$data_password = array(
'type' => 'password',
'name' => 'emp_password',
'class' => 'input_box',
'placeholder' => 'Please Enter Password',
'required' => 'required'
);
echo form_input($data_password);
echo "<br/>";
echo "<br/>";

echo form_label('Mobile No');
$data_mobile = array(
'type' => 'mobile',
'name' => 'emp_mobile',
'class' => 'input_box',
'placeholder' => 'Please Enter Mobile No',
'required' => 'required'
);
echo form_input($data_mobile);
?>
<br/>
<br/>

<div id="form_button">
<?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
</div>
<?php echo form_close(); ?>
</div>
</div>

<?php
if (isset($result_msg)) {
echo "<div id='res_msg'>";
echo $result_msg;
echo "</div>";
}
?>


<script type="text/javascript">
	$(document).ready(function(){
		getTable();
 
		$('#regForm').submit(function(e){
			e.preventDefault();
			var url = '<?php echo base_url(); ?>';
			var reg = $('#regForm').serialize();
			$.ajax({
				type: 'POST',
				data: reg,
				dataType: 'json',
				url: url + 'index.php/Employee/data_submitted',
				success:function(response){
					$('#message').html(response.message);
					if(response.error){
						$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
					}
					else{
						$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
						$('#regForm')[0].reset();
						getTable();
					}
				}
			});
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
 
	});
	function getTable(){
		var url = '<?php echo base_url(); ?>';
		$.ajax({
			type: 'POST',
			url: url + 'index.php/user/fetch',
			success:function(response){
				$('#tbody').html(response);
			}
		});
	}
</script>
</body>
</html>