<?php
function getChangePassword($id, $displayMsg)
{


	

?>
</br>
<h1>Change Password<br />
  <br />
</h1>

<script>

$(document).ready(function () {
       
           $('#buttonUpdate').on('click', function () {
                $('#theUpdateForm').jqxValidator('validate');
            });
									
            // initialize validator.
            $('#theUpdateForm').jqxValidator({
                rules: [
						 { input: '#current_password', message: 'Required', action: 'keyup, blur', rule: 'required' },
						 { input: '#new_password', message: 'Your new_password must be between 6 and 15 characters!', action: 'keyup, blur', rule: 'length=6,15' },		
						 { input: '#new_password_confirm', message: 'Your new_password must be between 6 and 15 characters!', action: 'keyup, blur', rule: 'length=6,15' },														
					   ]
            });
			
			//validate success & submit				
			$('#theUpdateForm').bind('validationSuccess', function (event) { 
					
			var action = $("#theUpdateForm").attr('action');
							
			var form_data = {
				current_password: $("#current_password").val(),
				new_password: $("#new_password").val(),
				new_password_confirm: $("#new_password_confirm").val(),
				is_ajax: 1
			};
				
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					dataType: "json",
					
					success: function(response) {
					
						var id = response["id"];
						var success = response["success"];
						var displayMsg = response["displayMsg"];
		
			
						if (success == 1) {
						
							
							window.location.href = "../main/index.php?id="+id+'&displayMsg='+displayMsg;
		
						} else {
		
							
							document.getElementById("errMsg").innerHTML=displayMsg;
							document.getElementById("errMsg").innerHTML='<div class="alert alert-danger fade in" >' + displayMsg + '</div>';
							document.getElementById("displayMsg").innerHTML="";
							
							setTimeout(function() {
								$("#displayMsg").fadeOut().empty();
							}, 100);
							
						}
					}
				});
			
			}); 
			//end of validate sucess and submit		



									
			
});


</script>
<div id="content">
<div class="standard">
	<div id="errMsg" name="errMsg" class="error_msg">
	</div>
    <form action="" method="post" name="theUpdateForm" id="theUpdateForm">
    <div class="buttons">
      <div class="right">
        <input type="button" value="Update" id="buttonUpdate" class="button" onClick="document.theUpdateForm.action='info_inc.php?action=update&id=<?php echo $id; ?>'"/>
        <input name="SubmitCancel" type="submit" class="button" id="SubmitCancel" value="Cancel" onClick="document.theUpdateForm.action='info_inc.php?action=cancel&id=<?php echo $id; ?>'" />
      </div>
    </div>	
   
      <table width="38%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="36%">&nbsp;</td>
          <td width="64%">&nbsp;</td>
        </tr>
        <tr>
          <td>Current Password </td>
          <td><span class="a_fonts_error">
            <input name="current_password" type="password" id="current_password" maxlength="12" class="txtbox-220"/>
          </span></td>
        </tr>
        <tr>
          <td>New Password </td>
          <td><span class="a_fonts_error">
            <input name="new_password" type="password" id="new_password" maxlength="12" class="txtbox-220"/>
          </span></td>
        </tr>
        <tr>
          <td>New Password Again </td>
          <td><span class="a_fonts_error">
            <input name="new_password_confirm" type="password" id="new_password_confirm" maxlength="12" class="txtbox-220"/>
          </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>

	</div>
</div>
<?php } ?>

<?php
function getAdminChangePassword($id, $displayMsg)
{

	$id = $_GET['id'];

  $sql = "select * from user where user_id = '$id'
         ";
  $result = dbQuery($sql);
  if(dbNumRows($result)==1)
  {
    $row=dbFetchAssoc($result);
    
    $user_name = $row[user_name];
		

				
?>
</br>
<h1>Reset Password<br />
  <br />
</h1>

<script>

$(document).ready(function () {
       
           $('#buttonUpdateAdmin').on('click', function () {
                $('#theUpdateAdminForm').jqxValidator('validate');
            });
									
            // initialize validator.
            $('#theUpdateAdminForm').jqxValidator({
                rules: [
						 { input: '#user_name', message: 'Required', action: 'keyup, blur', rule: 'required' },
						 { input: '#new_password', message: 'Your new_password must be between 6 and 15 characters!', action: 'keyup, blur', rule: 'length=6,15' },		
						 { input: '#new_password_confirm', message: 'Your new_password must be between 6 and 15 characters!', action: 'keyup, blur', rule: 'length=6,15' },									   
					   ]
            });
			
			//validate success & submit				
			$('#theUpdateAdminForm').bind('validationSuccess', function (event) { 
					
			var action = $("#theUpdateAdminForm").attr('action');
							
			var form_data = {
				user_name: $("#user_name").val(),
				new_password: $("#new_password").val(),
				new_password_confirm: $("#new_password_confirm").val(),
				is_ajax: 1
			};
				
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					dataType: "json",
					
					success: function(response) {
					
						var id = response["id"];
						var success = response["success"];
						var displayMsg = response["displayMsg"];
		
			
						if (success == 1) {
						
							
							window.location.href = "../main/index.php?id="+id+'&displayMsg='+displayMsg;
		
						} else {
		
							
							document.getElementById("errMsg").innerHTML=displayMsg;
							document.getElementById("errMsg").innerHTML='<div class="alert alert-danger fade in" >' + displayMsg + '</div>';
							document.getElementById("displayMsg").innerHTML="";
							
							setTimeout(function() {
								$("#displayMsg").fadeOut().empty();
							}, 100);
							
						}
					}
				});
			
			}); 
			//end of validate sucess and submit		



									
			
});


</script>
<div id="content">
<div class="standard">
	<div id="errMsg" name="errMsg" class="error_msg">
	</div>
    <form action="" method="post" name="theUpdateAdminForm" id="theUpdateAdminForm">
    <div class="buttons">
      <div class="right">
        <input type="button" value="Update" id="buttonUpdateAdmin" class="button" onClick="document.theUpdateAdminForm.action='info_inc.php?action=updateAdmin&id=<?php echo $id; ?>'"/>
        <input name="SubmitCancel" type="submit" class="button" id="SubmitCancel" value="Cancel" onClick="document.theUpdateAdminForm.action='info_inc.php?action=cancel&id=<?php echo $id; ?>'" />
      </div>
    </div>	
   
      <table width="38%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="36%">&nbsp;</td>
          <td width="64%">&nbsp;</td>
        </tr>
        <tr>
          <td>User Name </td>
          <td><span class="a_fonts_error">
            <input name="user_name" type="text" class="txtbox-220" id="user_name" value="<?php echo $user_name; ?>" maxlength="12"readonly=readonly/>
          </span></td>
        </tr>
        <tr>
          <td>New Password </td>
          <td><span class="a_fonts_error">
            <input name="new_password" type="password" id="new_password" maxlength="12" class="txtbox-220"/>
          </span></td>
        </tr>
        <tr>
          <td>New Password Again </td>
          <td><span class="a_fonts_error">
            <input name="new_password_confirm" type="password" id="new_password_confirm" maxlength="12" class="txtbox-220"/>
          </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>

	</div>
</div>
<?php } 
		else
		
		{
			echo "Sorry";
		}
		
}
?>
