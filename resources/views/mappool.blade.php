<x-layouts.app title="Map Pool">
    <h3 class="text-9xl text-white p-24 bg-gradient-to-l font-medium from-rose-950 via-black to-rose-950">Map
        Pools
    </h3>

    <div class="container min-h-screen bg-black text-white mx-auto">
        <div class="grid text-center  py-6 mx-auto grid-cols-3">
            <h4>Map ID</h4>
            <h4>Map Name</h4>
            <h4>Map Image</h4>
            @foreach($maps as $map)
                @dump($map)
                <p class="text-2xl mt-6 text-center">{{$map->map_id}}</p>
                <p class="text-2xl mt-6 text-center">{{$map->name}}</p>
                <img src="{{$map->beatmapset_id}}" alt="Map Image" class="w-full mt-6 h-full">
            @endforeach
        </div>
    </div>
</x-layouts.app>


<script>
    function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }
</script>
