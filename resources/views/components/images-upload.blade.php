@props([
    'label' => '',
    'name' => '',
    'height' => '300px',
    'width' => '500px',
    'imageUrls' => [],
])

<div x-data="uploadImages()">
    <p class="mb-2">{{ $label }}</p>
    <label
      class="border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 cursor-pointer overflow-y-scroll flex flex-wrap items-start justify-start gap-2 p-2"
      style="{{ 'width:'.$width.';height:'.$height.';' }}"
    >
      <input type="file" name="{{ $name }}[]" class="hidden" multiple @change="generateImagesBase64">
      <template x-for="(image, index) in (imageBase64.length ? imageBase64 : imageUrls)" :key="index">
        <img :src="image" class="w-[100px] h-[100px] !rounded-sm" alt="images">
      </template>
      <span x-show="!areThereSomeFiles()">Taruh foto disini</span>
    </label>
    <p class="text-red-800 mt-2" x-show="imageErrorMessage" x-text="imageErrorMessage"></p>
    @error($name)
    <p class="text-red-800 mt-2">{{ $message }}</p>
    @enderror
</div>

<script>
    function uploadImages() {
        return {
            imageBase64: [],
            imageUrls: @json($imageUrls),
            imageErrorMessage: '',
            areThereSomeFiles() {
                return this.imageBase64.length || this.imageUrls.length;
            },
            generateImagesBase64(event) {
                this.imageBase64 = [];
                this.imageErrorMessage = '';
                const files = Array.from(event.target.files)
                if (files.length) {
                    if (checkFiletype(files.map(file => file.name))) {
                        files.forEach(file => {
                            const reader = new FileReader();
                            reader.readAsDataURL(file);
                            reader.onload = () => {
                                this.imageBase64.push(reader.result);
                            };
                            reader.onerror = function (error) {
                                console.log('Error: ', error);
                            };
                        });
                    } else {
                        event.target.value = null;
                        this.imageErrorMessage = 'Masukkan gambar atau foto.';
                    }
                }
            },
        }
    }
</script>