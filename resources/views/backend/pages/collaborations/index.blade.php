<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kerjasama') }}
        </h2>
    </x-slot>

    <x-alert />

    <div class="py-12">
        <x-card>
            <x-button-link href="{{ route('admin.kerjasama.create') }}" icon="fas fa-plus" class="mb-5">
                Tambah Pihak Kerjasama
            </x-button-link>
            
            <div class="relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                No
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Logo
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Tanggal Dibuat
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collaborations as $collaboration)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6">
                                {{ (($collaborations->perPage() * $collaborations->currentPage()) - $collaborations->perPage()) + ($loop->index + 1) }}
                            </td>
                            <td class="py-4 px-6">
                                <img src="{{ $collaboration->logo }}" alt="Logo">
                            </td>
                            <td class="py-4 px-6">
                                {{ $collaboration->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $collaboration->created_at->translatedFormat('d F Y') }}
                            </td>
                            <td class="py-4 px-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('admin.kerjasama.edit', $collaboration->id)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('admin.kerjasama.destroy', $collaboration->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-dropdown-link
                                                :href="route('admin.kerjasama.destroy', $collaboration->id)"
                                                onclick="event.preventDefault();
                                                confirm('Apakah anda yakin ingin menghapus data ini?') &&
                                                this.closest('form').submit();"
                                            >
                                                {{ __('Hapus') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $collaborations->links() }}
        </x-card>
    </div>
</x-app-layout>