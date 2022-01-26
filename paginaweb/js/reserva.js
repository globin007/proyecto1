$(document).ready(function(){
    $.ajax({
        url:'../controladores/get_all_bicy.php',
        type:'POST',
        data:{},
        success:function(data){
            //console.log(data);
            let html='';
            for (var i = 0; i < data.datos.length; i++) {
                html+=
                '<div class="product-box">'+
                    '<a href="detallebicicleta.php?p='+data.datos[i].id_bicicleta+'">'+
                        '<div class="product">'+
                            '<img src="../files/'+data.datos[i].imagen+'">'+
                            '<div class="detalles">'+
                                '<div class="detail-title">'+data.datos[i].marca+'</div>'+
                                '<div class="detail-description">'+data.datos[i].modelo+'</div>'+
                            '</div>'+
                        '</div>'+
                    '</a>'+
                '</div>';
            }
            document.getElementById("space-list").innerHTML=html;
        },
        error:function(err){
            console.error(err);
        }
    });
});

/*function busqueda() {
    var texto = document.getElementById("txtnom").value;
    var parametros = {
        "texto":texto
    };

    $.ajax({
        data:parametros,
        url:"controladores/valida.php",
        type:"POST",
        success:function(response){
            $("#space-list").html(response);
        }
    });
}
*/
