<x-app-layout>
    <section class="wsus__cart mt_170 pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 wow fadeInUp">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="pro_img">Item</th>

                                        <th class="pro_name">Name</th>

                                        <th class="pro_select">Quantity</th>

                                        <th class="pro_tk">Price</th>

                                        <th class="pro_icon">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_items as $cart_item)
                                        <tr>
                                            <td class="pro_img">
                                                <img src="{{ asset($cart_item['image']) }}" alt="{{ $cart_item["name"] }}"
                                                    class="img-fluid w-100">
                                            </td>

                                            <td class="pro_name">
                                                <a
                                                    href="{{ route("products.show", $cart_item["id"]) }}">{{ $cart_item["name"] }}</a>
                                            </td>

                                            <td class="pro_select">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger decrement"
                                                        data-id="{{ $cart_item['id'] }}"><i
                                                            class="fal fa-minus"></i></button>
                                                    <input class="quantity" type="text" placeholder="1"
                                                        value="{{ $cart_item['quantity'] }}" min="1">
                                                    <button class="btn btn-success increment"
                                                        data-id="{{ $cart_item['id'] }}"><i
                                                            class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="pro_tk">
                                                <h6>${{ $cart_item["price"] * $cart_item["quantity"] }}</h6>
                                            </td>

                                            <td class="pro_icon">
                                                <form action="{{ route("remove-from-cart", $cart_item["id"]) }}"
                                                    method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button class="btn" type="submit"><i class="fal fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="wsus__cart_list_bottom">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-xl-5 ms-auto">
                                <div class="wsus__cart_list_pricing">
                                    <h6>Total <span>$ {{ $totalPrice }}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <ul class="wsus__cart_list_bottom_btn">
                        <li><a href="products.html" class="common_btn cont_shop">Continue To Shipping</a>
                        </li>
                        <li><a href="checkout.html" class="common_btn common_btn_2">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                // Increase quantity function
                $(".increment").on("click", function () {
                    let id = $(this).data("id");
                    let quantity = $(this).siblings(".quantity").val(); // only get the quantity next to this button
                    quantity = parseInt(quantity) + 1;
                    $(this).siblings(".quantity").val(quantity);
                    $.ajax({
                        method: "POST",
                        url: "{{ route('update-quantity') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id,
                            quantity: quantity,
                        },
                        success: function (data) {
                            if (data["status"] == "success") {
                                window.location.reload()
                            }
                        },
                        error: function (xhr, status, error) { }
                    })
                });

                // Decrease quantity function
                $(".decrement").on("click", function () {
                    let id = $(this).data("id");
                    let quantity = $(this).siblings(".quantity").val();
                    if (quantity > 1) {
                        quantity = parseInt(quantity) - 1;
                        $(this).siblings(".quantity").val(quantity);
                        $.ajax({
                            method: "POST",
                            url: "{{ route('update-quantity') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                quantity: quantity,
                            },
                            success: function (data) {
                                if (data["status"] == "success") {
                                    window.location.reload()
                                }
                            },
                            error: function (xhr, status, error) { }
                        })
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
