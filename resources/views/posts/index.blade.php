<x-app-layout>

        {{-- Posts --}}
        <div class="container bg-white py-8 mt-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($posts as $post)
                    {{-- Imagenes de los posts --}}
                    <article class="w-full h-80 bg-cover bg-center shadow-md @if ($loop->first) md:col-span-2 @endif" style="background-image: url(@if ($post->imagen){{ Storage::url($post->imagen->img_url) }} @else https://images.unsplash.com/photo-1631677210323-066f48f55d53?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80 @endif)">
                        <div class="w-full h-full px-8 flex flex-col justify-center">

                            <div>
                                @foreach ($post->etiquetas as $etiqueta)
                                    <a href="{{ route('posts.etiqueta', $etiqueta) }}"
                                        class="inline-block px-3 h-6 bg-{{ $etiqueta->etq_color }}-600 text-white rounded-full">{{ $etiqueta->etq_name }}</a>
                                @endforeach
                            </div>
                            <div class="bg-black bg-opacity-50 rounded-xl">

                                <h1 class="text-4xl text-white leading-8 font-bold mt-2">

                                    {{-- Redigir al post --}}
                                    <a href="{{ route('posts.show', $post) }}">
                                        {{-- Mostrar post --}}
                                        {{ $post->post_name }}
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>

        </div>

</x-app-layout>