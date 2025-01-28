<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h1>Checkout</h1>
    <form id="payment-form">
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="amount" placeholder="Jumlah" required>
        <button type="button" id="pay-button">Bayar</button>
    </form>

    <script>
        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            fetch('{{ route('payment.process') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    name: document.querySelector('[name="name"]').value,
                    email: document.querySelector('[name="email"]').value,
                    amount: document.querySelector('[name="amount"]').value,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    window.snap.pay(data.snap_token);
                } else {
                    alert('Terjadi kesalahan.');
                }
            });
        });
    </script>
</body>
</html>
