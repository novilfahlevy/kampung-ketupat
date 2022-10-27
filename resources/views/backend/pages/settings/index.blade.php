<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Pengaturan') }}
    </h2>
  </x-slot>

  <x-alert />
  
  <div class="py-12">
    <x-card>
      <form action="{{ route('admin.pengaturan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
          <x-image-upload label="Foto halaman utama" name="header_background" imageUrl="{{ asset('storage/uploads/'.$setting['header_background_url']) }}" />
        </div>
        <div class="mb-5">
          <label for="location">Lokasi</label>
          <x-textarea class="block my-1 w-full" name="location" id="location" required>
            {{ $setting['location'] }}
          </x-textarea>
          <p class="text-gray-500">Untuk mengambil URL lokasi, pergi ke Google Maps, lalu cari lokasi dan <i>share</i> lokasi tersebut secara embed, lalu salin url-nya.</p>
          @error('location')
          <p class="text-red-800 mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="about">Tentang Kampung Ketupat</label>
          <x-textarea class="block mt-1 w-full" name="about" id="about" required>
            {{ $setting['about'] }}
          </x-textarea>
          @error('about')
          <p class="text-red-800 mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="address">Alamat Kampung Ketupat</label>
          <x-textarea class="block mt-1 w-full" name="address" id="address" required>
            {{ $setting['address'] }}
          </x-textarea>
          @error('address')
          <p class="text-red-800 mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
          <div class="mb-5">
            <label for="email">Email Kampung Ketupat</label>
            <x-input type="email" class="block mt-1 w-full" name="email" id="email" value="{{ $setting['email'] }}" />
            @error('email')
            <p class="text-red-800 mt-2">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="phone">Nomor Telepon Kampung Ketupat (Whatsapp)</label>
            <x-input type="text" class="block mt-1 w-full" name="phone" id="phone" value="{{ $setting['phone'] }}" />
            @error('phone')
            <p class="text-red-800 mt-2">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
          <div>
            <label for="facebook">Facebook</label>
            <x-input type="text" class="block mt-1 w-full" name="facebook" id="facebook" value="{{ $setting['facebook'] }}" />
            @error('facebook')
            <p class="text-red-800 mt-2">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="instagram">Instagram</label>
            <x-input type="text" class="block mt-1 w-full" name="instagram" id="instagram" value="{{ $setting['instagram'] }}" />
            @error('instagram')
            <p class="text-red-800 mt-2">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="twitter">Twitter</label>
            <x-input type="text" class="block mt-1 w-full" name="twitter" id="twitter" value="{{ $setting['twitter'] }}" />
            @error('twitter')
            <p class="text-red-800 mt-2">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="youtube">Youtube</label>
            <x-input type="text" class="block mt-1 w-full" name="youtube" id="youtube" value="{{ $setting['youtube'] }}" />
            @error('youtube')
            <p class="text-red-800 mt-2">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <x-button type="submit" color="green">Edit Pengaturan</x-button>
      </form>
    </x-card>
  </div>
</x-app-layout>