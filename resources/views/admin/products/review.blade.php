@extends('admin.layouts.main')
@section('title','Reviews')
@section('content')
    <h1>Product Reviews</h1>
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Subject</th>
            <th>Message</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($productReviews as $index =>$productReview)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $productReview->name }}</td>
                <td>{{ $productReview->email }}</td>
                <td>{{ $productReview->subject}}</td>
                <td>{{$productReview->message}}</td>
            </tr>

        @endforeach
    </table>
@endsection
