<!DOCTYPE html>
<html>
<head>
    <title>Posts with Categories</title>
    <style>
        body { font-family: Arial; margin:0; display:flex; height:100vh; }
        .sidebar { width:220px; background:#2c3e50; color:#fff; padding:20px; }
        .sidebar h2 { margin-top:0; }
        .sidebar a { display:block; color:#fff; text-decoration:none; padding:8px 0; margin-bottom:5px; border-radius:4px; }
        .sidebar a:hover { background:#34495e; }
        .content { flex:1; padding:20px; overflow-y:auto; background:#ecf0f1; }
        .post-card { background:#fff; padding:15px; margin-bottom:15px; border-radius:6px; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
        .post-card h3 { margin-top:0; }
        .category-label { font-style:italic; color:#555; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Categories</h2>
    <a href="{{ url('/posts') }}">All Posts</a>
    @foreach($categories as $category)
        <a href="{{ url('/posts?category=' . $category->id) }}">
            {{ $category->name }}
        </a>
    @endforeach
</div>

<div class="content">
    <h1>Posts</h1>

    @forelse ($posts as $post)
        <div class="post-card">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->text }}</p>
            <p class="category-label">
                Category: {{ $post->category->name ?? 'Uncategorized' }}
            </p>
        </div>
    @empty
        <p>No posts found for this category.</p>
    @endforelse
</div>

</body>
</html>
