var editBio = function() {
  $('.cadetBio').summernote({focus: true, toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['color', ['color']],
    ['para', ['ul', 'ol']]
  ]});
};

var saveBio = function() {
  var markup = $('.cadetBio').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "updateProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("bio=" + markup);
  $('.cadetBio').summernote('destroy');
};
    
var editAFG = function() {
  $('.afGoals').summernote({focus: true, toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['color', ['color']],
    ['para', ['ul', 'ol']]
  ]});
};

var saveAFG = function() {
  var markup = $('.afGoals').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "updateProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("afg=" + markup);
  $('.afGoals').summernote('destroy');
};
    
var editPG = function() {
  $('.pGoals').summernote({focus: true, toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['color', ['color']],
    ['para', ['ul', 'ol']]
  ]});
};

var savePG = function() {
  var markup = $('.pGoals').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "updateProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pg=" + markup);
  $('.pGoals').summernote('destroy');
};
    
var editAA = function() {
  $('.awards').summernote({focus: true, toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['color', ['color']],
    ['para', ['ul', 'ol']]
  ]});
};

var saveAA = function() {
    $('.awards').summernote('code');
  var markup = $('.awards').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "updateProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("aa=" + markup);
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