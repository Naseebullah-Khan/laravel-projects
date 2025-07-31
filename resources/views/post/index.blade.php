<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @foreach ($posts as $post)
        <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a><br />
    @endforeach
</div>
