<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>
<html> 
  <script src="../assets/js/wiki.js"></script>
</html>
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
    	  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editIndex()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveIndex()" type="button">Save</button><br>
			  <!--<div class="indexwiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editHome()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveHome()" type="button">Save</button><br>
			  <!--<div class="homewiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editProfile()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveProfile()" type="button">Save</button><br>
			  <!--<div class="profilewiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editEditProfile()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveEditProfile()" type="button">Save</button><br>
			  <!--<div class="editprofilewiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editAnnouncements()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveAnnouncements()" type="button">Save</button><br>
			  <!--<div class="announcementswiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editEvents()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveEvents()" type="button">Save</button><br>
			  <!--<div class="eventswiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editEmail()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveEmail()" type="button">Save</button><br>
			  <!--<div class="emailwiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseEight" class="collapse show" aria-labelledby="headingEight" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editDirectory()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveDirectory()" type="button">Save</button><br>
			  <!--<div class="directorywiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseNine" class="collapse show" aria-labelledby="headingNine" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editAdmin()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveAdmin()" type="button">Save</button><br>
			  <!--<div class="adminwiki"><?php /* echo $wiki->getBody() */?></div> -->
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
    	  <div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-parent="#docs">
      	    <div class="card-body">
      	  	  <button id="edit" class="btn btn-primary btn-sm" onclick="editFAQ()" type="button">Edit</button>
			        <button id="save" class="btn btn-primary btn-sm" onclick="saveFAQ()" type="button">Save</button><br>
			  <!--<div class="faqwiki"><?php /* echo $wiki->getBody() */?></div> -->
      	    </div>
    	  </div>
  		</div>
<!-- <p><a title="Login Page" href="assets/wiki/indexwiki.php" target="_blank" rel="noopener">Index Page</a></p>
<p><a title="Home Page" href="assets/wiki/homewiki.php" target="_blank" rel="noopener">Home Page</a></p>
<p><a title="Profile Page" href="assets/wiki/profilewiki.php" target="_blank" rel="noopener">Profile Page</a></p>
<p><a title="Edit Profile Page" href="assets/wiki/editprofilewiki.php" target="_blank" rel="noopener">Edit Profile Page</a></p>
<p><a title="Announcements Page" href="assets/wiki/announcementswiki.php" target="_blank" rel="noopener">Announcements Page</a></p>
<p><a title="Events Page" href="assets/wiki/eventswiki.php" target="_blank" rel="noopener">Events Page</a></p>
<p><a title="Email Page" href="assets/wiki/emailwiki.php" target="_blank" rel="noopener">Email Page</a></p>
<p><a title="Directory Page" href="assets/wiki/directorywiki.php" target="_blank" rel="noopener">Directory Page</a></p>
<p><a title="Admin Page" href="assets/wiki/adminwiki.php" target="_blank" rel="noopener">Admin Page</a></p>
<p><a title="FAQ Page" href="assets/wiki/faqwiki.php" target="_blank" rel="noopener">FAQ Page</a></p> --> 

<?php
include('./assets/inc/footer.php');

?>