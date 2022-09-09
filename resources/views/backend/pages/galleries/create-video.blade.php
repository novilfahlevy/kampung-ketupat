<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeri') }}
        </h2>
    </x-slot>

    <x-alert />
    
    <div class="py-12">
        <x-card>
            <x-button-link href="{{ route('admin.galeri.index') }}" icon="fas fa-chevron-left" class="mb-5">
                Kembali
            </x-button-link>
    
            <form
                x-init
                action="{{ route('admin.galeri.store') }}"
                method="POST"
            >
                @csrf
                <div class="grid grid-cols-1 gap-5 mb-5">
                    <div>
                        <label for="youtube_url">Embed Youtube</label>
                        <x-textarea class="block mb-5 mt-1 w-full" name="youtube_url" id="youtube_url">{{ old('youtube_url') }}</x-textarea>
                        <p class="text-sm">
                            Contoh: {{ '<iframe width="560" height="315" src="https://www.youtube.com/embed/t4ZsfBSLk3A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' }}
                        </p>
                        @error('youtube_url')
                        <p class="text-red-800">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description">Deskripsi</label>
                        <x-textarea class="block mb-5 mt-1 w-full" name="description" id="description">{{ old('description') }}</x-textarea>
                        @error('description')
                        <p class="text-red-800">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <x-button type="submit" color="green">Unggah Video</x-button>
            </form>
        </x-card>
    </div>
    </x-app-layout>