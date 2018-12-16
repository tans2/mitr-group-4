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
              <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="index" readonly/>
                <div class="indexwiki"><?php $wiki = new wiki( "index", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
              <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="home" readonly/>
                <div class="indexwiki"><?php $wiki = new wiki( "home", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="profile" readonly/>
                <div class="profilewiki"><?php $wiki = new wiki( "profile", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
              <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="editprofile" readonly/>
                <div class="editprofilewiki"><?php $wiki = new wiki( "editprofile", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="announcements" readonly/>
                <div class="announcementswiki"><?php $wiki = new wiki( "announcements", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="events" readonly/>
                <div class="eventswiki"><?php $wiki = new wiki( "events", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="email" readonly/>
                <div class="emailwiki"><?php $wiki = new wiki( "email", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="directory" readonly/>
                <div class="directorywiki"><?php $wiki = new wiki( "directory", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="admin" readonly/>
                <div class="adminwiki"><?php $wiki = new wiki( "admin", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="faq" readonly/>
                <div class="faqwiki"><?php $wiki = new wiki( "faq", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
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
      	     <form action="editwiki.php" method="post">
                <div class="card-body">
                    <input name="wiki" type="text" style="display:none;" value="wk" readonly/>
                <div class="wkwiki"><?php $wiki = new wiki( "wk", $mysqli ); echo $wiki->getBody(); ?></div> 
      	  	      <button id="edit" class="btn btn-primary btn-sm"  type="submit" name="submit">Edit</button>
      	    </div>
              </form>
    	  </div>
  		</div>
    </div>
  </div>
</body>
</html>