<div class="card">
  <?php
  	displayUserInfo();
  ?>
</div>


<?php 
	if($_SESSION['usertype'] == 'User') { ?>
		
		<div class="userevent" >
			<h3> Your Registered Events </h3>
			<?php 
				displayUserRegisteredEvents();
			?> 

			<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#eventModal" id="registerEventButton">Register for event </button>			
		</div>
	
	<?php } if($_SESSION['usertype'] == 'Psychologist') { ?>
		
		<div class="userevent">
			<h3> Your Created Events </h3>
			<?php 
				displayUserCreatedEvents();
			?> 

			<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#eventModal" id="createEventButton">Create event</button>		
		</div>

<?php } ?>