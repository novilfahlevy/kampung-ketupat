<x-app-layout>
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Galeri') }}
	</h2>
</x-slot>

<div class="py-12">
	<x-card>
		<x-button-link href="{{ route('admin.galeri.index') }}" icon="fas fa-chevron-left" class="mb-5">
			Kembali
		</x-button-link>

		<form
			x-init
			action="{{ route('admin.galeri.store') }}"
			method="POST"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="grid grid-cols-1 gap-5 mb-5">
				<x-images-upload label="Foto" name="photos" />
				<div>
					<label for="description">Deskripsi (opsional)</label>
					<x-textarea class="block mt-1 w-full" name="description" id="description">{{ old('description') }}</x-textarea>
					@error('description')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<x-button type="submit" color="green">Unggah Foto</x-button>
		</form>
	</x-card>
</div>
</x-app-layout>