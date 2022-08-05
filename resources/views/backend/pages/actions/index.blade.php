<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Aktifitas Pengguna') }}
      </h2>
  </x-slot>

  <x-alert />

  <div class="py-12">
      <x-card>
        <div class="mb-5">
			<form method="GET" action="{{ route('admin.aktifitas') }}">
				<x-input type="text" class="w-full block" placeholder="Cari..." name="keyword" value="{{ request()->query->get('keyword') }}" />
			</form>
        </div>
          
          <div class="relative mb-5">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="py-3 px-6">
                              No
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Nama Pengguna
                          </th>
						  <th scope="col" class="py-3 px-6">
							  Aksi
						  </th>
                          <th scope="col" class="py-3 px-6">
                              Tanggal
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($actions as $action)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                          <td class="py-4 px-6">
                              {{ (($actions->perPage() * $actions->currentPage()) - $actions->perPage()) + ($loop->index + 1) }}
                          </td>
                          <td class="py-4 px-6">
                              {{ $action->username }}
                          </td>
                          <td class="py-4 px-6">
                              {{ $action->action }}
                          </td>
                          <td class="py-4 px-6">
                              {{ $action->created_at->translatedFormat('d F Y') }}
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          {{ $actions->links() }}
      </x-card>
  </div>
</x-app-layout>