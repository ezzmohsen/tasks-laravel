<!-- resources/views/blogs/edit.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Edit Blog Post</title>
</head>

<body>
    <h1>Edit Blog Post</h1>
    <form action="{{ url('/blogs', ['id' => $blog->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $blog->title }}">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content">{{ $blog->content }}</textarea>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>