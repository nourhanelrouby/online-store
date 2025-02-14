@extends('admin.layouts.main')
@section('title','Subscribes')
@section('content')
    <h1>Subscribes</h1>
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr>
            <th>#</th>
            <th>E-mail</th>
            <th>Message</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($subscribes as $index =>$subscribe)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $subscribe->email }}</td>
                <td>
                    <form action="{{ route('admin.subscribes.sendMail',$subscribe) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="background-color: #3B5890; border-color: #3B5890; padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                            <i class="fas fa-paper-plane"></i> Send
                        </button>
                    </form>
                </td>

            </tr>

        @endforeach
    </table>
@endsection
