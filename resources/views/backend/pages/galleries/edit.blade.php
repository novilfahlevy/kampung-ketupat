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
	
			<form x-data="updateCollaboration()" action="{{ route('admin.galeri.update', $gallery->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="grid grid-cols-2 gap-5 mb-5">
					<div>
						<label class="block mb-1" for="photo">Foto</label>
						<input
							type="file"
							class="filepond"
							name="photo"
							id="photo"
							accept="image/png, image/jpeg"
						/>
						@error('photo_base64')
						<p class="text-red-800">{{ $message }}</p>
						@enderror
					</div>
					<div>
						<label for="description">Deskripsi</label>
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
	
	<x-slot name="script">
		<script>
			function updateCollaboration() {
				return {
					init() {
						initFilepond(document.getElementById('photo'));
					},
				};
			}
		</script>
	</x-slot>
	</x-app-layout>