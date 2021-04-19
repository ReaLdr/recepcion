eventListeners();

function eventListeners() {
    if (document.getElementById('form-login-censo')) {
        document.getElementById('form-login-censo').addEventListener('submit', fn_login);
    }

    if (document.getElementById('table_result')) {
        document.getElementById('table_result').addEventListener('click', fn_received_qr);
    }

}

function fn_login(e) {

    e.preventDefault();

    var usuario = $('#usuariotp').val();
    var contrasena = $('#contrasenatp').val();
    $.post("selectlogin.php", {
        usuario: usuario,
        contrasena: contrasena
    }, function (result) {
      console.log(result);
        var obj = JSON.parse(result);
        if (obj.success) {

          window.location.replace('main.php');

        } else {
          var res = '<div class="alert alert-warning"><p>' + obj.mensaje1 + '</p></div>';
          $("#errormsg").html(res);
        }
    });

}

function fn_received_qr(e){
  e.preventDefault();

  //fa-check-circle

  let id_registro;

  if(e.target.classList.contains('fa-check-circle') && !e.target.classList.contains('received')){
      id_registro = e.target.parentElement.parentElement.id.split(':')[1];

      let datos = new FormData();
      datos.append('id_registro', id_registro);

      // OTRA FORMA DE HACER EL LLAMADO A AJAX

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'modelos/modelo_cambia_estado.php', true);
      xhr.onload = function () {
          if (this.status === 200) {
            console.log(xhr.responseText);
            var respuesta = JSON.parse(xhr.responseText);
            if (respuesta.respuesta == "correcto") {
                $("#qr_"+id_registro).html(respuesta.qr);
                $(e.target).addClass("received");
            } else {
                alert("Ocurrió un error durante la actualización.");
            }
        }
    };

    xhr.send(datos);

  }

  if(e.target.classList.contains('fa-qrcode')){
      id_registro = e.target.parentElement.parentElement.id.split(':')[1];

      //alert(id_registro);
        $id_link = "http://192.168.1.67/recepcion/acuse.php?cod="+id_registro;
        //$id_link = "http://145.0.40.76/recepcion/acuse.php?cod="+id_registro;
        //$id_link = "http://192.168.1.86/recepcion/acuse.php?cod="+id_registro;
            $.ajax({
                url:'generate_code.php',
                type:'POST',
                data: {formData:id_registro, ecc:'H', size:'9', id_link: $id_link},
                success: function(response) {
                    console.log(response);
                    $(".modal-body").html(response);
                },
             });
             $('#exampleModalCenter').modal('show');

  }

}
