<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Ulasan') }}
		</h2>
	</x-slot>

	<x-alert />

	<div class="py-12">
		<x-card>
			<x-button-link href="{{ route('admin.ulasan.index') }}" icon="fas fa-chevron-left" class="mb-5">
				Kembali
			</x-button-link>

			<form action="{{ route('admin.ulasan.update', $review->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="grid grid-cols-2 gap-5 mb-5">
					<div>
						<label for="name">Nama</label>
						<x-input type="text" class="block mt-1 w-full" :value="$review->name" disabled />
					</div>
					<div>
						<label for="email">Email</label>
						<x-input type="email" class="block mt-1 w-full" :value="$review->email" disabled />
					</div>
					<div>
						<label for="review">Ulasan</label>
						<x-textarea class="block mt-1 w-full" disabled>{{ $review->review }}</x-textarea>
					</div>
					<div>
						<label for="stars">Nilai</label>
						<x-input type="number" class="block mt-1 mb-3 w-full" :value="$review->stars" disabled />
						<div>
							<label for="is_public" class="block mb-2">Publikasi</label>
							<select class="w-full" name="is_public" id="is_public">
								<option value="">Tidak publik</option>
								<option value="1" {{ $review->is_public ? 'selected' : '' }}>Publik</option>
							</select>
						</div>
					</div>
				</div>
				<x-button type="submit" color="green">Edit Ulasan</x-button>
			</form>
		</x-card>
	</div>
</x-app-layout>