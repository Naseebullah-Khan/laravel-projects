<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @foreach ($posts as $post)
        {{-- @can('update', $post) --}}
        @if (Auth::user()->can('update', $post))
            <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a><br />
        @endif
        {{-- @endcan --}}
    @endforeach
</div>
