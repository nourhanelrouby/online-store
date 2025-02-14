@extends('website.layouts.main')
@section('title', 'Cart Products')

@section('css')
    <style>
        .container-cart h3 { text-align: right; }
        .container-cart p {
            background-color: #A333C8;
            color: white;
            width: 20%;
            padding: 10px;
            border-radius: 20px;
        }
    </style>
@stop

@section('content')
    <div class="container container-cart col-12 mt-5 mb-5" style="direction: rtl">
        <h3>Shopping-cart</h3>
        <p class="mt-3">Notice: Payment is made once the item is received</p>
    </div>

    <div class="container" style="direction: rtl">
        <!-- Confirm Order Form -->
        @include('admin.layouts.success')
        @include('admin.layouts.error')
        <form action="{{ route('confirm') }}" method="POST">
            @csrf
            @if(isset($cartProducts) && count($cartProducts) > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartProducts as $index => $cartProduct)
                        @php
                            $productPrice = $cartProduct->offer ? $cartProduct->new_price : $cartProduct->price;
                            $total += $productPrice;
                        @endphp
                        <tr class="product-rows">
                            <td>{{ $index++ }}</td>
                            <td>{{ $cartProduct->name }}</td>
                            <td>
                                <img width="100" class="img-fluid" src="{{asset('storage/'.$cartProduct->image)}}" alt="">
                            </td>

                            <td>
                                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                <input type="hidden" name="user_id" value="{{ $cart->user->id }}">
                                <input type="hidden" name="products[{{ $index }}][product_id]" value="{{ $cartProduct->id }}">
                                <input autocomplete="off" type="number" min="1" class="product_qty form-control"
                                       value="1" name="products[{{ $index }}][qty]">
                            </td>
                            <td class="product_price">{{ $productPrice }} EGP</td>
                            <td class="product_result">{{ $productPrice }} EGP</td>
                            <td>
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $cartProduct->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Total Price -->
                <div class="text-right mt-3">
                    <p><strong>Total:</strong> <span id="total-price">{{ $total }}</span> EGP</p>
                    <input type="hidden" id="total-price-input" name="total_price" value="{{ $total }}">
                </div>

                <br>
                <input id="add_order" type="submit" value="Order" class="btn btn-primary">
            @else
                <div class="cart_empty mt-3" style="display: flex;justify-content: center;align-items: center">
                    <img width="50%" src="{{ asset('assets/site/img/empty-shopping-cart.webp') }}">
                </div>
                <div class="cart_empty_text text-center mt-3">
                    <p>Shopping-cart is Empty!</p>
                </div>
            @endif
        </form>
        <form id="delete-form" action="{{ route('deleteCartProduct') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            @if(isset($cartProduct))
            <input type="hidden" id="deletedProductId" name="deletedProductId" value="{{$cartProduct->id}}">
            @endif
        </form>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let totalPrice = 0;

            function updateTotal() {
                totalPrice = 0;
                document.querySelectorAll(".product_qty").forEach(function (qtyField) {
                    let row = qtyField.closest("tr");
                    let unitPrice = parseFloat(row.querySelector(".product_price").textContent);
                    let quantity = parseInt(qtyField.value);
                    let rowTotal = unitPrice * quantity;

                    row.querySelector(".product_result").textContent = rowTotal + " EGP";
                    totalPrice += rowTotal;
                });

                document.getElementById("total-price").textContent = totalPrice;
                document.getElementById("total-price-input").value = totalPrice;
            }

            // Initialize total price
            updateTotal();

            // Update total price when quantity changes
            document.querySelectorAll(".product_qty").forEach(function (qtyField) {
                qtyField.addEventListener("change", updateTotal);
            });

            // Confirm deletion and submit the form manually
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function () {
                    let productId = this.getAttribute("data-id");

                    if (confirm("Are you sure you want to remove this item?")) {
                        let form = document.getElementById("delete-form");
                        document.getElementById("deletedProductId").value = productId;
                        form.submit();
                    }
                });
            });

            // Confirm order
            document.getElementById("add_order").addEventListener("click", function (event) {
                if (!confirm("Are you sure you want to confirm your order?")) {
                    event.preventDefault();
                }
            });
        });
    </script>
@stop
