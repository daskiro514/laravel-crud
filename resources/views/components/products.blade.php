@extends('dashboard')

@section('content')
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Create a Product</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.create') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="productName">Product Name:</label>
                            <input type="text" placeholder="Product Name" id="productName" class="form-control"
                                name="productName" required autofocus>
                            @if ($errors->has('productName'))
                                <span class="text-danger">{{ $errors->first('productName') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <input type="text" placeholder="Description" id="description" class="form-control"
                                name="description" required>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Update a Product</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update') }}" id="update">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="productID">Product Paypal ID:</label>
                            <input type="text" placeholder="Product ID" id="productID" class="form-control"
                                name="productID" required>
                            @if ($errors->has('productID'))
                                <span class="text-danger">{{ $errors->first('productID') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="productName">Product Name:</label>
                            <input type="text" placeholder="Product Name" id="productName" class="form-control"
                                name="productName" required autofocus>
                            @if ($errors->has('productName'))
                                <span class="text-danger">{{ $errors->first('productName') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <input type="text" placeholder="Description" id="description" class="form-control"
                                name="description" required>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Products</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($products); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $products[$i]['name'] }}</td>
                                    <td>{{ $products[$i]['description'] }}</td>
                                    <td>{{ $products[$i]['create_time'] }}</td>
                                    <td>
                                        <button class="btn btn-warning" onclick="setProductForUpdate({{json_encode($products[$i])}})">Update</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setProductForUpdate(product) {
            $('#update #productID').val(product.id)
            $('#update #productName').val(product.name)
            $('#update #description').val(product.description)
        }
    </script>
@endsection
