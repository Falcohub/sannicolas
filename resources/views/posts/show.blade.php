<x-app-layout> {{-- Traer plantilla principal Navbar--}}

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->post_name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$post->post_extract}}
        </div>

        <div class="grid grid-cols-3">
            {{-- Contenido principal --}}
            <div class="col-span-2">

                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->imagen->img_url)}}" alt="">
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{$post->post_body}}
                </div>

            </div>
            {{-- Contenido relacionado --}}
            <aside>
                <h1>Mas en {{$post->categorias}}</h1>
            </aside>

        </div>

    </div>

</x-app-layout>