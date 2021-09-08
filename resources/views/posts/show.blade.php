<x-app-layout> {{-- Traer plantilla principal Navbar--}}

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->post_name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$post->post_extract}}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="lg:col-span-2">

                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->imagen->img_url)}}" alt="">
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{$post->post_body}}
                </div>

            </div>
            {{-- Posts o contenidos relacionados --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{$post->categoria->cat_nombre}}</h1>
                
                <ul>
                    @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('posts.show', $similar)}}">
                            <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->imagen->img_url)}}" alt="">
                            <span class="ml-2 text-gray-600">{{$similar->post_name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>