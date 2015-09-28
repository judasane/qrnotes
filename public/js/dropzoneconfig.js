Dropzone.options.myAwesomeDropzone = {
  paramName: "filefield", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  maxFiles: 21,
  dictDefaultMessage:"Arrastra aquí tus archivos",
  addRemoveLinks:true,
  uploadMultiple:true,
  parallelUploads:21,
  url:"/generar",
  accept: function(file, done) {      
    done();
  },
  init: function() {
    this.on("completemultiple", function(file) {
        alert("Finalizó la subida."); 
    });
  }
};