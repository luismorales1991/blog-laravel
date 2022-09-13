<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-4xl font-bold mb-4">Etiqueta: {{$tag->name}}</h1>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <x-card-post :post="$post"></x-card-post>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>