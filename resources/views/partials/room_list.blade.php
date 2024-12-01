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
</head>

<body>
        <!-- Spinner Start -->
      
        <!-- Spinner End -->

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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        @include('partials.booking_start')
        <!-- Booking End -->


        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
                </div>
                <div class="row g-4">
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

                <!-- Superior -->
                <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/Kamar_superior.jpg" alt="">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">IDR 183.929/Night</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">Superior </h5>
                            <div class="ps-2">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Beds</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-wifi text-primary me-2"></i>wifi</small>
                            <small><i class="bi bi-person-fill text-primary me-2"></i>2 Guests</small>
                        </div>
                        <p class="text-body mb-3">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis.</p>
                        <div class="d-flex justify-content-between">
                            <!-- Modal Superior -->
                            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#roomDetailModalSuperior">
                                Room Detail
                            </button>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('booking_form.booking_form_superior') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Modal untuk Superior -->
                <div class="modal fade" id="roomDetailModalSuperior" tabindex="-1" aria-labelledby="roomDetailModalLabelSuperior" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="roomDetailModalLabelSuperior">Superior Room Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid mb-3" src="img/Kamar_superior.jpg" alt="">
                                <h6>Room Information</h6>
                                <ul>
                                    <li>Size: 24.0 m²</li>
                                    <li>Capacity: 2 guests</li>
                                </ul>
                                <h6>Room Features You May Like</h6>
                                <ul>
                                    <li>Shower</li>
                                    <li>Refrigerator</li>
                                    <li>Hot water</li>
                                    <li>Air conditioning</li>
                                </ul>
                                <h6>Basic Facilities</h6>
                                <ul>
                                    <li>Breakfast included</li>
                                    <li>Interconnecting rooms available</li>
                                </ul>
                                <p class="text-body">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>  
                </div>
                     <!-- Kamar Superior Double -->
                     <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/Kamar_deluxe.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">IDR 200.000/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Superior Double</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-wifi text-primary me-2"></i>wifi</small>
                            <small><i class="bi bi-person-fill text-primary me-2"></i>2 Guests</small>
                        </div>
                        <p class="text-body mb-3">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis.</p>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#roomDetailModalSuperiorDouble">
                                Room Detail
                            </button>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4"  href="{{ route('booking_form.booking_form_superior_double') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Modal untuk Superior Double  -->
                    <div class="modal fade" id="roomDetailModalSuperiorDouble" tabindex="-1" aria-labelledby="roomDetailModalLabelSuperiorDouble" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="roomDetailModalLabelSuperiorDouble">Superior Double Room Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" >
                                    <img class="img-fluid mb-3" src="img/Kamar_deluxe.jpg" alt="">
                                    <h6>Room Information</h6>
                                    <ul>
                                        <li>Size: 20 m²/215 ft²</li>
                                        <li>Capacity: Max. 2 Adults and 1 Kid</li>
                                    </ul>
                                    <h6>Room Features You May Like</h6>
                                    <ul>
                                        <li>View : Nature</li>
                                        <li>Shower</li>
                                        <li>Flat-screen TV</li>
                                        <li>1 Queen Size bed</li>
                                    </ul>
                                    <h6>Basic Facilities</h6>
                                    <ul>
                                        <li>Room service available</li>
                                        <li>Daily housekeeping</li>
                                        <li>Free Wifi</li>
                                    </ul>
                                    <p class="text-body">Deluxe Twin Room menawarkan tempat tidur nyaman dengan dekorasi modern, menjamin pengalaman menginap yang berkesan.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Kamar Superior Twin -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/Kamar_deluxe.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">IDR 250.000/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Superior Twin</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-wifi text-primary me-2"></i>wifi</small>
                            <small><i class="bi bi-person-fill text-primary me-2"></i>2 Guests</small>
                        </div>
                        <p class="text-body mb-3">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis..</p>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#roomDetailModalSuperiorTwin">
                                Room Detail
                            </button>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('booking_form.booking_form_superior_twin') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Modal untuk Superior Twin  -->
                    <div class="modal fade" id="roomDetailModalSuperiorTwin" tabindex="-1" aria-labelledby="roomDetailModalLabelTwin" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="roomDetailModalLabelSuperiorTwin">Superior Twin Room Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid mb-3" src="img/Kamar_deluxe.jpg" alt="">
                                    <h6>Room Information</h6>
                                    <ul>
                                        <li>Size: 30.0 m²</li>
                                        <li>Capacity: 2 guests</li>
                                    </ul>
                                    <h6>Room Features You May Like</h6>
                                    <ul>
                                        <li>Hot water</li>
                                        <li>Air conditioning</li>
                                        <li>Flat-screen TV</li>
                                        <li>Free toiletries</li>
                                    </ul>
                                    <h6>Basic Facilities</h6>
                                    <ul>
                                        <li>Room service available</li>
                                        <li>Daily housekeeping</li>
                                    </ul>
                                    <p class="text-body">Tempat tidur berkualitas, dekorasi elegan, dan fasilitas modern. Cocok bagi tamu yang mencari kenyamanan dengan sentuhan eksklusif.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Kamar Deluxe -->
                     <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/Kamar_deluxe.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">IDR 300.000/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Deluxe</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-wifi text-primary me-2"></i>wifi</small>
                            <small><i class="bi bi-person-fill text-primary me-2"></i>2 Guests</small>
                        </div>
                        <p class="text-body mb-3">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis.</p>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#roomDetailModalDeluxe">
                                Room Detail
                            </button>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('booking_form.booking_form_deluxe') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Modal untuk Deluxe  -->
                    <div class="modal fade" id="roomDetailModalDeluxe" tabindex="-1" aria-labelledby="roomDetailModalLabelDeluxe" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="roomDetailModalLabelDeluxe">Deluxe Room Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid mb-3" src="img/Kamar_deluxe.jpg" alt="">
                                    <h6>Room Information</h6>
                                    <ul>
                                        <li>Size: 30.0 m²</li>
                                        <li>Capacity: 2 guests</li>
                                    </ul>
                                    <h6>Room Features You May Like</h6>
                                    <ul>
                                        <li>Hot water</li>
                                        <li>Air conditioning</li>
                                        <li>Flat-screen TV</li>
                                        <li>Free toiletries</li>
                                    </ul>
                                    <h6>Basic Facilities</h6>
                                    <ul>
                                        <li>Room service available</li>
                                        <li>Daily housekeeping</li>
                                        <li>Breakfast include</li>
                                    </ul>
                                    <p class="text-body">Deluxe Room menawarkan tempat tidur nyaman dengan dekorasi modern, menjamin pengalaman menginap yang berkesan.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <!-- Kamar Deluxe Double -->
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="img/Kamar_deluxe.jpg" alt="">
                                    <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">IDR 350.000/Night</small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">Deluxe Double</h5>
                                        <div class="ps-2">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Bed</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-wifi text-primary me-2"></i>wifi</small>
                                <small><i class="bi bi-person-fill text-primary me-2"></i>2 Guests</small>
                            </div>
                            <p class="text-body mb-3">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis.</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#roomDetailModalDeluxe">
                                    Room Detail
                                </button>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('booking_form.booking_form_deluxe_double') }}">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                        <!-- Modal untuk Deluxe Double-->
                        <div class="modal fade" id="roomDetailModalDeluxe" tabindex="-1" aria-labelledby="roomDetailModalLabelDeluxe" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="roomDetailModalLabelDeluxe">Deluxe Double Room Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid mb-3" src="img/Kamar_deluxe.jpg" alt="">
                                        <h6>Room Information</h6>
                                        <ul>
                                            <li>Size: 30.0 m²</li>
                                            <li>Capacity: 2 guests</li>
                                        </ul>
                                        <h6>Room Features You May Like</h6>
                                        <ul>
                                            <li>Hot water</li>
                                            <li>Air conditioning</li>
                                            <li>Flat-screen TV</li>
                                            <li>Free toiletries</li>
                                        </ul>
                                        <h6>Basic Facilities</h6>
                                        <ul>
                                            <li>Room service available</li>
                                            <li>Daily housekeeping</li>
                                            <li>Breakfast include</li>
                                        </ul>
                                        <p class="text-body">Deluxe Twin Room menawarkan tempat tidur nyaman dengan dekorasi modern, menjamin pengalaman menginap yang berkesan.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kamar Deluxe Twin -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/Kamar_deluxe.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">IDR 400.000/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Deluxe Twin</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-wifi text-primary me-2"></i>wifi</small>
                            <small><i class="bi bi-person-fill text-primary me-2"></i>2 Guests</small>
                        </div>
                        <p class="text-body mb-3">Nikmati kamar dengan desain modern yang dilengkapi dengan fasilitas lengkap, cocok untuk liburan keluarga atau bisnis.</p>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#roomDetailModalDeluxeTwin">
                                Room Detail
                            </button>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('booking_form.booking_form_deluxe_twin') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Modal untuk Deluxe Twin -->
                    <div class="modal fade" id="roomDetailModalDeluxeTwin" tabindex="-1" aria-labelledby="roomDetailModalLabelDeluxeTwin" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="roomDetailModalLabelDeluxeTwin">Deluxe Twin Room Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid mb-3" src="img/Kamar_deluxe.jpg" alt="">
                                    <h6>Room Information</h6>
                                    <ul>
                                        <li>Size: 30.0 m²</li>
                                        <li>Capacity: 2 guests</li>
                                    </ul>
                                    <h6>Room Features You May Like</h6>
                                    <ul>
                                        <li>Hot water</li>
                                        <li>Air conditioning</li>
                                        <li>Flat-screen TV</li>
                                        <li>Free toiletries</li>
                                    </ul>
                                    <h6>Basic Facilities</h6>
                                    <ul>
                                        <li>Room service available</li>
                                        <li>Daily housekeeping</li>
                                        <li>Breakfast include</li>
                                    </ul>
                                    <p class="text-body">Deluxe Twin Room menawarkan tempat tidur nyaman dengan dekorasi modern, menjamin pengalaman menginap yang berkesan.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                                </div>
                            </div>
        <!-- Room End -->


       <!-- Newsletter Start -->
       <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
         
     
           
        <div class="bg-dark rounded text-center p-5">
        
            
        </div>



</div>
<!-- Newsletter Start -->
        

        <!-- Footer Start -->
        @include('partials.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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
</body>

</html>