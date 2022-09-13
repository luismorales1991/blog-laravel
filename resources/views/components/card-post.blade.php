@props(['post'])
<article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-80 object-cover object-center" src="{{$post->image->url}}">
    @else
        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/08/21/17/47/color-7401750_960_720.jpg">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>

    <div class="px-6 pt-4" style="padding-bottom: 1rem">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray mr-2">{{$tag->name}}</a>
        @endforeach
    </div>
</article>