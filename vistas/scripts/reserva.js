$(function () {
  //$('#listado').hide();
  $.post("../../controladores/reserva.php?op=cliente", function (r) {
    $("#id_usuario").html(r);
    $("#id_usuario").select2({
      placeholder: "Seleccione cliente"
    });
  });

  $.post("../../controladores/reserva.php?op=estado", function (r) {
    $("#id_estado").html(r);
    $("#id_estado").select2({
      placeholder: "Seleccione estado"
    });
  });



  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
  })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', {
    'placeholder': 'mm/dd/yyyy'
  })
  //Money Euro
  $('[data-mask]').inputmask()

  //Date picker
  $('#reservationdate').datetimepicker({
    format: 'L'
  });

  //Date and time picker
  $('#reservationdatetime').datetimepicker({
    icons: {
      time: 'far fa-clock'
    }
  });

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
      format: 'MM/DD/YYYY hh:mm A'
    }
  })
  //Date range as a button
  $('#daterange-btn').daterangepicker({
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

  //Timepicker
  $('#timepicker').datetimepicker({
    format: 'LT'
  })

  //Bootstrap Duallistbox
  $('.duallistbox').bootstrapDualListbox()

  //Colorpicker
  $('.my-colorpicker1').colorpicker()
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  $('.my-colorpicker2').on('colorpickerChange', function (event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
  })

  $("input[data-bootstrap-switch]").each(function () {
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })

})

//Funciones -------------------------------------------------------------------------------


var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000
});

$('#contenido-listado-check').hide();

mostrarform(false);


function mostrarform(flag) {
  if (flag) {
    $('#form').show();
    $('#listado').hide();
    //$('#detalles').hide();
  } else {
    $('#form').hide();
    $('#listado').show();
    //$('#detalles').hide();
  }
}

function mostrar(id_reserva) {
  $.post("../../controladores/reserva.php?op=mostrar", {
    id_reserva: id_reserva
  }, function (data, status) {
    data = JSON.parse(data);
    limpiar();
    fecha = data.fecha.substring(0, 10);
    hora_inicio = data.hora_inicio.replace(" ", "T");
    hora_fin = data.hora_fin.replace(" ", "T");
    if(data.id_reserva < 10){
      numero_reserva = '000'+data.id_reserva;
    }
    else if (data.id_reserva < 100) {
      numero_reserva = '00' + data.id_reserva;
    }
    else if (data.id_reserva < 1000) {
      numero_reserva = '0' + data.id_reserva;
    }
    else{
      numero_reserva = data.id_reserva;
    }
    $("#id_reserva").val(data.id_reserva);
    $("#fecha").val(fecha);
    $("#hora_inicio").val(hora_inicio);
    $("#hora_fin").val(hora_fin);
    $("#monto").val(data.monto);
    $("#descuento").val(data.descuento);
    $("#total").val(data.total);
    $('#id_usuario').val(data.id_usuario).trigger('change.select2');
    $('#id_estado').val(data.id_estado).trigger('change.select2');
    $("#titulo-reserva").html('Reserva N° ' + numero_reserva + '<button id="btn-detalles" class="btn btn-xs btn-warning text-white mx-2" type="button" onclick="detalles(' + data.id_reserva + ')"><i class="fa fa-list"></i> Ver Detalles </button>');
    $.post("../../controladores/reserva.php?op=checkdetalles", {
          id_reserva: id_reserva
        }, function (r) {
      $("#listado-check").html(r);
    });
    mostrarform(true);
  })
}

function limpiar() {
  $("#id_reserva").val("");
  $("#fecha").val("");
  $("#hora_inicio").val("");
  $("#hora_fin").val("");
  $("#monto").val("0");
  $("#descuento").val("0");
  $("#total").val("0");
  $("#id_usuario").val(null).trigger("change")
  $("#id_estado").val(null).trigger("change")
  $("#imagen").val("");
  $('#imagen').next('label').html('Agregue una foto');
  $("#titulo-reserva").html("");
}

$("#btn-agregar").click(function () {
  limpiar();
  var d = new Date();
  month = d.getMonth() + 1;
  day = d.getDate();
  fecha = d.getFullYear() + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
  $("#fecha").val(fecha);
  $("#titulo-reserva").html('Nueva Reserva<button id="btn-detalles" class="btn btn-xs btn-warning text-white mx-2" type="button" onclick="detalles(0)"><i class="fa fa-list"></i> Ver Bicicletas </button>');
  $.post("../../controladores/reserva.php?op=checkdetalles", {
    id_reserva: 0
  }, function (r) {
    $("#listado-check").html(r);
  });
  mostrarform(true);
})

$("#btn-cancelar").click(function () {
  limpiar();
  mostrarform(false);
})

function listar() {

  $('#registros').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "ajax": {
      url: '../../controladores/reserva.php?op=listar',
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }
    }
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  //$("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../../controladores/reserva.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (data) {
      data = JSON.parse(data);
      if (data.condicion == 1) {
        Toast.fire({
          icon: 'success',
          title: data.mensaje
        });
        mostrarform(false);
        $('#registros').DataTable().ajax.reload();
        limpiar();
      } else if (data.condicion == 2) {
        Toast.fire({
          icon: 'error',
          title: data.mensaje
        });
        mostrarform(false);
        $('#registros').DataTable().ajax.reload();
        limpiar();
      } else {
        Toast.fire({
          icon: 'error',
          title: data.mensaje
        })
      }
    }

  });
}

$("#monto").change(function () {
  monto = $("#monto").val();
  descuento = $("#descuento").val();
  total = monto - descuento;
  $("#total").val(total);
})

$("#descuento").change(function () {
  monto = $("#monto").val();
  descuento = $("#descuento").val();
  total = monto - descuento;
  $("#total").val(total);
})

function reservas(id_bicicleta) {
  $.post("../../controladores/reserva.php?op=listareservas", {
    id_bicicleta: id_bicicleta
  }, function (response) {
    $("#modalimg").html(response);
  });
}

function detalles(id_reserva){
  $.post("../../controladores/reserva.php?op=listadodetalles", {
        id_reserva: id_reserva
      }, function (r) {
    $("#listado-detalles").html(r);
  });
  // $('#form').hide();
  // $('#listado').hide();
  // $('#detalles').show();
}

function agregar(id_bicicleta) {

  hora_inicio = $("#hora_inicio").val();
  hora_fin = $("#hora_fin").val();

  if (hora_inicio == "" || hora_fin == ""){
    Toast.fire({
      icon: 'info',
      title: 'Complete los campos Inicio y Fin'
    });
    mostrarform(true);
  }
  else{
    let fecha1 = new Date(hora_inicio);
    let fecha2 = new Date(hora_fin);

    let resta = fecha2.getTime() - fecha1.getTime()
    horas = Math.round(resta / (1000 * 60 * 60));
    monto = $("#monto").val();
    monto = parseInt(monto) + horas * 10;
    $("#monto").val(monto);
    descuento = $("#descuento").val();
    total = monto - descuento;
    $("#total").val(total);

    $("#customCheckbox" + id_bicicleta).attr("checked", "checked");
    $("#add" + id_bicicleta).attr("class", "btn btn-sm bg-danger");
    $("#add" + id_bicicleta).attr("onclick", "quitar('" + id_bicicleta + "')");
    $("#add" + id_bicicleta).html("<i class ='fas fa-trash '> </i> Quitar");
    $("#add" + id_bicicleta).attr("id", "delete" + id_bicicleta);

    Toast.fire({
      icon: 'success',
      title: 'Bicicleta agregada!!'
    });

    mostrarform(true);
  }
}

function quitar(id_bicicleta) {
  hora_inicio = $("#hora_inicio").val();
  hora_fin = $("#hora_fin").val();

  if (hora_inicio == "" || hora_fin == "") {
    Toast.fire({
      icon: 'info',
      title: 'Complete los campos Inicio y Fin'
    });
    mostrarform(true);
  } 
  else {
  let fecha1 = new Date(hora_inicio);
  let fecha2 = new Date(hora_fin);
  let resta = fecha2.getTime() - fecha1.getTime()
  horas = Math.round(resta / (1000 * 60 * 60));
  monto = $("#monto").val();
  monto = parseInt(monto) - horas * 10;
  $("#monto").val(monto);
  descuento = $("#descuento").val();
  total = monto - descuento;
  $("#total").val(total);
  //check = $("#lista" + this.id).attr("checked")
  $("#customCheckbox" + id_bicicleta).removeAttr("checked");
  $("#delete" + id_bicicleta).attr("class", "btn btn-sm bg-teal");
  $("#delete" + id_bicicleta).attr("onclick", "agregar('" + id_bicicleta + "')");
  $("#delete" + id_bicicleta).html("<i class ='fas fa-plus '> </i> Agregar");
  $("#delete" + id_bicicleta).attr("id", "add" + id_bicicleta);
  //mostrarform(true);

  Toast.fire({
    icon: 'warning',
    title: 'Bicicleta descartada!!'
  });
  } 
}





// DropzoneJS Demo Code End