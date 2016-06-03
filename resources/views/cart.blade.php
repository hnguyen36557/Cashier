<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Demo</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->cart as $cart)
                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ $cart->product->price }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>{{ $cart->product->price * $cart->quantity }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><strong>Sub Total</strong></td>
                    <td>{{ $subTotal = $user->cart->sum(function ($cart) {
                        return $cart->product->price * $cart->quantity;
                    }) }}</td>
                </tr>
            </tbody>
        </table>

        <form action="/" method="POST">
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_seT8K5XU9yIGv5xX8mm2Q6bx"
                    data-amount="{{ $subTotal *100 }}"
                    data-name="Demo Site"
                    data-email="{{ $user->email }}"
                    data-locale="auto">
            </script>
        </form>

    </body>
</html>