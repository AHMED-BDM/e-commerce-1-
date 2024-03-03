@if (session('success'))
    @extends('admin.layouts.flout-window')
    @section('message')
        {{ session('success') }}
    @endsection
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Archived Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/archive.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
</head>

<body>
    <a href="{{ route('back') }}"><i class="fa-solid fa-backward" <i class="fa-solid fa-backward"
            style="color: #102798;">Back</i></a>
    <a class="dashboard" href="{{ route('admin') }}">
        Admin Dashboard
    </a>

    <div class="container mx-auto mt-4">
        <div class="row row-cols-4">
            @if ($result->isNotEmpty())

                @foreach ($result as $item)
                    <div class="col-md-4"> <!-- 12 ÷ 4 = 3 -->
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('show_prod', $item->id) }}">
                                <img src="{{ url($item->imgPath) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h7 class="card-subtitle mb-2">{{ $item->description }}</h7><br><br>
                                <form id="forceDeleteForm" action="" method="post">
                                    @csrf
                                    <a href="{{ route('edit-soft-category', $item->id) }}" class="btn mr-2"><i
                                            class="fas fa-link"></i> Edit</a>
                                    <a href="{{ route('restor_category', $item->id) }}" class="btn "><i
                                            class="fab fa-github"></i> Restore</a>
                                    <button class="btn-force-delete" type="button"
                                        onclick="confirmDelete({{ $item->id }})">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        function confirmDelete(itemId) {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('confirmation-box').style.display = 'block';
        }

        function cancelDelete() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('confirmation-box').style.display = 'none';
        }
    </script>
    <div class="overlay" id="overlay" style="display: none;"></div>
    <div class="confirmation-box" id="confirmation-box" style="display: none;">
        <p class="p-m">Are you sure you want to delete this category?</p>
        <span class="p-s">If You Delete This Category, You Cannot Restore It Again</span><br><br>
        <button class="B1" onclick="cancelDelete()">Cancel</button><br><br>
        <form id="deleteForm" action="{{ route('forceDelete_category', $item->id) }}" method="post">
            @csrf
            <button class="B2" type="submit">Delete</button>
        </form>
    </div>
@else
    <div class="cont">
        <div class="p-m">
            <h1>No Categories Archived Yet !</h1>
        </div>
    </div>
    @endif
</body>

</html>
