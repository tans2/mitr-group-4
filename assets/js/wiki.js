var editIndex = function() {
  $('.indexwiki').summernote({focus: true});
};

var saveIndex = function() {
  var markup = $('.indexwiki').summernote('code');
    window.location.href= "savewiki.php?index=" + markup;
  $('.indexwiki').summernote('destroy');
};


var editProfile = function() {
  $('.profilewiki').summernote({focus: true});
};

var saveProfile = function() {
  var markup = $('.profilewiki').summernote('code');
    window.location.href= "savewiki.php?profile=" + markup;
  $('.profilewiki').summernote('destroy');
};

var editHome = function() {
  $('.homewiki').summernote({focus: true});
};

var saveHome = function() {
  var markup = $('.homewiki').summernote('code');
    window.location.href= "savewiki.php?home=" + markup;
  $('.homewiki').summernote('destroy');
};

var editEditProfile = function() {
  $('.editprofilewiki').summernote({focus: true});
};

var saveEditProfile = function() {
  var markup = $('.editprofilewiki').summernote('code');
    window.location.href= "savewiki.php?editprofile=" + markup;
  $('.editprofilewiki').summernote('destroy');
};

var editAnnouncements = function() {
  $('.announcementswiki').summernote({focus: true});
};

var saveAnnouncements = function() {
  var markup = $('.announcementswiki').summernote('code');
    window.location.href= "savewiki.php?announcements=" + markup;
  $('.announcementswiki').summernote('destroy');
};

var editEvents = function() {
  $('.eventswiki').summernote({focus: true});
};

var saveEvents = function() {
  var markup = $('.eventswiki').summernote('code');
    window.location.href= "savewiki.php?events=" + markup;
  $('.eventswiki').summernote('destroy');
};

var editEmail = function() {
  $('.emailwiki').summernote({focus: true});
};

var saveEmail = function() {
  var markup = $('.emailwiki').summernote('code');
    window.location.href= "savewiki.php?email=" + markup;
  $('.emailwiki').summernote('destroy');
};

var editDirectory = function() {
  $('.directorywiki').summernote({focus: true});
};

var saveDirectory = function() {
  var markup = $('.directorywiki').summernote('code');
    window.location.href= "savewiki.php?directory=" + markup;
  $('.directorywiki').summernote('destroy');
};

var editAdmin = function() {
  $('.adminwiki').summernote({focus: true});
};

var saveAdmin = function() {
  var markup = $('.adminwiki').summernote('code');
    window.location.href= "savewiki.php?admin=" + markup;
  $('.adminwiki').summernote('destroy');
};

var editFAQ = function() {
  $('.faqwiki').summernote({focus: true});
}

var saveFAQ = function() {
  var markup = $('.faqwiki').summernote('code');
    window.location.href= "savewiki.php?faq=" + markup;
  $('.faqwiki').summernote('destroy');
}