<x-app-layout>
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Frequently Asked Question (FAQ)') }}
	</h2>
</x-slot>

<div class="py-12">
	<x-card>
		<x-button-link href="{{ route('admin.faq.index') }}" icon="fas fa-chevron-left" class="mb-5">
			Kembali
		</x-button-link>

		<form action="{{ route('admin.faq.store') }}" method="POST">
			@csrf
			<div class="grid grid-cols-2 gap-5 mb-5">
				<div>
					<label for="question">Pertanyaan</label>
					<x-textarea class="block mt-1 w-full" name="question" id="question" required autofocus>
						{{ old('question') }}
					</x-textarea>
					@error('question')
					<p class="text-red-800 mt-2">{{ $message }}</p>
					@enderror
				</div>
				<div>
					<label for="answer">Jawaban</label>
					<x-textarea class="block mt-1 w-full" name="answer" id="answer" required autofocus>
						{{ old('answer') }}
					</x-textarea>
					@error('answer')
					<p class="text-red-800 mt-2">{{ $message }}</p>
					@enderror
				</div>
			</div>
			<x-button type="submit" color="green">Buat Pertanyaan</x-button>
		</form>
	</x-card>
</div>
</x-app-layout>