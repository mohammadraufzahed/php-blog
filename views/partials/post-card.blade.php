<div class="posts bg-dark text-white text-center h-auto mb-3">
    <img class="img-fluid post-image" src="/static/img/post.jpg" alt="Post image">
    <h3 class="post-title pt-3">{{ $post->title }}</h3>
    <p class="pt-3 pb-3 post-text text-start m-auto">
        {{ $post->body }}
        <a class="link-primary text-end" href="/post/{{ $post->id }}">Read more</a>
    </p>
</div>

