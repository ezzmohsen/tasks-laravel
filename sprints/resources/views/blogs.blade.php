<!DOCTYPE html>
<html>

<head>
    <title>Blog Posts</title>
</head>

<body>
    <h1>Blog Posts</h1>
    <ul>
        @foreach($blogs as $blog)
            <li>
                <h2>{{ $blog->title }}</h2>
                <p>{{ $blog->content }}</p>
                <a href="{{ url('/blogs', ['id' => $blog->id, 'edit']) }}">Edit</a>
            </li>
        @endforeach
    </ul>
</body>

</html>