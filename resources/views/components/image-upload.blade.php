@props([
    'label' => '',
    'name' => '',
    'height' => '300px',
    'width' => '500px',
    'imageUrl' => '',
])

<div x-data="uploadImage()">
    <p class="mb-2">{{ $label }}</p>
    <label
      class="border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 cursor-pointer flex items-center justify-center"
      id="imageContainer"
    >
      <input type="file" name="{{ $name }}" class="hidden" @change="generateImageBase64">
      <img x-show="isThereAnImage()" :src="isThereAnImage()" class="w-full h-full !rounded-sm p-1" alt="{{ $name }}">
      <span x-show="!isThereAnImage()">Taruh foto disini</span>
    </label>
    <p class="text-red-800 mt-2" x-show="imageErrorMessage" x-text="imageErrorMessage"></p>
    @error($name)
    <p class="text-red-800 mt-2">{{ $message }}</p>
    @enderror
</div>

<style>
    @media (max-width: 576px) {
        #imageContainer {
            width: 100% !important;
        }
    }

    #imageContainer {
        width: {{ $width }};
        height: {{ $height }};
    }
</style>

<script>
    function uploadImage() {
        return {
            imageBase64: null,
            imageUrl: '{{ $imageUrl }}',
            imageErrorMessage: '',
            isThereAnImage() {
                return this.imageBase64 || this.imageUrl;
            },
            generateImageBase64(event) {
                const file = event.target.files
                this.imageErrorMessage = '';
                if (file.length) {
                const reader = new FileReader();
                reader.readAsDataURL(file[0]);
                reader.onload = () => {
                    if (checkFiletype(file[0].name)) {
                    this.imageBase64 = reader.result;
                    } else {
                    this.imageErrorMessage = `Masukkan gambar atau foto`;
                    }
                };

                reader.onerror = function (error) {
                    console.log('Error: ', error);
                };
                }
            },
        }
    }
</script>