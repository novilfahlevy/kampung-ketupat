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
  const inputHidden = document.createElement('input');
  inputHidden.type = 'hidden';
  inputHidden.name = `${element.id}_base64`;
  inputHidden.id = `${element.id}_base64`;

  element.parentElement.appendChild(inputHidden);

  Filepond.create(element, {
    labelIdle: `<span class="filepond--label-action">Letakan gambar disini</span>`,
    onaddfile(_, file) {
      document.getElementById(`${element.id}_base64`).value = file.getFileEncodeDataURL();
    },
    onremovefile() {
      document.getElementById(`${element.id}_base64`).value = '';
    },
    ...config,
  });
};

window.Alpine = Alpine;

Alpine.start();
