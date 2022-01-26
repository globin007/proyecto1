$("#frmAcceso").on("submit", function(e) {
  e.preventDefault();
  login = $("#login").val();
  password = $("#password").val();

  //alert(login+clave);
  $.post(
    "../controladores/usuario.php?op=verificar",
    { login: login, password: password },
    function(data) {
      if (data != "null") {
        $(location).attr("href", "../vistas/formularios/principal.php");
      } else {
        //console.log(login+password);
        swal("Usuario y/o Password incorrectos","","error");
      }
    }
  );
});