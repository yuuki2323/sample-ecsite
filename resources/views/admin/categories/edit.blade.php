<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $category->name }}" required>
        </div>
        <div>
            <button type="submit">Update Category</button>
        </div>
    </form>
</body>
</html>
