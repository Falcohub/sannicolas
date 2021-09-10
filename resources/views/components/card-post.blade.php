{{-- Componente card para reutilizar en otras vistas --}}
@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->imagen->img_url)}}" alt="">

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show', $post)}}">{{$post->post_name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {{$post->post_extract}}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($post->etiquetas as $etiqueta)
            <a href="{{route('posts.etiqueta', $etiqueta)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$etiqueta->etq_name}}</a>
        @endforeach
    </div>
</article>