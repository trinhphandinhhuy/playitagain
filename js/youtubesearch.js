var suggestCallBack;
$(document).ready(function(){

  $("#submit").hover(function(){
        $(this).css("background-color", "rgba(255,255,255,0.2)");
        }, function(){
        $(this).css("background-color", "transparent");
    });

  $('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

$('.navbar-collapse button').click(function() {
  $('.navbar-toggle:visible').click();
});

$('[data-toggle="tooltip"]').tooltip();

$('.submit').click(function(e){
  $('body').css('background-image','none');

  $('#search').appendTo('#search-navbar');
  $('#search').removeClass("search-header");
  $('#q').removeClass("search-header");
  $('#q').removeClass("widthsize-input");
  $('#q').removeClass("nice-input");
  $('#submit').removeClass("search-header");
  $('#submit').removeClass("nice-button btn-lg");

  $('#search').addClass('navbar-form navbar-left');
  $('#q').addClass("form-control");
  $('#submit').addClass("btn btn-info");

  $("#contenthere").load('search.html');

  e.preventDefault();
  $('table tbody tr').remove();

$.get("handlesearch.php", $(".search").serialize(),  function(response) {

  var tmp = response.split(";");
  var vid = new Array();
  for(var i=0; i < 20 ; i++)
  {
    vid[i] = tmp[i].split(",");
  }


  //remove the greeting part
  if($('header').length)
  {
    $('header').remove();
  }


  url = "http://www.youtube.com/embed/" + vid[0][0] + "?rel=0&showinfo=0&autohide=1&loop=1&autoplay=0&playlist=" + vid[0][0];
  $(document).prop('title', vid[0][1]);
  $('#video').prop('src', url);

  for(var i=0; i < 20 ; i++)
  {

    $('#pic-content').append("<tr><td><img id='" + vid[i][0] + "' class='pull-left' title='"+ vid[i][1]+"' src='http://img.youtube.com/vi/"+ vid[i][0]+"/1.jpg' /></td><td>" + vid[i][1]+ "</td></tr>");
  }


  $('table tbody tr').on("click",function(e){

    var newID = $(this).find('img').attr('id');
    var newTitle = $(this).find('img').attr('title');
    url = "http://www.youtube.com/embed/" + newID + "?rel=0&showinfo=0&autohide=1&loop=1&autoplay=0&playlist=" + newID;
    $(document).prop('title', newTitle);
    $('#video').prop('src', url);

  });


});
});

});
