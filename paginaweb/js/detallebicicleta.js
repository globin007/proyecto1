
$(document).ready(function(){
    $.ajax({
        url:'../controladores/cbicicleta.php',
        type:'POST',
        data:{},
        success:function(data){
            //console.log(data);
            //let html='';
            for (var i = 0; i < data.datos.length; i++) {
                if (data.datos[i].id_bicicleta==p) {
                    document.getElementById("imagen").src="../files/"+data.datos[i].imagen;
                    document.getElementById("marca").innerHTML=data.datos[i].marca;
                    document.getElementById("modelo").innerHTML=data.datos[i].modelo;
                    document.getElementById("color").innerHTML=data.datos[i].color;
                    document.getElementById("accesorios").innerHTML=data.datos[i].accesorios;
                    document.getElementById("serie").innerHTML=data.datos[i].serie;
                    //document.getElementById("id_bicicleta").innerHTML=data.datos[i].id_bicicleta;

                }
            }
            //document.getElementById("space-list").innerHTML=html;
        },
        error:function(err){
            console.error(err);
        }
    });
});


