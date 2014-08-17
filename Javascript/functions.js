$('#textinput').keypress(function(event) {
  if (event.which == '13') {
     event.preventDefault();
      $('#textList').append('<div>' + $(this).val() + ' <span onclick="$(this).parent().remove();"></span> </div>');
      $(this).val('');
   }
});


$('#search_box).load('changepassword.php', function() {
  $('#search_box').show();

}); 

