<x-app-layout> {{-- Traer plantilla principal Navbar--}}

    {{-- Detalle del post --}}
    <div class="container mt-16 py-8">

        {{-- Titulo o nombre del post --}}
        <h1 class="text-4xl font-bold text-gray-600">{{$post->post_name}}</h1>

        {{-- Extracto del post --}}
        <div class="text-lg text-gray-500 mb-2">
            {!!$post->post_extract!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="lg:col-span-2">

                <figure>

                    {{-- Imagen del post --}}
                    @if ($post->imagen)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->imagen->img_url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://images.unsplash.com/photo-1631677210323-066f48f55d53?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="">
                    @endif

                </figure>

                {{-- Cuerpo o parrafo del post --}}
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->post_body !!}
                </div>

            </div>
            {{-- Posts o contenidos relacionados --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{$post->categoria->cat_nombre}}</h1>
                
                <ul>
                    @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('posts.show', $similar)}}">

                            @if ($similar->imagen)
                                <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->imagen->img_url)}}" alt="">
                            @else
                            <img class="w-36 h-20 object-cover object-center" src="https://images.unsplash.com/photo-1631677210323-066f48f55d53?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="">
                            @endif

                            <span class="ml-2 text-gray-600">{{$similar->post_name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>