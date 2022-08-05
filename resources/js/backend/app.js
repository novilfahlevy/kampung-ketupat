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
  inputHiddenContainer.id = 'inputHiddenContainer';
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
      document.getElementById('inputHiddenContainer').innerHTML = '';

      if (element.multiple) {
        files.map((file, index) => {
          document.getElementById('inputHiddenContainer').appendChild(createInputHidden({ file, index, multiple: true }));
        });
      } else {
        if (files.length) {
          console.log(files[0])
          document.getElementById('inputHiddenContainer').appendChild(createInputHidden({ file: files[0], multiple: false }));
        }
      }
    },
    ...config,
  });
};

window.Alpine = Alpine;

Alpine.start();
