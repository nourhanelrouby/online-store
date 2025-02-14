@extends('admin.layouts.main')
@section('title','Order Details')
@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orderProducts as $index=> $orderProduct)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $orderProduct->name}}</td>
                        <td><img width="80" src="{{ asset('storage/'.$orderProduct->image)  }}"></td>
                        <td>{{ $orderProduct->price . ' EGB' }}</td>
                        <td>{{ $orderProduct->quantity }}</td>
                    </tr>

            @endforeach
        </table>
    </div>


@stop
