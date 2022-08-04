@php
  $response = session('response');
  $type = $response ? ($response['status'] == 200 ? 'bg-green-800' : 'bg-red-800') : null;
  $message = $response ? $response['message'] : null;
@endphp

@if($response)
  <div {{ $attributes->merge(['class' => 'px-4 py-5 '.$type]) }}>
    <span class="text-white text-center block">{{ $message }}</span>
  </div>
@endif