<div class="card text-center">
  <?php
    clearRedundantEvents();
    getProbableEventDetails();  
  ?> 
    <?php if($_SESSION['usertype'] == 'User') { ?>
       <a href='#' class='btn btn-primary' data-toggle="modal" data-target="#eventModal" id="registerEventButton">Register for event</a>
    <?php } else { ?> 
       <a href='#' class='btn btn-primary' data-toggle="modal" data-target="#eventModal" id="createEventButton">Create Event</a>
    <?php } ?>

</div>