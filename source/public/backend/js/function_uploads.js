$("#toggle-sidebar").click(function() {
    if (document.querySelector("#main-nav.close_icon")) {
        $("#main-nav").removeClass('close_icon');
    } else {
        $("#main-nav").addClass('close_icon');
    }
});
$(window).on('load', function() {
    $("#mask").hide();
});
Dropzone.autoDiscover = false;
$("#dropzone-thumb").dropzone({
    url: $("#url").val() + "/upload-thumb",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image").val();
        image = image + "," + serverFileName.photo;
        $("#image").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image").val(image);
        $(".btn ").removeAttr('disabled');
        var element;
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone").dropzone({
    url: $("#url").val() + "/upload-image",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image").val();
        image = image + "," + serverFileName.photo;
        $("#image").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image").val(image);
        $(".btn ").removeAttr('disabled');
        var element;
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone-1").dropzone({
    url: $("#url").val() + "/upload-image",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image-1").val();
        image = image + "," + serverFileName.photo;
        $("#image-1").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image-1").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image-1").val(image);
        var element;
        $(".btn ").removeAttr('disabled');
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone-2").dropzone({
    url: $("#url").val() + "/upload-image",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image-2").val();
        image = image + "," + serverFileName.photo;
        $("#image-2").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image-2").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image-2").val(image);
        var element;
        $(".btn ").removeAttr('disabled');
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone-3").dropzone({
    url: $("#url").val() + "/upload-image",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image-3").val();
        image = image + "," + serverFileName.photo;
        $("#image-3").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image-3").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image-3").val(image);
        var element;
        $(".btn ").removeAttr('disabled');
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone-4").dropzone({
    url: $("#url").val() + "/upload-image",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image-4").val();
        image = image + "," + serverFileName.photo;
        $("#image-4").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image-4").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image-4").val(image);
        var element;
        $(".btn ").removeAttr('disabled');
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone-5").dropzone({
    url: $("#url").val() + "/upload-image",
    addRemoveLinks: true,
    maxFileSize: 1000000000000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        var image = $("#image-5").val();
        image = image + "," + serverFileName.photo;
        $("#image-5").val(image);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        var image = $("#image-5").val();
        var patron = "," + file.name;
        image = image.replace(patron, '');
        $("#image-5").val(image);
        var element;
        $(".btn ").removeAttr('disabled');
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});
$("#dropzone-doc").dropzone({
    url: $("#url").val() + "/upload-docs",
    addRemoveLinks: true,
    maxFileSize: 345000000000,
    dictResponseError: "Ha ocurrido un error en el servidor",
    acceptedFiles: 'image/*,.jpeg, .mht,.jpg,.xls,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd,.doc,.docx,.xlsx, .rtf, .ppt,.vsd, .pptx, .ai, .psd, .pdf, .mht, .zip',
    maxFiles: 1,
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
    accept: function(file, done) {
        $(".btn ").attr("disabled", true);
        done();
    },
    success: function(response, serverFileName) {
        $("#archive").val(serverFileName.photo);
        $("#file_size").val(serverFileName.file_size);
        $(".btn ").removeAttr('disabled');
    },
    error: function(file) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle'></i> Error ",
            message: "Error subiendo el archivo " + file.name
        });
    },
    removedfile: function(file, serverFileName) {
        $("#archive").val('');
        $("#file_size").val('');
        var element;
        $(".btn ").removeAttr('disabled');
        (element = file.previewElement) != null ?
            element.parentNode.removeChild(file.previewElement) :
            false;
    }
});