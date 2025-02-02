        `   <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Track</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <style>
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            .carousel-caption {
                padding: 1rem;
            }

            .btn {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
        }
        
        body {
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Detail Pesanan</div>
            <div class="card-body">
                <p><strong>ID Pesanan:</strong> {{ $order->pesanan_id }}</p>
                <p><strong>Nama Tamu:</strong> {{ $order->nama_depan }} {{ $order->nama_belakang }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Tanggal Check-in:</strong> {{ $order->check_in }}</p>
                <p><strong>Tanggal Check-out:</strong> {{ $order->check_out }}</p>
            </div>
        </div>
    </div>
</div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>

