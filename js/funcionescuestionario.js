eventListeners();

function eventListeners() {
    if (document.getElementById('form-login-censo')) {
        document.getElementById('form-login-censo').addEventListener('submit', fn_login);
    }

    if (document.getElementById('table_result')) {
        document.getElementById('table_result').addEventListener('click', fn_registrar_acuse);
    }

}

function fn_login(e) {
    e.preventDefault();
    alert("Funciona");
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

function fn_registrar_acuse(e){
  e.preventDefault();

  if(e.target.classList.contains('fa-check-circle') && !(e.target.classList.contains('received'))){
    alert("cambiamos estado a checkado");

    let datos = new FormData();
    datos.append('idseccion', idseccion);

    // OTRA FORMA DE HACER EL LLAMADO A AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'modelos/modelo_cambia_estado.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(xhr.responseText);
            var respuesta = JSON.parse(xhr.responseText);
            if (respuesta.respuesta == "correcto") {
                var accion = respuesta.accion;
                if (accion == 1) {
                    document.getElementById('distrito_' + respuesta.distrito).innerHTML = `<i class="far fa-check-circle" title="Acceso bloqueado">Acceso permitido</i>`;
                }

                if (accion == 0) {
                    document.getElementById('distrito_' + respuesta.distrito).innerHTML = `<i class="far fa-times-circle" title="Acceso permitido">Acceso bloqueado</i>`;
                }
            } else {
                alert(respuesta.mensaje);
            }
        }
    };

    xhr.send(datos);

  }
}
