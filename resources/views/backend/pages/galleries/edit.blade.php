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
			action="{{ route('admin.galeri.update', $gallery->id) }}"
			method="POST"
			enctype="multipart/form-data"
		>
			@csrf
			@method('PUT')
			<div class="grid grid-cols-1 gap-5 mb-5">
				<x-image-upload label="Foto" name="photo" width="200px" height="200px" imageUrl="{{ asset('storage/uploads/'.$gallery->photo_url) }}" />
				<div>
					<label for="description">Deskripsi (opsional)</label>
					<x-textarea class="block mt-1 w-full" name="description" id="description">{{ old('description', $gallery->description) }}</x-textarea>
					@error('description')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<x-button type="submit" color="green">Edit</x-button>
		</form>
	</x-card>
</div>
</x-app-layout>