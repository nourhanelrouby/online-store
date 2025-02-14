@extends('admin.layouts.main')
@section('title','Orders')
@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Customer name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $index=> $order)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{$order->created_at->format('d/m/Y')}}</td>
                    <td>{{ $order->user->name}}</td>
                    <td>{{ $order->user->phone }}</td>
                    <td>{{ $order->user->address }}</td>
                    <td>{{ $order->total_price . ' EGB'}}</td>
                    <td>{{ $order->status}}</td>
                    <td>
                        <a class="btn btn-outline-danger" href="{{route('admin.orders.details',$order->id)}}">Order Details</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter_{{$order->id}}">
                            Update Order Status
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">تعديل حالة الطلب</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.orders.update',$order->id)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="order_status">Order Status</label>
                                                <select id="order_status" class="form-control" name="status">
                                                    <option hidden value="">Choose Status</option>
                                                    <option {{$order->status == 'done' ? 'selected' : ''}} value="done">Done</option>
                                                    <option {{$order->status == 'cancel' ? 'selected' : ''}} value="cancel" >Canceled</option>
                                                    <option {{$order->status == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                                                </select>
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
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
