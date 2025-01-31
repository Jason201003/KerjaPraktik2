<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Room</title>
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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

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
    <!-- Header Start -->
    @include('partials.header')
    <!-- Header End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('guest.home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="row">
            <!-- Tampilkan Pesan Kesalahan -->
            @if ($availableRooms->isEmpty())
                <div class="col-12 text-center">
                    <h4 style="color: red;">There is no such room available on {{ $checkIn }}. Please consider booking multiple rooms or choose another date.</h5>
                </div>
            @else
                @foreach ($availableRooms as $room)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <!-- Image -->
                            <img 
                                class="img-fluid w-100" 
                                src="{{ asset('img/'.$room->category->name.'.jpg') }}" 
                                alt="{{ $room->name }}" 
                                style="object-fit: cover; height: 250px;"
                            >

                            <!-- Room Details -->
                            <div class="room-item p-4 mt-2">
                                <h5 class="mb-3">{{ $room->category->name }} - {{ $room->tipe_bed }}</h5>
                                <p class="mb-2">Kapasitas : {{ $room->kapasitas }} tamu</p>
                                <p class="mb-2">Harga per malam : IDR {{ number_format($room->harga, 0, ',', '.') }}</p>
                                <p class="mb-2">Total : IDR {{ number_format($room->harga * $nights, 0, ',', '.') }}</p>
                                <button 
                                    class="btn btn-primary book-now-button w-100" 
                                    data-url="{{ route('booking.form', ['room' => $room->id, 'check_in' => $checkIn, 'check_out' => $checkOut, 'adults' => $adults, 'children' => $children, 'children_ages' => json_encode($childrenAges), 'quantity' => 1]) }}">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bookNowButtons = document.querySelectorAll('.book-now-button');

            bookNowButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const url = button.getAttribute('data-url');
                    window.location.href = url; 
                });
            });
        });
    </script>
</body>

</html>

