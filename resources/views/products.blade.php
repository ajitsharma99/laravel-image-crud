<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>all products page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <!-- On tables -->

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h-100 d-flex justify-content-between align-items-center">
                        <div>
                            <h2>Laravel 9 Image Crud </h2>
                        </div>
                        <div>
                            <a href="{{ route('add.product') }}" class=" btn btn-dark"> add new products </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Products Image </th>
                                <th>Product Name </th>
                                <th>Action </th>
                            </thead>

                            <tbody>
                                {{-- Succeess Message Show after Edit or Update data --}}

                                @if (Session()->has('successMsg'))
                                    <p class=" alert alert-success">{{ Session::get('successMsg') }}</p>
                                @endif

                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>
                                            <img style="width: 150px"
                                                src="{{ asset('images/products/' . $product->image) }}">
                                        </td>
                                        <td> {{ $product->name }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('edit.product', $product->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('delete.product', $product->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this item')">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jquery Cdn link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
