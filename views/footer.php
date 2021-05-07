<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="loginModalTitle">Login</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger" id="loginAlert" style="display:none;"></div>
        <form>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
  <fieldset class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email address">
  </fieldset>
  <fieldset class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </fieldset>
  <fieldset class="form-group" id='typedrop' style='display: none;'>
    <label for="usertype">Signup as</label>
    <select class="form-control" id="usertype">
      <option>User</option>
      <option>Psychologist</option>
    </select>
 </fieldset>
  <fieldset class="form-group" id='statedrop' style='display: none;'>
    <label for="userstate">State</label>
    <select class="form-control" id="userstate">
					<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					<option value="Daman and Diu">Daman and Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Orissa">Orissa</option>
					<option value="Pondicherry">Pondicherry</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttaranchal">Uttaranchal</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="West Bengal">West Bengal</option>
	</select>
 </fieldset>
</form>
      </div>
      <div class="modal-footer">
          <a id="toggleLogin">Sign up</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- Register Event Modal -->

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php if ($_SESSION['usertype'] == 'User') { ?>
        	<h4 class="modal-title" id="registerEventModalTitle">Register event</h4>
        <?php } else { ?>
			<h4 class="modal-title" id="registerEventModalTitle">Create event</h4>
   	     <?php } ?>
        </div>
      <div class="modal-body"> Fill the event details
          <div class="alert alert-success" id="registerSuccess" style="display: none;"></div>
          <div class="alert alert-danger" id="registerAlert" style="display:none;"></div>
<form>
  <?php if ($_SESSION['usertype'] == 'User') { ?>
        	<fieldset class="form-group">
    			<label for="eventId">Event Id</label>
    			<input type="text" class="form-control" id="eventId" placeholder="Event Id">
  			</fieldset>
  <?php } ?>
  <fieldset class="form-group">
    <label for="eventName">Event Name</label>
    <input type="text" class="form-control" id="eventName" placeholder="Event name">
  </fieldset>
  <?php if ($_SESSION['usertype'] == 'User') { ?>
        	<fieldset class="form-group">
    			<label for="speakerEmail">Speaker Email</label>
    			<input type="email" class="form-control" id="speakerEmail" placeholder="Speaker email">
  			</fieldset>
  <?php } ?>
  
    <?php if ($_SESSION['usertype'] == 'Psychologist') { ?>
        	<fieldset class="form-group">
    			<label for="datetime">Date and time for the event</label>
    			<input type="datetime-local" class="form-control" id="datetime" placeholder="Date and Time">
  			</fieldset>
  <?php } ?>		 
  <fieldset class="form-group">
    			<label for="place">State</label>
    			<select class="form-control" id="place">
					<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					<option value="Daman and Diu">Daman and Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Orissa">Orissa</option>
					<option value="Pondicherry">Pondicherry</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttaranchal">Uttaranchal</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="West Bengal">West Bengal</option>
				</select>
  </fieldset>

  
</form>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php if ($_SESSION['usertype'] == 'User') { ?>
        	<input type="hidden" id="eventActive" name="eventActive" value="1">
        	<button type="button" id="EventButton" class="btn btn-primary">Register</button>
        <?php } else { ?>
        	<input type="hidden" id="eventActive" name="eventActive" value="0">
			<button type="button" id="EventButton" class="btn btn-primary">Create</button>
   	     <?php } ?>
        </div>
    </div>
  </div>
</div>




<script>
	$('#toggleLogin').click(function() {
		if($("#loginActive").val() == "1") {
			$("#loginActive").val("0");
			$('#typedrop').css("display","block");
			$('#statedrop').css("display","block");
			$('#log').html('SignUp');
			$('.btn').html('SignUp');
			$('#toggleLogin').html('Login');
		}
		
		else {
			$("#loginActive").val("1");
			$('#typedrop').css("display","none");
			$('#statedrop').css("display","none");
			$('#log').html('Login');
			$('.btn').html('Login');
			$('#toggleLogin').html('SignUp');
		
		}
	})
	$("#loginSignupButton").click(function() {
		$.ajax({
			type:"POST",
            url: "actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&usertype=" + $("#usertype option:selected").val() + "&userstate=" + $("#userstate option:selected").val() + "&loginActive=" + $("#loginActive").val(),
			success: function(result) {
				 if (result == "1") {
                    
                    window.location.assign("http://localhost/disaster-management-cfd/index.php");
                    
                } else {
                    
                    $("#loginAlert").html(result).show();
                    
                }
			} 
		})
	})
	$("#EventButton").click(function() {
		$.ajax({
			type:"POST",
            url: "actions.php?action=eventCreate",
            data: "eventId=" + $("#eventId").val() + "&eventName=" + $("#eventName").val()  + "&datetime=" + $("#datetime").val() + "&place=" + $("#place option:selected").val() + "&speakerEmail=" + $("#speakerEmail").val() + "&eventActive=" + $("#eventActive").val(),
			success: function(result) {
				 if (result == 1 && $("#eventActive").val() == 0) {
                    
                   	$("#loginSuccess").html("Event Successfully Created").show();
                    
                } else if(result == 1 && $("#eventActive").val() == 1) {
                    
                    $("#registerSuccess").html("Registered for event successfully").show();
                }else {
                    
                    $("#registerAlert").html(result).show();
                    
                }
			} 
		})
	})
</script>

  </body>
</html>