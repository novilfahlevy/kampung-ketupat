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

		<form x-data="createCollaboration()" action="{{ route('admin.galeri.store') }}" method="POST">
			@csrf
			<div class="grid grid-cols-1 gap-5 mb-5">
				<div>
					<label class="block mb-1" for="photos">Foto</label>
					<input
						type="file"
						class="filepond"
						name="photos"
						id="photos"
						accept="image/png, image/jpeg"
						multiple
					/>
					@error('photos_base64')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
					@error('photos_base64.*')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
				</div>
				<div>
					<label for="description">Deskripsi</label>
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

<x-slot name="script">
	<script>
		function createCollaboration() {
			return {
				init() {
					initFilepond(document.getElementById('photos'));
				},
			};
		}
	</script>
</x-slot>
</x-app-layout>