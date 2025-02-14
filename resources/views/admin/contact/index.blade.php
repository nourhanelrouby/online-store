@extends('admin.layouts.main')
@section('title','Contact')
@section('content')
    <h1>Contacts</h1>
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
        @foreach ($contacts as $index =>$contact)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
            </tr>

        @endforeach
    </table>
@endsection
