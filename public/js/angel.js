
 


function enviar(cadena,urls=''){
  $('input[type="submit"]').attr('disabled',true);
/*  $('.load').show();*/
  //var envio = $.post('',cadena,function(){},'json');
 $.ajax({
      url:urls,
      type: "POST",
      data: cadena,
      contentType: false,
      processData: false,
      
      success: function(datos)
      {
console.log(datos);
    if($.isEmptyObject(datos.error)){
      swal({
             type: "success",
              title: "¡Se guardo exitosamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function(result){

              if(result.value){
                location.reload();              

              }

            }); 
    }else{
       $('input[type="submit"]').attr('disabled',false);
      $.each(datos.error, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
      }

      }

  });

}

//Función para eliminar registros
function eliminardata(cadena,urls)
{
 
  swal({

              title: "¿Eliminar?",
              text: "¿Está Seguro de eliminar?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
              }).then(function(result){
               if(result.value){

                $.ajax({
                    url:urls,
                    type: "POST",
                    data: cadena,
                    contentType: false,
                    processData: false,
                    
                    success: function(datos)
                    {
                    location.reload();  
                    }
                     });         

              }
            });
} 

//Función para eliminar registros
function eliminarsubdata(cadena)
{
 
  swal({
              title: "¿Eliminar?",
              text: "¿Está Seguro de eliminar?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
              }).then(function(result){
               if(result.value){

                $.post("", cadena, function(e){
                  swal('!!! Eliminado !!!','Se Eliminno','success');
                    location.reload();
                    });   


              }else {
              swal("! Cancelado ¡", "Se Cancelo", "error");
             }
            });
}

//Función para eliminar registros
function estadodata(cadena)
{
 
  swal({
              title: "Estado?",
              text: "¿Está Seguro de cambiar de estado?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
              }).then(function(result){
               if(result.value){
                $.post("", cadena, function(e){
                  swal('!!! Estado !!!','Se Cambio','success');
                    tabla.ajax.reload();   });         

              }else {
              swal("! Cancelado ¡", "Se Cancelo", "error");
             }
            });
} 


