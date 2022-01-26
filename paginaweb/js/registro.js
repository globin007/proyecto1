$(function () {
  $("#formulario").on("submit", function (e) {
      //alert("guardando")
    guardaryeditar(e);
  });
})

var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000
});

function limpiar(){
  $("#login").val("");
  $("#password").val("");
  $("#nombres").val("");
  $("#apematerno").val("");
  $("#apepaterno").val("");
  $("#dni").val("");
  $("#tipo").attr("");
  $("#celular").attr("");
  $("#id_usuario").val("");
  $("#tipo").val(null).trigger("change")
  $("#tipo").val(null).trigger("change")
}

$("#btn-cancelar").click(function () {;
  limpiar();
  $(location).attr('href', '../formularios/login.php');
})

function guardaryeditar(e) {
    dni = $("#dni").val();
    e.preventDefault();
    //$("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);
  
    $.ajax({
      url: "../controladores/usuario.php?op=guardaryeditar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
  
      success: function (data) {
        data = JSON.parse(data);
        if (data.condicion == 1) {
          Toast.fire({
            icon: 'success',
            title: 'Registrado Correctamente'
          });
  
          Swal.fire({
              icon: 'success',
              title: "Ha sido registrado correctamente",
              html: "<strong>Usuario: </strong>" + dni + " y <strong>Contrasena: </strong>" + dni + "<br><br><a class='btn btn-xs btn-outline-primary' href='login.php'>Iniciar Sesion</a>",
              showConfirmButton: false,
            })
        }
      }
  
    });
  }

