<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  
    <x-alert />
  
    <div class="py-12">
        <x-card>
          <div class="relative overflow-x-scroll mb-5">
                <table class="min-w-max text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6 w-[200px] lg:w-[400px]">
                                No
                            </th>
                            <th scope="col" class="py-3 px-6 w-[200px] lg:w-[400px]">
                                IP
                            </th>
                            <th scope="col" class="py-3 px-6 w-[200px] lg:w-[400px]">
                                Tanggal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $visitor)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">
                                {{ (($visitors->perPage() * $visitors->currentPage()) - $visitors->perPage()) + ($loop->index + 1) }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $visitor->ip }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $visitor->created_at->translatedFormat('d F Y H:m') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
  
            {{ $visitors->links() }}
        </x-card>
    </div>
  </x-app-layout>