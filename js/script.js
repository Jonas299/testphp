$(document).ready(function(){
    //get();

    $('#users tbody').on('click','#preUpdate',function(){
        //<button class="btn btn-primary w-100" id="btnUpdate" onclick="update()">Registrar</button>
        $('#nombre').val($(this).closest('tr').find("td:eq(1)").text());
        $('#apellido').val($(this).closest('tr').find("td:eq(2)").text());
        $('#email').val($(this).closest('tr').find("td:eq(3)").text());

        $("#newUSer #buttons").append(``);
    }); 
}); 

function logIn() {
    let user = $('#user').val();
    let pass = $('#pass').val();
    let datos =
    {
        "action": 'login',
        "user": user,
        'pass': pass
    }
    $.ajax({
        url: '../conection/init.php',
        method: 'POST',
        data: datos
    }).done(function (response) {
        Swal.fire({
            title: 'Bienvenido',
            icon: 'success',
            html: `EL usuario <strong>${response['user']}</strong> ha sido autenticado.`
        })
    }).fail(function (response) {
        Swal.fire({
            title: 'ERROR',
            icon: 'error',
            text: 'No se han podido validar sus datos con nuestros registros'
        })
    });
}
function get(){

    let datos =
    {
        "action": 'get',
    }
    $.ajax({
        url: '../../conection/api.php',
        method: 'POST',
        data: datos
    }).done(function (response) {
        let rows = "";
        response['users'].forEach(user => {
            rows += 
            `<tr>
                <td>${user['id']}</td>
                <td>${user['nombre']}</td>
                <td>${user['apellido']}</td>
                <td>${user['email']}</td>
                <td>
                    <button class='btn btn-danger' onclick='destroy(${user['id']})'>Borrar</button>
                    <button class='btn btn-warning' disabled id='preUpdate'>Actualizar</button>
                </td>
            </tr>`;
        });
        $("#users tbody").html(rows);
    }).fail(function (response) {
        Swal.fire({
            title: 'ERROR',
            icon: 'error',
            text: 'Se ha producido un error'
        })
    });
}
function set(){
    let nombre = $('#nombre').val();
    let apellido = $('#apellido').val();
    let email = $('#email').val();
    let pass = $('#pass').val();
    let datos =
    {
        "action": 'set',
        "nombre": nombre,
        'apellido': apellido,
        'email': email,
        'password': pass
    }
    $.ajax({
        url: '../../conection/api.php',
        method: 'POST',
        data: datos
    }).done(function (response) {
        $('#nombre').val('');
        $('#apellido').val('');
        $('#email').val('');
        $('#pass').val('');
        get();
        Swal.fire({
            title: 'Usuario registrado con exito',
            icon: 'success',
            showConfirmButton:false,
            timer: 2000
        })
    }).fail(function (response) {
        Swal.fire({
            title: 'ERROR',
            icon: 'error',
            text: 'No se han podido validar sus datos con nuestros registros'
        })
    });
}
function update(id){
    let nombre = $('#nombre').val();
    let apellido = $('#apellido').val();
    let email = $('#email').val();
    let pass = $('#pass').val();
    let datos =
    {
        "action": 'update',
        "id": id,
        "nombre": nombre,
        'apellido': apellido,
        'email': email,
        'password': pass
    }
    $.ajax({
        url: '../../conection/api.php',
        method: 'POST',
        data: datos
    }).done(function (response) {
        get();
        Swal.fire({
            title: 'Usuario actualizado con exito',
            icon: 'success',
            showConfirmButton:false,
            timer: 2000
        })
    }).fail(function (response) {
        Swal.fire({
            title: 'ERROR',
            icon: 'error',
            text: 'Se ha producido un error'
        })
    });
}
function destroy(id){
    let datos =
    {
        "action": 'delete',
        "id": id
    }
    $.ajax({
        url: '../../conection/api.php',
        method: 'POST',
        data: datos
    }).done(function (response) {
        get();
        Swal.fire({
            title: 'Usuario eliminado con exito',
            icon: 'success',
            showConfirmButton:false,
            timer: 2000
        })
    }).fail(function (response) {
        Swal.fire({
            title: 'ERROR',
            icon: 'error',
            text: 'Se ha producido un error'
        })
    });
}