<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Product Page </title>
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
                            <h2> Edit Product</h2>
                        </div>
                        <div>
                            <a href="{{ route('all.products') }} " class=" btn btn-primary">All Products </a>
                        </div>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Succeess Message Show after Edit or Update data --}}

                        @if (Session()->has('successMsg'))
                            <p class=" alert alert-success">{{ Session::get('successMsg') }}</p>
                        @endif


                        <form action="{{ route('update.product',$product->id ) }} " method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="my-2">
                                <label for="name" class="my-2 form-group">Product Name: </label>
                                <input type="text" class=" form-control" value="{{ $product->name }}" name="name"
                                    placeholder="Product-Name">
                            </div>

                            <div class="my-2">
                                <label for="image" class="my-2 form-group">Product Image: </label>

                                <img class="my-3" style=" width:150px"
                                    src="{{ asset('images/products/' . $product->image) }}">
                                <input type="file" class="form-control" name="image" placeholder="Product-Image">

                            </div>
                            <button type="submit" class=" bt btn-success my-3 form-control">Update Product</button>

                        </form>

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
