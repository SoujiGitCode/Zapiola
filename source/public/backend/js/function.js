$(document).ready(function() {
    $("#entrar").click(function() {
     
                var route = $("#url").val() + "/cms";
                var token = $("#token").val();
                if ($("#email").val() == "") {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "Ingresa tu correo electrónico"
                    });
                    $("#email").focus();
                    return false;
                }
                if ($("#password").val() == "") {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "Ingresa tu contraseña"
                    });
                    $("#password").focus();
                    return false;
                } else {
                    $.ajax({
                        url: route,
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        type: 'POST',
                        dataType: 'json',
                        data: encrypt_data(),
                        success: function(data) {
                            if (data.response == 'true') {
                                var stateObj = {
                                    foo: "dashboard"
                                };
                                history.pushState(stateObj, "Área Administrativa", "dashboard");
                                window.location = $("#url").val() + "/dashboard";
                            }
                            if (data.response == 'false') {
                                swal({
                                        title: 'Atención',
                                        type: "warning",
                                        text: "Los datos ingresados son incorrectos, por favor verificar",
                                        confirmButtonColor: "#2196f3",
                                        cancelButtonColor: "#2196f3",
                                        cancelButtonText: "Aceptar",
                                        confirmButtonText: "Aceptar"
                                    },
                                    function() {
                                        //location.reload();
                                    });
                                return false;
                            }
                           
                        },
                        error: function(data) {
                         
                                    //location.reload();
                               
                        }
                    });
                }
          
    });
    $('#email').keyup(function(e) {
      
                if (e.keyCode == 13) {
                    var route = $("#url").val() + "/cms";
                    var token = $("#token").val();
                    if ($("#email").val() == "") {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: "Ingresa tu correo electrónico"
                        });
                        $("#email").focus();
                        return false;
                    }
                    if ($("#password").val() == "") {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: "Ingresa tu contraseña"
                        });
                        $("#password").focus();
                        return false;
                    } else {
                        $.ajax({
                            url: route,
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            type: 'POST',
                            dataType: 'json',
                            data: encrypt_data(),
                            success: function(data) {
                                if (data.response == 'true') {
                                    var stateObj = {
                                        foo: "dashboard"
                                    };
                                    history.pushState(stateObj, "Área Administrativa", "dashboard");
                                    window.location = $("#url").val() + "/dashboard";
                                }
                                if (data.response == 'false') {
                                    swal({
                                            title: 'Atención',
                                            type: "warning",
                                            text: "Los datos ingresados son incorrectos, por favor verificar",
                                            confirmButtonColor: "#2196f3",
                                            cancelButtonColor: "#2196f3",
                                            cancelButtonText: "Aceptar",
                                            confirmButtonText: "Aceptar"
                                        },
                                        function() {
                                            //location.reload();
                                        });
                                    return false;
                                }
                                
                            },
                            error: function(data) {
                              
                                        //location.reload();
                                    
                            }
                        });
                    }
                }
      
    });
    $('#password').keyup(function(e) {
       
                if (e.keyCode == 13) {
                    var route = $("#url").val() + "/cms";
                    var token = $("#token").val();
                    if ($("#email").val() == "") {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: "Ingresa tu correo electrónico"
                        });
                        $("#email").focus();
                        return false;
                    }
                    if ($("#password").val() == "") {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: "Ingresa tu contraseña"
                        });
                        $("#password").focus();
                        return false;
                    } else {
                        $.ajax({
                            url: route,
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            type: 'POST',
                            dataType: 'json',
                            data: encrypt_data(),
                            success: function(data) {
                                if (data.response == 'true') {
                                    var stateObj = {
                                        foo: "dashboard"
                                    };
                                    history.pushState(stateObj, "Área Administrativa", "dashboard");
                                    window.location = $("#url").val() + "/dashboard";
                                }
                                if (data.response == 'false') {
                                    swal({
                                            title: 'Atención',
                                            type: "warning",
                                            text: "Los datos ingresados son incorrectos, por favor verificar",
                                            confirmButtonColor: "#2196f3",
                                            cancelButtonColor: "#2196f3",
                                            cancelButtonText: "Aceptar",
                                            confirmButtonText: "Aceptar"
                                        },
                                        function() {
                                            //location.reload();
                                        });
                                    return false;
                                }
                             
                            },
                            error: function(data) {
                               
                                        //location.reload();
                                
                            }
                        });
                    }
                }
        
    });
    $("#btn-recovery").click(function() {
      
                var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var url = $("#url").val();
                if ($("#email-recovery").val() == "") {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "Ingresa tu correo electrónico"
                    });
                    $("#email-recovery").focus();
                    return false;
                } else if (!expr.test($("#email-recovery").val())) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "El formato del  correo electrónico es incorrecto"
                    });
                    $("#email-recovery").focus();
                    return false;
                } else {
                    var route = url + "/store_recovery";
                    var token = $("#token").val();
                    $.ajax({
                        url: route,
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        type: 'POST',
                        dataType: 'json',
                        data: encrypt_data(),
                        success: function(data) {
                            if (data.response == 'success') {
                                swal({
                                        title: 'Se ha enviado una nueva contraseña a su correo electrónico.',
                                        text: "",
                                        type: "warning",
                                        confirmButtonColor: "#2196f3",
                                        cancelButtonColor: "#2196f3",
                                        cancelButtonText: "Aceptar",
                                        confirmButtonText: "Aceptar",
                                    },
                                    function() {
                                        window.location = url + '/cms';
                                    });
                            }
                            
                            if (data.response == 'error') {
                                swal({
                                        title: 'Atención',
                                        type: "warning",
                                        text: "El correo electrónico no se encuentra registrado en el sistema",
                                        confirmButtonColor: "#2196f3",
                                        cancelButtonColor: "#2196f3",
                                        cancelButtonText: "Aceptar",
                                        confirmButtonText: "Aceptar"
                                    },
                                    function() {
                                        //location.reload();
                                    });
                                return false;
                            }
                        },
                        error: function(data) {
                           
                                    //location.reload();
                            
                        }
                    });
                }
        
    });
    $('#email-recovery').keyup(function(e) {
        
                if (e.keyCode == 13) {
                    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    var url = $("#url").val();
                    if ($("#email-recovery").val() == "") {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: "Ingresa tu correo electrónico"
                        });
                        $("#email-recovery").focus();
                        return false;
                    } else if (!expr.test($("#email-recovery").val())) {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: "El formato del  correo electrónico es incorrecto"
                        });
                        $("#email-recovery").focus();
                        return false;
                    } else {
                        var route = url + "/store_recovery";
                        var token = $("#token").val();
                        var email = $("#email-recovery").val();
                        var CaptchaCode = $("#CaptchaCode").val();
                        $.ajax({
                            url: route,
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            type: 'POST',
                            dataType: 'json',
                            data: encrypt_data(),
                            success: function(data) {
                                if (data.response == 'success') {
                                    swal({
                                            title: 'Se ha enviado una nueva contraseña a su correo electrónico.',
                                            text: "",
                                            type: "warning",
                                            confirmButtonColor: "#2196f3",
                                            cancelButtonColor: "#2196f3",
                                            cancelButtonText: "Aceptar",
                                            confirmButtonText: "Aceptar",
                                        },
                                        function() {
                                            window.location = url + '/cms';
                                        });
                                }
                               
                                if (data.response == 'error') {
                                    swal({
                                            title: 'Atención',
                                            type: "warning",
                                            text: "El correo electrónico no se encuentra registrado en el sistema",
                                            confirmButtonColor: "#2196f3",
                                            cancelButtonColor: "#2196f3",
                                            cancelButtonText: "Aceptar",
                                            confirmButtonText: "Aceptar"
                                        },
                                        function() {
                                            //location.reload();
                                        });
                                    return false;
                                }
                            },
                            error: function(data) {
                               
                                        //location.reload();
                                  
                            }
                        });
                    }
                }
            });
     
});

function enter_login(e) {
  
            if (e.keyCode == 13) {
                var route = $("#url").val() + "/cms";
                var token = $("#token").val();
                if ($("#email").val() == "") {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "Ingresa tu correo electrónico"
                    });
                    $("#email").focus();
                    return false;
                }
                if ($("#password").val() == "") {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "Ingresa tu contraseña"
                    });
                    $("#password").focus();
                    return false;
                } else {
                    $.ajax({
                        url: route,
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        type: 'POST',
                        dataType: 'json',
                        data: encrypt_data(),
                        success: function(data) {
                            if (data.response == 'true') {
                                var stateObj = {
                                    foo: "dashboard"
                                };
                                history.pushState(stateObj, "Área Administrativa", "dashboard");
                                window.location = $("#url").val() + "/dashboard";
                            }
                            if (data.response == 'false') {
                                swal({
                                        title: 'Atención',
                                        type: "warning",
                                        text: "Los datos ingresados son incorrectos, por favor verificar",
                                        confirmButtonColor: "#2196f3",
                                        cancelButtonColor: "#2196f3",
                                        cancelButtonText: "Aceptar",
                                        confirmButtonText: "Aceptar"
                                    },
                                    function() {
                                        //location.reload();
                                    });
                                return false;
                            }
                           
                        },
                        error: function(data) {
                           
                                    //location.reload();
                              
                        }
                    });
                }
            }
    
}

function enter_recovery(e) {
  
            if (e.keyCode == 13) {
                var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var url = $("#url").val();
                if ($("#email-recovery").val() == "") {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "Ingresa tu correo electrónico"
                    });
                    $("#email-recovery").focus();
                    return false;
                } else if (!expr.test($("#email-recovery").val())) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: "El formato del  correo electrónico es incorrecto"
                    });
                    $("#email-recovery").focus();
                    return false;
                } else {
                    var route = url + "/store_recovery";
                    var token = $("#token").val();
                    var email = $("#email-recovery").val();
                    var CaptchaCode = $("#CaptchaCode").val();
                    $.ajax({
                        url: route,
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        type: 'POST',
                        dataType: 'json',
                        data: encrypt_data(),
                        success: function(data) {
                            if (data.response == 'success') {
                                swal({
                                        title: 'Se ha enviado una nueva contraseña a su correo electrónico.',
                                        text: "",
                                        type: "warning",
                                        confirmButtonColor: "#2196f3",
                                        cancelButtonColor: "#2196f3",
                                        cancelButtonText: "Aceptar",
                                        confirmButtonText: "Aceptar",
                                    },
                                    function() {
                                        window.location = url + '/cms';
                                    });
                            }
                          
                            if (data.response == 'error') {
                                swal({
                                        title: 'Atención',
                                        type: "warning",
                                        text: "El correo electrónico no se encuentra registrado en el sistema",
                                        confirmButtonColor: "#2196f3",
                                        cancelButtonColor: "#2196f3",
                                        cancelButtonText: "Aceptar",
                                        confirmButtonText: "Aceptar"
                                    },
                                    function() {
                                        //location.reload();
                                    });
                                return false;
                            }
                        },
                        error: function(data) {
                          
                                    //location.reload();
                             
                        }
                    });
                }
            }
   
}

function encrypt_data() {
    var iv = CryptoJS.enc.Utf8.parse("abcdef9876543210");
    var key = CryptoJS.enc.Utf8.parse("0123456789abcdef");
    var formserializeArray = $("#form").serializeArray();
    var jsonObj = {};
    jQuery.map(formserializeArray, function(n, i) {
        var encrypted = CryptoJS.AES.encrypt(n.value, key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });
        if (n.name == 'email' || n.name == 'password') {
            jsonObj[n.name] = CryptoJS.enc.Base64.stringify(encrypted.ciphertext);
        } else {
            jsonObj[n.name] = n.value;
        }
    });
    return jsonObj;
}