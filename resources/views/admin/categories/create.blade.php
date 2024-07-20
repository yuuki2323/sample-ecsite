<!DOCTYPE html>
<html>
<head>
    <title>Add New Category</title>
</head>
<body>
    <h1>Add New Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <button type="submit">Add Category</button>
        </div>
    </form>
</body>
</html>
