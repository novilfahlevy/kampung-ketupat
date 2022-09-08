// import './bootstrap';
import Alpine from 'alpinejs';

// Alpine Initialization

window.Alpine = Alpine;
Alpine.start();

// End of Alpine Initialization



// Filetype Checking

window.IMAGE_FILETYPES = ['.jpg', '.jpeg', '.png', '.bmp'];
window.checkFiletype = function(fakeFilename, extensions = IMAGE_FILETYPES) {
  const checkExtensionValid = filename => {
    return extensions.some( 
      extension => extension.toLowerCase() == filename.substr(filename.length - extension.length, extension.length).toLowerCase()
    );
  }

  if (typeof fakeFilename == 'string') {
    return checkExtensionValid(fakeFilename);
  }

  return fakeFilename.every(filename => checkExtensionValid(filename));
}

// End of Filetype Checking



// CKEDITOR

window.initEditor = function(editorId) {
  // This ClassicEditor class is gotten from storage/vendor/js/ckeditor.js
  return ClassicEditor.create(document.getElementById(editorId), {
    simpleUpload: {
      uploadUrl: document.querySelector('meta[name=ckeditor-image-upload-url]').content,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
      }
    },
  });
}

// End of CKEDITOR