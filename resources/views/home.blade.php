@props(['heading' => ''])

<x-layouts.app title="Home">
    <x-section.hero image="/images/sukna.webp">
        <div class="absolute inset-0 backdrop-blur-sm bg-black/30"></div>

        <div class="flex-col relative bg-blend-difference mix-blend-difference flex min-h-screen justify-center w-full">
            <div class="absolute inset-0 bg-black/70"></div>
            <div class="z-10">
                <h4 class="max-w-3xl mx-auto text-center h-fit my-auto text-8xl text-white font-bold">{{$heading}}</h4>
            </div>
        </div>
    </x-section.hero>
</x-layouts.app>
