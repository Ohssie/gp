//var myDropzone = new Dropzone("#my-dropzone");

Dropzone.options.myDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  maxFiles: 5,
  uploadMultiple: true,
  thumbnailWidth: null,
  thumbnailHeight: null,
  acceptedFiles: 'image/*',
  init: function() {
    /* global files */
    /* global Dropzone */
    /* global $ */
    console.log(this);
    var myDropzone = this;
    if(files) {
      for(var i = 0; i < files.length; i++) {
        var mockFile = {
          status: Dropzone.ADDED,
          url: files[i].upload_url,
          name: files[i].filename,
          size: 12345,
        };
        myDropzone.emit("addedfile", mockFile);
        myDropzone.emit("thumbnail", mockFile, files[i].upload_url);
        myDropzone.emit("complete", mockFile);
        myDropzone.files.push(mockFile);
        console.log(files[i]);
      }
      
      var existingFileCount = files.length; // The number of files already uploaded
      
      console.log(existingFileCount);
      myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }
    
    myDropzone.on("removedfile", function (file) {
      // Only files that have been programmatically added should
      // have a url property.
      if (file.url && file.url.trim().length > 0) {
          $("<input type='hidden'>").attr({
              id: 'DeletedImageUrls',
              name: 'DeletedImageUrls'
          }).val(file.url).appendTo('#my-dropzone');
      }
    });
    
    myDropzone.on("error", function(file, message) {
      $.gritter.add({
          // (string | mandatory) the heading of the notification
          title: 'Error!',
          // (string | mandatory) the text inside the notification
          text: message,
          sticky: false,
          
      });
    });
    
    myDropzone.on("thumbnail", function(file, dataUrl) {
        $('.dz-image').last().find('img').attr({width: '100%', height: '100%'});
    });
  }
};

