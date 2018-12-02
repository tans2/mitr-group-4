var editBio = function() {
  $('.cadetBio').summernote({focus: true});
};

var saveBio = function() {
  var markup = $('.cadetBio').summernote('code');
    var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "./updateProfile.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.send("bio=" + markup);
  $('.cadetBio').summernote('destroy');
};
    
var editAFG = function() {
  $('.afGoals').summernote({focus: true});
};

var saveAFG = function() {
  var markup = $('.afGoals').summernote('code');
       var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "./updateProfile.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.send("afg=" + markup);
  $('.afGoals').summernote('destroy');
};
    
var editPG = function() {
  $('.pGoals').summernote({focus: true});
};

var savePG = function() {
  var markup = $('.pGoals').summernote('code');
           var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "./updateProfile.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.send("pg=" + markup);
  $('.pGoals').summernote('destroy');
};
    
var editAA = function() {
  $('.awards').summernote({focus: true});
};

var saveAA = function() {
    $('.awards').summernote('code');
  var markup = $('.awards').summernote('code');
          var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "./updateProfile.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.send("aa=" + markup);
  $('.awards').summernote('destroy');
};

function validateForm()
{
    var fail = 0;
    var primEmail = document.forms["genInfo"]["pemail"].value;
    var primPhone = document.forms["genInfo"]["pphone"].value;
    if (primEmail == "") {
        document.getElementById("pemail").style.borderColor = "#ff4a4a";
        fail = 1;
    }
    if (primPhone == "") {
        document.getElementById("pphone").style.borderColor = "#ff4a4a";
        fail = 1;
    }
    if( fail == 1 ) {
        alert("Highlighted fields must be filled out to save changes");
        return false;
    }
}