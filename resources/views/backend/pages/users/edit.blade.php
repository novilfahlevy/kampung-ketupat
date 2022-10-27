<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Pengguna') }}
		</h2>
	</x-slot>

	<x-alert />

	<div class="py-12">
		<x-card>
			<x-button-link href="{{ route('admin.pengguna.index') }}" icon="fas fa-chevron-left" class="mb-5">
				Kembali
			</x-button-link>

			<form action="{{ route('admin.pengguna.update', $user->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="grid lg:grid-cols-2 gap-5 mb-5">
					<div>
						<label for="email">Email</label>
						<x-input type="email" class="block mt-1 w-full" name="email" id="email" :value="old('email', $user->email)" required autofocus />
						@error('email')
						<p class="text-red-800 mt-2">{{ $message }}</p>
						@enderror
					</div>
					<div>
						<label for="name">Nama</label>
						<x-input type="text" class="block mt-1 w-full" name="name" id="name" :value="old('name', $user->name)" required />
						@error('name')
						<p class="text-red-800 mt-2">{{ $message }}</p>
						@enderror
					</div>
					<div>
						<label for="password">Password</label>
						<x-input type="password" class="block mt-1 w-full" name="password" id="password" :value="old('password')" />
						@error('password')
						<p class="text-red-800 mt-2">{{ $message }}</p>
						@enderror
					</div>
					<div>
						<label for="password_confirmation">Konfirmasi password</label>
						<x-input type="password" class="block mt-1 w-full" name="password_confirmation" id="password_confirmation" :value="old('password_confirmation')" />
						@error('password_confirmation')
						<p class="text-red-800 mt-2">{{ $message }}</p>
						@enderror
					</div>
				</div>
				<x-button type="submit" color="green">Edit Profil</x-button>
			</form>
		</x-card>
	</div>
</x-app-layout>