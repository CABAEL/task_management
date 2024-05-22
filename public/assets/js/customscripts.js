function ajaxRequest(url, params, method) {
    return new Promise((resolve, reject) => {

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            method: method,
            data: params,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                resolve(response);
            },
            error: function(xhr, status, error) {
                reject({
                    xhr: xhr,
                    status: status,
                    error: error
                });
            }
        });

    });
}


 $('#signup-form').on('submit', function(e) {

    var firstnameValid = document.getElementById('firstname');
    var middleValid = document.getElementById('middle');
    var lastnameValid = document.getElementById('lastname');
    var usernameValid = document.getElementById('username');
    var passwordValid = document.getElementById('password');

    if (!firstnameValid.checkValidity()) {
        $('#firstname')[0].reportValidity();
    }
    else if(!middleValid.checkValidity()) {
        $('#middle')[0].reportValidity();
    }
    else if(!lastnameValid.checkValidity()) {
        $('#lastname')[0].reportValidity();
    }
    else if(!usernameValid.checkValidity()) {
        $('#username')[0].reportValidity();
    }
    else if (!passwordValid.checkValidity()) {
        $('#password')[0].reportValidity();
    }else{
        e.preventDefault();

        var url = $(this).attr('action');
        var params = $(this).serialize();
        var method = $(this).attr('method');
        
        alert(method);

        ajaxRequest(url, params, method)
        .then(function(response) {

            if(response.data.rdr){
                hide_loader();
                alert(response.message);
                window.location.replace(response.data.rdr)

            }else{
                hide_loader();
            }

        })
        .catch(function(error) {
            let errordiv = document.getElementById('errorsDiv')
            let errArray = error.xhr.responseJSON.errors;
            let div = '';

            Object.values(errArray).forEach(function (k,v){
                console.log(k)
                div += "<p> - "+k+"</p><br/>";
            })

            $('#errorsDiv').css('visibility','visible');

            errordiv.innerHTML = div;
            
            hide_loader();

        });

    }
 });

 $('#loginForm').on('submit', function(e) {
    
    show_loader();
    var usernameValid = document.getElementById('username');
    var passwordValid = document.getElementById('password');

    //extra validation
    if(usernameValid == '' || passwordValid == '') alert("Username and password required!");

    if (!usernameValid.checkValidity()) {
        $('#username')[0].reportValidity();
    }
    if (!passwordValid.checkValidity()) {
        $('#password')[0].reportValidity();
    }
    if (usernameValid && passwordValid) {
        e.preventDefault();

        var url = $(this).attr('action');
        var params = $(this).serialize();
        var method = $(this).attr('method');

        ajaxRequest(url, params, method)
        .then(function(response) {

            console.log('Success:', response);

            if(response.data.rdr){
                hide_loader();
                window.location.replace(response.data.rdr)

            }else{
                hide_loader();
                alert(response.errors[0])

            }

        })
        .catch(function(error) {
            
            hide_loader();
            console.log('Error:', error);

        });


    }
     
});


show_loader = () => {
    $('#preloader').css('visibility','visible');
}

hide_loader = () =>{
    $('#preloader').css('visibility','hidden');
}