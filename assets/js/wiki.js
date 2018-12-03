var editIndex = function() {
  $('.indexwiki').summernote({focus: true});
};

var saveIndex = function() {
  var markup = $('.indexwiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("index=" + markup);
  $('.indexwiki').summernote('destroy');
};


var editProfile = function() {
  $('.profilewiki').summernote({focus: true});
};

var saveProfile = function() {
  var markup = $('.profilewiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("profile=" + markup);
  $('.profilewiki').summernote('destroy');
};

var editHome = function() {
  $('.homewiki').summernote({focus: true});
};

var saveHome = function() {
  var markup = $('.homewiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("home=" + markup);
  $('.homewiki').summernote('destroy');
};

var editEditProfile = function() {
  $('.editprofilewiki').summernote({focus: true});
};

var saveEditProfile = function() {
  var markup = $('.editprofilewiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("editprofile=" + markup);
  $('.editprofilewiki').summernote('destroy');
};

var editAnnouncements = function() {
  $('.announcementswiki').summernote({focus: true});
};

var saveAnnouncements = function() {
  var markup = $('.announcementswiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("announcements=" + markup);
  $('.announcementswiki').summernote('destroy');
};

var editEvents = function() {
  $('.eventswiki').summernote({focus: true});
};

var saveEvents = function() {
  var markup = $('.eventswiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("events=" + markup);
  $('.eventswiki').summernote('destroy');
};

var editEmail = function() {
  $('.emailwiki').summernote({focus: true});
};

var saveEmail = function() {
  var markup = $('.emailwiki').summernote('code');
        var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + markup);
  $('.emailwiki').summernote('destroy');
};

var editDirectory = function() {
  $('.directorywiki').summernote({focus: true});
};

var saveDirectory = function() {
  var markup = $('.directorywiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("directory=" + markup);
  $('.directorywiki').summernote('destroy');
};

var editAdmin = function() {
  $('.adminwiki').summernote({focus: true});
};

var saveAdmin = function() {
  var markup = $('.adminwiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("admin=" + markup);
  $('.adminwiki').summernote('destroy');
};

var editFAQ = function() {
  $('.faqwiki').summernote({focus: true});
}

var saveFAQ = function() {
  var markup = $('.faqwiki').summernote('code');
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savewiki.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("faq=" + markup);
  $('.faqwiki').summernote('destroy');
}