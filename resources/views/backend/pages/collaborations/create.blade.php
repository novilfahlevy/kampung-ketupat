<x-app-layout>
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Dukungan') }}
	</h2>
</x-slot>

<x-alert />

<div class="py-12">
	<x-card>
		<x-button-link href="{{ route('admin.kerjasama.index') }}" icon="fas fa-chevron-left" class="mb-5">
			Kembali
		</x-button-link>

		<form x-data="createCollaboration()" action="{{ route('admin.kerjasama.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="grid grid-cols-1 gap-5 mb-5">
				<div>
					<label for="name">Nama</label>
					<x-input type="text" class="block mt-1 w-full" name="name" id="name" value="{{ old('name') }}" required autofocus />
					@error('name')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
				</div>
				<x-image-upload label="Logo" name="logo" width="200px" height="200px" />
			</div>
			<x-button type="submit" color="green">Buat Pihak Dukungan</x-button>
		</form>
	</x-card>
</div>

<x-slot name="script">
	<script>
		function createCollaboration() {
			return {
				init() {
					// initFilepond(document.getElementById('logo'));
				},
			};
		}
	</script>
</x-slot>
</x-app-layout>