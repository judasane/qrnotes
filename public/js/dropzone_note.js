//Archivo de configuración y funcionamiento de dropzone para note
Dropzone.options.myAwesomeDropzone = {
    paramName: "filefield", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    maxFiles: 1,
    dictDefaultMessage: "Toca aquí o arrastra para subir tu archivo",
    uploadMultiple: false,
    accept: function (file, done) {
        done();
    },
    init: function () {
        this.on("successmultiple", function (file, response) {
            //window.location = "http://www.qrnotes.co/generar/impreso/"+response.pack_id;

        });
        this.on("complete", function (file) {
            window.location.reload(true);
        });
    }
};
