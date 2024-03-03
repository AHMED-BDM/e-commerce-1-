<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('admin-assets/css/form.css')}}">
    <link href="{{asset('assets/img/R.gif')}}">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Category</h2>
        <form action="{{route('create-category')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" required class="form-control" id="productName" name="name">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" required name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Image</label>
                <input type="file" required class="form-control" name="imgPath">
            </div>
            <button type="submit" class="btn btn-primary">Insert</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // عند تقديم النموذج
            $('#categoryForm').submit(function() {
                // تعطيل النموذج لمنع إعادة إرساله
                $(this).find(':submit').prop('disabled', true);
            });
        });
    </script>
</body>
</html>
