// import './bootstrap';

import Alpine from 'alpinejs';

import * as Filepond from 'filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileEncode from 'filepond-plugin-file-encode';

import 'filepond/dist/filepond.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

Filepond.registerPlugin(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview,
  FilePondPluginFileEncode,
);

window.initFilepond = function(element, config = {}) {
  const inputHiddenContainer = document.createElement('div');
  inputHiddenContainer.id = `inputHiddenContainer_${element.id}`;
  element.parentElement.appendChild(inputHiddenContainer);

  const createInputHidden = ({ file, index, multiple }) => {
    const inputHidden = document.createElement('input');
    inputHidden.type = 'hidden';
    inputHidden.name = multiple ? `${element.id}_base64[${index}]` : `${element.id}_base64`;
    inputHidden.id = multiple ? `${element.id}_base64_${index}` : `${element.id}_base64`;
    inputHidden.value = file.getFileEncodeDataURL();
    return inputHidden;
  }

  Filepond.create(element, {
    labelIdle: `<span class="filepond--label-action">Letakan gambar disini</span>`,
    onupdatefiles(files) {
      document.getElementById(`inputHiddenContainer_${element.id}`).innerHTML = '';

      if (element.multiple) {
        files.map((file, index) => {
          document.getElementById(`inputHiddenContainer_${element.id}`).appendChild(createInputHidden({ file, index, multiple: true }));
        });
      } else {
        if (files.length) {
          console.log(files[0])
          document.getElementById(`inputHiddenContainer_${element.id}`).appendChild(createInputHidden({ file: files[0], multiple: false }));
        }
      }
    },
    ...config,
  });
};

window.Alpine = Alpine;

Alpine.start();

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