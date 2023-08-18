$(document).ready(function(){
  $('#showPassword').click(function(){
      $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
  });
});