Dropzone.options.myAwesomeDropzone = {
    paramName: "filefield", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    maxFiles: 22,
    dictDefaultMessage: "Arrastra aquí tus archivos",
    addRemoveLinks: true,
    uploadMultiple: true,
    parallelUploads: 22,
    url: "/generar",
    accept: function (file, done) {
        done();
    },
    init: function () {
        this.on("successmultiple", function (file, response) {
            //window.location = "http://www.qrnotes.co/generar/impreso/"+response.pack_id;
            
        });
        this.on("completemultiple", function (file) {
//        window.location = "http://www.qrnotes.co/generar/impreso";
        });
    }
};
