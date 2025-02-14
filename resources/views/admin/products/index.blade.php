@extends('admin.layouts.main')
@section('title','Products')
@section('content')
    <div class="mt-4">
        <button type="button" class="button x-small mb-3" data-toggle="modal" data-target="#exampleModal">
            Add New Product
        </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">Product Name</label>
                                    <input  name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp" value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="desc">Description</label>
                                <textarea name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">value="{{old('description')}}"</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname"> Image</label>
                                    <input  name = "image" type="file" class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp" >
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname"> Price</label>
                                    <input  name = "price" type="number" class="@error('price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp" value="{{old('price')}}">
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname">Quantity </label>
                                    <input  name = "quantity" type="number" class="@error('quantity') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp" value="{{old('quantity')}}">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Category</label>
                                <select  name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                                    <option value="">Choose</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" >
                                        <option value="1">Active</option>
                                        <option value="0">Non-active</option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input is_offer" type="checkbox" value="1" id="offerCheckbox" name="offer">
                                        <label class="form-check-label" for="offerCheckbox">
                                            Offer
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-none new_price">
                            <div class="form-group">
                                <label for="fname">New price </label>
                                <input name = "new_price" type="number" class="@error('new_price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp" value="{{old('new_price')}}">
                                @error('new_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
{{--    Search Form--}}
    <form class="mb-5">
        <div class="row mb-3">
            <!-- Product Name -->
            <div class="col-md-4 mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ request('name') }}" placeholder="Enter product name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantity Field -->
            <div class="col-md-4 mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input name="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{ request('quantity') }}" placeholder="Enter quantity">
                @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category Field -->
            <div class="col-md-4 mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                    <option value="" hidden>Select Category</option>
                    @foreach($categories as $category)
                        <option @if(request('category') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <!-- Status Field -->
            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    <option value="" hidden>Select Status</option>
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Non-active</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Offer Field -->
            <div class="col-md-4 mb-3">
                <label for="offer" class="form-label">Offer</label>
                <select class="form-control @error('offer') is-invalid @enderror" name="offer" id="offer">
                    <option value="" hidden>Select Offer</option>
                    <option value="1" {{ request('offer') == '1' ? 'selected' : '' }}>Has offer</option>
                    <option value="0" {{ request('offer') == '0' ? 'selected' : '' }}>No offer</option>
                </select>
                @error('offer')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-search me-1"></i> Search
                </button>
                <button type="reset" class="btn btn-light">
                    <i class="fas fa-undo me-1"></i> Clear Inputs
                </button>
            </div>
        </div>
    </form>
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th> Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Offer?</th>
                <th>New Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" width="20%" alt="Product Image"></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->offer == null ? '-' : 'Has Offer'}}</td>
                    <td>{{$product->new_price ==null? '-' : $product->new_price }}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->status != 0 ? 'Active' : 'Non-active'}}</td>

                    <td>
                        {{--  @if(auth('admin')->user()->store_id == null)  --}}
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $product->id }}"
                                title="Edit"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $product->id }}"
                                title="Delete"><i
                                class="fa fa-trash"></i></button>
                        {{--  @endif  --}}
                        <a  type="button" class=" fa fa-warning btn btn-cancel-title-editing btn-sm"  href="{{route('admin.products.reviews',$product->id)}}">Reviews</a>
                    </td>
                </tr>
                <!-- edit_modal_product -->
                <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    Update
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- edit_form -->
                                <form action="{{route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">Product Name</label>
                                                <input value="{{$product->name}}" required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="desc">Description</label>
                                            <textarea name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">{{$product->description}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">Image</label>
                                                <input name = "image" type="file" class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">Price</label>
                                                <input value="{{$product->price}}"  name = "price" type="number" class="@error('price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">Quantity</label>
                                                <input value="{{$product->quantity}}"  name = "quantity" type="number" class="@error('quantity') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('quantity')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Category</label>
                                            <select required="required" name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                                                <option value="">Choose</option>
                                                @foreach ($categories as $cat)
                                                    <option {{$product->category_id == $cat->id ? 'selected' : ''}} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">Status</label>
                                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                    <option {{$product->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                                    <option {{$product->status == 0 ? 'selected' : ''}} value="0">Non-active</option>
                                                </select>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input {{ $product->offer == 1 ? 'checked' : '' }} class="form-check-input is_offer" type="checkbox" value="1" id="editOfferCheckbox{{ $product->id }}" name="offer">
                                                    <label class="form-check-label" for="editOfferCheckbox{{ $product->id }}">
                                                        Offer
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none new_price">
                                        <div class="form-group">
                                            <label for="fname">New Price</label>
                                            <input value="{{$product->new_price}}" name = "new_price" type="number" class="@error('new_price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                            @error('new_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- delete_modal_product -->
                <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">Delete <b>{{ $product->name }}</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.products.delete',$product->id)}}"
                                      method="post">
                                    @method('DELETE')
                                    @csrf
                                    Are You Sure ?
                                    <input id="id" type="hidden" name="product_id" class="form-control"
                                           value="{{ $product->id }}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        <button type="submit"
                                                class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
        <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Loop through all edit modals
                @foreach ($products as $product)
                const editOfferCheckbox{{ $product->id }} = document.getElementById("editOfferCheckbox{{ $product->id }}");
                const editNewPriceDiv{{ $product->id }} = document.querySelector("#edit{{ $product->id }} .new_price");

                // Initialize visibility based on checkbox state
                if (editOfferCheckbox{{ $product->id }}.checked) {
                    editNewPriceDiv{{ $product->id }}.classList.remove("d-none");
                } else {
                    editNewPriceDiv{{ $product->id }}.classList.add("d-none");
                }

                // Toggle visibility on checkbox change
                editOfferCheckbox{{ $product->id }}.addEventListener("change", function () {
                    if (this.checked) {
                        editNewPriceDiv{{ $product->id }}.classList.remove("d-none");
                    } else {
                        editNewPriceDiv{{ $product->id }}.classList.add("d-none");
                    }
                });
                @endforeach
            });
        </script>
        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const offerCheckbox = document.getElementById("offerCheckbox");
            const newPriceDiv = document.querySelector(".new_price");

            // Initialize visibility based on checkbox state
            if (offerCheckbox.checked) {
                newPriceDiv.classList.remove("d-none");
            } else {
                newPriceDiv.classList.add("d-none");
            }

            // Toggle visibility on checkbox change
            offerCheckbox.addEventListener("change", function () {
                if (this.checked) {
                    newPriceDiv.classList.remove("d-none");
                } else {
                    newPriceDiv.classList.add("d-none");
                }
            });
        });
    </script>

@endsection
