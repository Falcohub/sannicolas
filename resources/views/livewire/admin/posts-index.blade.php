{{-- Siempre que utilicemos un componenete de livewire debe tener un div padre --}}
<div class="card">

    <div class="card-header">

        {{-- wire model para sincronizar barra de busquedad --}}
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la publicación">
    </div>

    {{-- Condicional de blade para mostrar mensaje que no se encuentra ningun registo en la tabla --}}
    {{-- se utiliza el metodo count, si por lo menos existe un registro mostrar los div siguientes --}}
    @if ($posts->count())
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>    
                </thead>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->post_name}}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('delete')
                            
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tbody>
                    
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro ...</strong>
        </div>
    @endif

</div>
