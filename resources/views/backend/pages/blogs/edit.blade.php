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

		<form x-data="editBlog()" action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="grid grid-cols-1 gap-5 mb-5">
				<x-image-upload label="Foto sampul" name="thumbnail" imageUrl="{{ asset('storage/uploads/'.$blog->big_thumbnail_url) }}" />
				<div class="grid grid-cols-2 gap-5">
					<div>
						<label for="title">Judul</label>
						<x-input type="text" class="block mt-1 w-full" name="title" id="title" value="{{ old('title', $blog->title) }}" />
						@error('title')
						<p class="text-red-800">{{ $message }}</p>
						@enderror
					</div>
					<div>
						<label for="is_public" class="block mb-1">Publikasi</label>
						<select class="w-full" name="is_public" id="is_public">
							<option value="">Tidak Publik</option>
							<option value="1" {{ $blog->is_public ? 'selected' : '' }}>Publik</option>
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
			<x-button type="submit" color="green">Edit Blog</x-button>
		</form>
	</x-card>
</div>

<x-slot name="beforeScript">
	<script src="{{ asset('storage/vendor/js/ckeditor.js') }}"></script>
</x-slot>

<x-slot name="afterScript">
	<script>
		function editBlog() {
			return {
				init() {
					setTimeout(() => {
						initEditor('contentEditor')
							.then(editor => {
								editor.setData(`{!! $blog->content !!}`);
								document.getElementById('content').value = `{!! $blog->content !!}`;
								
								editor.editing.view.document.on('change', (evt, data) => {
									document.getElementById('content').value = editor.getData();
								});
							})
							.catch(error => console.log(error));
					}, 0);
				},
			};
		}
	</script>
</x-slot>
</x-app-layout>