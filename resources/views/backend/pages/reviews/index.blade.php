<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ulasan') }}
        </h2>
    </x-slot>

    <x-alert />

    <div class="py-12">
        <x-card>
            <div class="mb-5">
                <form method="GET" action="{{ route('admin.ulasan.index') }}">
                    <x-input type="text" class="w-full block" placeholder="Cari..." name="keyword" value="{{ request()->query->get('keyword') }}" />
                </form>
            </div>

            <div class="relative mb-5">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                No
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
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
                        @foreach ($reviews as $review)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">
                                {{ (($reviews->perPage() * $reviews->currentPage()) - $reviews->perPage()) + ($loop->index + 1) }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $review->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $review->email }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $review->status }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $review->created_at->translatedFormat('d F Y') }}
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
                                        <x-dropdown-link :href="route('admin.ulasan.edit', $review->id)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('admin.ulasan.destroy', $review->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-dropdown-link
                                                :href="route('admin.ulasan.destroy', $review->id)"
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

            {{ $reviews->links() }}
        </x-card>
    </div>
</x-app-layout>