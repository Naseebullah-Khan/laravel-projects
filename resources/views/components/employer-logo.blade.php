@props(['employer', 'width' => 90])
<img src="{{ asset($employer->logo) }}" alt="company logo" class="rounded-xl" width="{{ $width }}">
