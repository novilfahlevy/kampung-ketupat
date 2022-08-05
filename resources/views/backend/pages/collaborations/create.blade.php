<x-app-layout>
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Pihak Kerja Sama') }}
	</h2>
</x-slot>

<div class="py-12">
	<x-card>
		<x-button-link href="{{ route('admin.kerjasama.index') }}" icon="fas fa-chevron-left" class="mb-5">
			Kembali
		</x-button-link>

		<form x-data="createCollaboration()" action="{{ route('admin.kerjasama.store') }}" method="POST">
			@csrf
			<div class="grid grid-cols-2 gap-5 mb-5">
				<div>
					<label for="name">Nama</label>
					<x-input type="text" class="block mt-1 w-full" name="name" id="name" value="{{ old('name') }}" required autofocus />
					@error('name')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
				</div>
				<div>
					<label class="block mb-1" for="logo">Logo</label>
					<input type="file" class="filepond" name="logo" id="logo" accept="image/png, image/jpeg" />
					@error('logo_base64')
					<p class="text-red-800">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<x-button type="submit" color="green">Buat Pihak Kerja Sama</x-button>
		</form>
	</x-card>
</div>

<x-slot name="script">
	<script>
		function createCollaboration() {
			return {
				init() {
					initFilepond(document.getElementById('logo'));
				},
			};
		}
	</script>
</x-slot>
</x-app-layout>