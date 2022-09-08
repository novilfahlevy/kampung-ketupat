<x-app-layout>
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Blog') }}
	</h2>
</x-slot>

<x-alert />

<div class="py-12">
	<x-card>
		<x-button-link href="{{ route('admin.blog.index') }}" icon="fas fa-chevron-left" class="mb-5">
			Kembali
		</x-button-link>

		<form x-data="createBlog()" action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="grid grid-cols-1 gap-5 mb-5">
				<x-image-upload label="Foto sampul" name="thumbnail" />
				<div class="grid grid-cols-2 gap-5">
					<div>
						<label for="title">Judul</label>
						<x-input type="text" class="block mt-1 w-full" name="title" id="title" value="{{ old('title') }}" />
						@error('title')
						<p class="text-red-800">{{ $message }}</p>
						@enderror
					</div>
					<div>
						<label for="is_public" class="block mb-1">Publikasi</label>
						<select class="w-full" name="is_public" id="is_public">
							<option value="">Tidak Publik</option>
							<option value="1" selected>Publik</option>
						</select>
					</div>
				</div>
				<div class="flex flex-col mb-5">
					<label for="content" class="mb-2">Konten</label>
					<input type="hidden" name="content" id="content">
					<div id="contentEditor"></div>
					@error('content')
					<p class="text-red-800 mt-2">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<x-button type="submit" color="green">Buat Blog</x-button>
		</form>
	</x-card>
</div>

<x-slot name="script">
	@include('components.editor')
	<script>
		function createBlog() {
			return {
				init() {
					// initFilepond(document.getElementById('thumbnail'));
					// initFilepond(document.getElementById('photos'));

					initEditor('contentEditor')
						.then(editor => {
							editor.editing.view.document.on('change', (evt, data) => {
								document.getElementById('content').value = editor.getData();
							});
						})
						.catch(error => console.log(error));
				},
			};
		}
	</script>
</x-slot>
</x-app-layout>