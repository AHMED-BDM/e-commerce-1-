<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Edit Form</title>
    <!-- تضمين مكتبة Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Xkd4/uEtj+nK6dEB6wCZJG5SDEb0FuiWNnM/3Q2YLeq55a6LbBuFvhMzX81wzjv/EDq4qxdC/iaDAIoy5cRwWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- تضمين مكتبة Bootstrap للتصميم -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- تنسق form-->
    <link rel="stylesheet" href="{{asset('admin-assets/css/form.css')}}">

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Category</h2>
        <form id="categoryForm" action="{{ route('update_archived_prod', $result->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="productName" name="name" value="{{ $result->name }}"
                    required>
                    <span class="required-message"></span>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3" required>{{ $result->description }}</textarea>
                <span class="required-message"></span>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="productPrice" name="price" rows="3" required
                    value="{{ $result->price }}" step="any">
                <span class="required-message"></span>
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="quantity" rows="3"
                    value="{{ $result->quantity }}" step="any">
            </div>
            <div class="mb-3">
                <label for="productShipping" class="form-label">Shipping</label>
                <input type="number" class="form-control" id="productShipping" name="shipping" rows="3"
                    value="{{ $result->shipping }}" step="any">
            </div>
            <label for="productCategory_id" class="form-label">Category</label>
            <select class="form-control" name="category_id">
                <option class="col-opt1" value="">--Select Category--</option>
                @foreach ($categories_result as $category)
                    <option class="col-opt2" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="productImage" class="form-label">Image</label>
                <input type="file" value="{{ $result->imgPath }}" class="form-control" id="productImage" name="imgPath"
                    required><br>
                    <span class="required-message"></span>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Category Image</label>
                    <div class="product-image">
                        <img src="{{ asset($result->imgPath) }}" alt="Product Image">
                        <!-- إضافة أيقونة السهم -->
                        <i class="fas fa-arrow-right arrow-icon"></i>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- تضمين مكتبة jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // عند تقديم النموذج
            $('#categoryForm').submit(function() {
                // تعطيل النموذج لمنع إعادة إرساله
                $(this).find(':submit').prop('disabled', true);
            });
        });


    $(document).ready(function() {
        // عند تغيير الملف
        $('#productImage').change(function(event) {
            var input = event.target;
            var reader = new FileReader();
            // عند استكمال تحميل الملف
            reader.onload = function() {
                var dataURL = reader.result;
                // عرض الصورة في عنصر الصورة
                $('.product-image img').attr('src', dataURL);
            };
            // قراءة الملف كنص ثنائي
            reader.readAsDataURL(input.files[0]);
        });
    });
</script>
</body>

</html>
