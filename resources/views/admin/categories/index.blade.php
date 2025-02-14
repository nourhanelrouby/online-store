@extends('admin.layouts.main')
@section('title','Category')
@section('content')
    <div class="mt-4">
        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
            Add New Category
        </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">Category Name</label>
                                    <input name="name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="desc">Category Description</label>
                                <textarea name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row d-none" id="cats_list">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="projectinput1">Choose Main Category</label>
                                    <select name="parent_id" class="select2 form-control @error('parent_id') is-invalid @enderror">
                                        <option value="">Choose Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Main Category</label>
                                <input type="radio" name="type" value="1" checked class="switchery" data-color="success"/>
                            </div>
                            <div class="col-md-4">
                                <label>Sub Category</label>
                                <input type="radio" name="type" value="2" class="switchery" data-color="success"/>
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
    <br><br>
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="table-responsive">
        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Main Category</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->subcategory ? $category->subcategory->name : '-' }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $category->id }}" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $category->id }}" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">Category Name</label>
                                                <input name="name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" value="{{$category->name}}">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="desc">Category Description</label>
                                            <textarea name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">{{$category->description}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row d-none" id="cats_list_edit{{ $category->id }}">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Choose Main Category</label>
                                                <select name="parent_id" class="select2 form-control @error('parent_id') is-invalid @enderror">
                                                    <option value="">Choose Category</option>
                                                    @foreach($categories as $categoryy)
                                                        <option value="{{ $categoryy->id }}" {{ $category->parent_id == $categoryy->id ? 'selected' : '' }}>
                                                            {{ $categoryy->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Main Category</label>
                                            <input type="radio" name="type" value="1" {{ $category->parent_id ? '' : 'checked' }} class="switchery" data-color="success"/>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Sub Category</label>
                                            <input type="radio" name="type" value="2" {{ $category->parent_id ? 'checked' : '' }} class="switchery" data-color="success"/>
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

                <!-- Delete Modal -->
                <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete <b>{{ $category->name }}</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.categories.delete', $category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    Are You Sure?
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input:radio[name="type"]').change(function() {
                if (this.checked && this.value == '2') {
                    $('#cats_list').removeClass('d-none');
                } else {
                    $('#cats_list').addClass('d-none');
                }
            });

            $('input:radio[name="type"]').each(function() {
                if (this.checked && this.value == '2') {
                    $('#cats_list_edit' + $(this).closest('.modal').attr('id').replace('edit', '')).removeClass('d-none');
                }
            });

            $('input:radio[name="type"]').on('change', function() {
                if (this.checked && this.value == '2') {
                    $('#cats_list_edit' + $(this).closest('.modal').attr('id').replace('edit', '')).removeClass('d-none');
                } else {
                    $('#cats_list_edit' + $(this).closest('.modal').attr('id').replace('edit', '')).addClass('d-none');
                }
            });
        });
    </script>
@endsection
