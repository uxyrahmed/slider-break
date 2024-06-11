@props(['image' => ''])


<!-- Hero -->
<div class="relative overflow-hidden">
    <!-- Image -->
    @isset($image)
    <img class="absolute inset-0 w-full h-full object-cover" src="{{ $image }}" alt="">
    @endisset
    <!-- End Image -->

    <!-- Overlay -->
    <div class="z-10">
        {{ $slot }}
    </div>
    <!-- End Overlay -->
</div>
<!-- End Hero -->
