<?php
include('assets/inc/header.php');
require_once('assets/inc/dbinfo.php');
require_once('assets/objects/wiki.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<head>
  <title> Documentation </title>
  <script src="assets/js/wiki.js"></script>
</head>

<body>
  <div class="jumbotron container-fluid">
  	<h1 class="display-4"> Documentation </h1>
  	  <div class="accordion" id="docs">
  		<div class="card">
    	  <div class="card-header" id="headingOne">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          	  Index Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#docs">
      	    <div class="card-body">
              <div class="indexwiki"><?php $wiki = new wiki( "index", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editIndex()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveIndex()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingTwo">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          	  Home Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseTwo" class="collapse in" aria-labelledby="headingTwo" data-parent="#docs">
      	    <div class="card-body">
              <div class="homewiki"><?php $wiki = new wiki( "home", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editHome()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveHome()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingThree">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          	  Profile Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseThree" class="collapse in" aria-labelledby="headingThree" data-parent="#docs">
      	    <div class="card-body">
              <div class="profilewiki"><?php $wiki = new wiki( "profile", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editProfile()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveProfile()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingFour">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          	  Edit Profile Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseFour" class="collapse in" aria-labelledby="headingFour" data-parent="#docs">
      	    <div class="card-body">
              <div class="editprofilewiki"><?php $wiki = new wiki( "editprofile", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editEditProfile()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveEditProfile()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingFive">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          	  Announcements Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseFive" class="collapse in" aria-labelledby="headingFive" data-parent="#docs">
      	    <div class="card-body">
              <div class="announcementswiki"><?php $wiki = new wiki( "announcements", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editAnnouncements()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveAnnouncements()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingSix">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          	  Events Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseSix" class="collapse in" aria-labelledby="headingSix" data-parent="#docs">
      	    <div class="card-body">
              <div class="eventswiki"><?php $wiki = new wiki( "events", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editEvents()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveEvents()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingSeven">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
          	  Email Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseSeven" class="collapse in" aria-labelledby="headingSeven" data-parent="#docs">
      	    <div class="card-body">
              <div class="emailwiki"><?php $wiki = new wiki( "email", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editEmail()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveEmail()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingEight">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
          	  Directory Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseEight" class="collapse in" aria-labelledby="headingEight" data-parent="#docs">
      	    <div class="card-body">
              <div class="directorywiki"><?php $wiki = new wiki( "directory", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editDirectory()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveDirectory()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingNine">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
          	  Admin Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseNine" class="collapse in" aria-labelledby="headingNine" data-parent="#docs">
      	    <div class="card-body">
              <div class="adminwiki"><?php $wiki = new wiki( "admin", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editAdmin()" type="button">Edit</button>
                <button id="save" class="btn btn-primary btn-sm" onclick="saveAdmin()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>

  		<div class="card">
    	  <div class="card-header" id="headingTen">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
          	  FAQ Page
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseTen" class="collapse in" aria-labelledby="headingTen" data-parent="#docs">
      	    <div class="card-body">
              <div class="faqwiki"><?php $wiki = new wiki( "faq", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editFAQ()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveFAQ()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>
          
        <div class="card">
    	  <div class="card-header" id="headingEleven">
      		<h5 class="mb-0">
        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
          	  Warrior Knowledge
        	</button>
      		</h5>
    	  </div>
    	  <div id="collapseEleven" class="collapse in" aria-labelledby="headingEleven" data-parent="#docs">
      	    <div class="card-body">
              <div class="wkwiki"><?php $wiki = new wiki( "wk", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editWK()" type="button">Edit</button>
			     <button id="save" class="btn btn-primary btn-sm" onclick="saveWK()" type="button">Save</button><br>
      	    </div>
    	  </div>
  		</div>
    </div>
  </div>
</body>
</html>