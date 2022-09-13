<div class='card'>
    <div class="card-header">
        <input wire:model="search" type="text" placeholder="Ingrese el nombre de un post" class="form-control">
    </div>
    
    @if(count($posts))
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td width="10px">
                                <a class='btn btn-primary btn-sm' href="{{route('admin.posts.edit', $post)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro ...</strong>
        </div>
    @endif
</div>
