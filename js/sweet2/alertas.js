function salud() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una unidad de salud',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#selsecctor').focus(), 50)
        }  	
	});
}

function paterno() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'El apellido paterno está vacío por favor escriba uno',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#apaterno').focus(), 50)
        }  	
	});
}

function materno() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'El apellido materno está vacío por favor escriba uno',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#amaterno').focus(), 50)
        }  	
	});
}

function nombres() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Los nombres están vacíos por favor escriba uno',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#nombre').focus(), 50)
        }  	
	});
}

function sexoc() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Por favor seleccione un tipo de sexo',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#sexo').focus(), 50)
        }  	
	});
}

function anosc() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Por favor escriba cuantos años tienes',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#anos').focus(), 50)
        }  	
	});
}

function anocursasc() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Por favor seleccione que año cursa',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#anocursas').focus(), 50)
        }  	
	});
}

function pregunta4_6() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 4 insiso 6',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p4_6').focus(), 50)
        }  	
	});
}

function pregunta5_15() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 15',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_14').focus(), 50)
        }  	
	});
}

function pregunta5_16() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 16',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_15').focus(), 50)
        }  	
	});
}

function pregunta5_17() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 17',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_16').focus(), 50)
        }  	
	});
}

function pregunta5_18() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 18',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_17').focus(), 50)
        }  	
	});
}

function pregunta5_19() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 19',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_18').focus(), 50)
        }  	
	});
}

function pregunta5_20() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 20',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_19').focus(), 50)
        }  	
	});
}

function pregunta5_21() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Seleccione una opcion en la pregunta 5 insiso 21',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#p5_20').focus(), 50)
        }  	
	});
}

function contrano() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Favor de escribir una contraseña',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#txtPass').focus(), 50)
        }  	
	});
}

function CN() {
	Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Contraseña Incorrecta verifique por favor',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#txtPass').focus(), 50)
        }  	
	});
}

function usuariono() {
	Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Favor de escribir un usuario',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#txtUsuario').focus(), 50)
        }  	
	});
}

function UN() {
	Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Usuario incorrecto verifique por favor',
        confirmButtonText: 'Aceptar',
        onAfterClose: () => {
        	setTimeout(() => $('#txtUsuario').focus(), 50)
        }  	
	});
}

function good(){
    Swal.fire({
  		title: '¡Buen trabajo!',
  		text: "Cuestionario guardado correctamente",
  		type: 'success',
  		confirmButtonText: 'Aceptar'
		}).then((result) => {
  		if (result.value) {
    		location.href="index.php";
  		}
	})
}

function nogood(){
	Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Cuestionario no pudo ser guardado verifique'
     })
}

function hijos(){
	var p5_32 = document.getElementById('p5_32').checked;
	if (p5_32 == true) {
		var p5_otro3 = document.getElementById('p5_32');
		p5_otro3.value = "";
		document.getElementById("edad").style.display = 'none'; //ocultar

	}else{
		document.getElementById("edad").style.display = 'block'; //Mostrar
	}
}