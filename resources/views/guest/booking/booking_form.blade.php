
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">`
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Web Fonts -->
     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Form</title>
    <style>
        .back-button-container {
            margin-bottom: 1rem;    
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="back-button-container">
            <button onclick="window.history.back()" class="btn back-button">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form id="validationForm" class="row g-3 bg-white p-4 rounded" method="POST" action="{{ route('pesanan.store') }}">
                    @csrf
                    <h5 style="font-weight: bold">Data Pemesan</h5>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="kamar_id" id="kamar_id" value="{{ $room->id }}">
                    <input type="hidden" id="pesanan_id" name="pesanan_id" value="" >
                    <!-- <input type="hidden" id="status" name="status" value="" > -->

                    <div class="col-md-6">
                        <label for="check_in" class="form-label">Check In</label>
                        <input type="text" class="form-control" id="check_in" name="check_in" value="{{ $checkIn }}"readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="check_out" class="form-label">Check Out</label>
                        <input type="text" class="form-control" id="check_out" name="check_out" value="{{ $checkOut }}"readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="adults" class="form-label">Adults</label>
                        <input type="number" class="form-control" id="adults" name="adults" value="{{ $adults }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="children" class="form-label">Children</label>
                        <input type="number" class="form-control" id="children" name="children" value="{{ $children }}" readonly>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="firstName" name="firstName  " required>
                        <div class="invalid-feedback">Masukkan nama yang valid</div>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                        <div class="invalid-feedback">Masukkan nama yang valid</div>
                    </div>
                    <div class="col-md-6">
                        <label for="NoHandphone" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="NoHandphone" name="NoHandphone" placeholder="+62" required>
                        <div class="invalid-feedback">Masukkan Nomor Handphone yang valid.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                        <div class="invalid-feedback">Masukkan email yang valid.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="quantity" class="form-label">Jumlah Kamar</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="{{ $room->quantity }}" value="{{ request()->quantity ?? 1 }}" required>
                        <div class="invalid-feedback">Masukkan jumlah kamar yang valid (1 - {{ $room->quantity }}).</div>
                    </div>
    
                </form>
                
                <br><br>
                
                <form id="extraOptionsForm" class="row g-3 bg-white p-4 rounded ">
                    <h5 style="font-weight: bold">Tambahan Khusus</h5>
                    <p style="font-weight: 100">
                        Ketersediaan permintaanmu akan diinformasikan pada waktu check-in.
                        Biaya tambahan mungkin akan dikenakan tapi kamu masih bisa membatalkannya nanti.
                    </p>
                    <div class="form-check">
                        <input type="checkbox" name="Sarapan" id="Sarapan" class="form-check-input" data-name="Sarapan" data-harga="{{ $totalGuests * 50000 }}">
                        <label for="Sarapan" class="form-check-label">Sarapan</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="ExtraBed" id="extraBed" class="form-check-input" data-name="Extra Bed" data-harga="100000">
                        <label for="extraBed" class="form-check-label">Extra Bed</label>
                    </div>
                </form>
                
                <br><br>
                
                <form id="rincianHarga" class="row g-3 bg-white p-4 rounded">
                    <h5 style="font-weight: bold">Rincian Harga</h5>
                    <hr class="mt-3 mb-3">
                    <div class="d-flex justify-content-between w-100">
                        <h5>Harga Kamar</h5>
                        <p id="hargaKamar" class="mb-0" data-rate="{{ $totalPrice }}" style="font-weight: bold;">
                            IDR {{ number_format($totalPrice, 0, ',', '.') }}
                        </p>
                    </div>
                    <div id="rincianHargaContainer"></div>
                    <hr class="mt-3 mb-3">
                    <div class="d-flex justify-content-between w-100">
                        <h5 style="font-weight: bold">Total Harga</h5>
                        <p id="totalHarga" class="mb-0" style="font-weight: bold;">IDR {{ number_format($totalPrice, 0, ',', '.') }}</p>
                    </div>
                    <form id="payment-form" method="post" action="/payment">
                        @csrf
                        <input type="hidden" id="snap-token" name="snap_token">
                        <button id="pay-now" class="btn btn-sm btn-dark rounded py-2 px-4" disabled>Bayar Sekarang</button>
                    </form>
                    <p style="font-size: 15px">Dengan lanjut ke pembayaran, kamu telah menyetujui menyetujui Syarat dan Ketentuan, Kebijakan Privasi..</p>
                </form>
                
                
            </div>
            <div class="box-white col-lg-6 bg-white p-4">
                <p style="font-weight: bold">AMIRA HOTEL BANDUNG</p>
                <img src="{{ asset('img/'.$room->category->name.'.jpg') }}"alt="Gambar Deskripsi" class="img-fluid mb-3">
                <h5 style="font-weight: bold;">{{ $room->category->name }} - {{ $room->tipe_bed }}</h5>
                <div class="d-flex flex-column mb-3" style="gap: 10px;">
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="fa fa-bed me-3 fa-lg" style="color: #FEA116"></i>{{ $room->tipe_bed }}
                    </small>
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="bi bi-person-fill me-3 fa-lg" style="color: #FEA116"></i>{{ $room->kapasitas }} Guests
                    </small>
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="fa fa-wifi me-3 fa-lg" style="color: #FEA116"></i>wifi
                    </small>
                </div>
                <hr class="mt-3 mb-3">
                <small style="display: flex; align-items: center; font-weight: bold; font-size: 15px">
                    <i class="bi bi-receipt me-3 fa-lg" style="color: #1256b5"></i>
                    Harga Kamar
                    <span style="margin-left: 140px; color: #333; font-size: 18px">IDR {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </small>
                
            
            </div>
            
        </div>
            
        </div>
        
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Validasi Dinamis
    document.querySelectorAll('.form-control, .form-select').forEach(input => {
        input.addEventListener('input', () => {
            if (input.value.trim() === "") {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
        });
    });

    // Validasi Submit Form
    const form = document.getElementById('validationForm');
    form.addEventListener('submit', (event) => {
        let isValid = true;
        form.querySelectorAll('.form-control, .form-select').forEach(input => {
            if (input.value.trim() === "") {
                input.classList.add('is-invalid');
                isValid = false;
            }
        });
        if (!form.querySelector('#terms').checked) {
            document.querySelector('#terms').classList.add('is-invalid');
            isValid = false;
        }
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

<script>
    // Ambil elemen input email dan tombol bayar
    const emailInput = document.getElementById('email');
    const payButton = document.getElementById('pay-now');

    // Fungsi untuk memeriksa email
    function checkEmail() {
        const emailValue = emailInput.value;
        if (emailValue.endsWith('@gmail.com')) {
            payButton.disabled = false; // Aktifkan tombol jika email valid
        } else {
            payButton.disabled = true; // Nonaktifkan tombol jika email tidak valid
        }
    }

    // Event listener untuk memeriksa email setiap kali ada perubahan input
    emailInput.addEventListener('input', checkEmail);
</script>
<!-- Harga dan Pembayaran -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const baseHarga = {{ $totalPrice }};
        let totalHarga = baseHarga;

        const rincianHargaContainer = document.getElementById('rincianHargaContainer');
        const totalHargaElement = document.getElementById('totalHarga');
        const childrenAges = JSON.parse('{!! $childrenAges !!}').map(age => parseInt(age, 10));
        const quantityInput = document.getElementById('quantity');

        quantityInput.addEventListener('input', function () {
            updateRincianHarga();
        });

        const updateRincianHarga = () => {
            rincianHargaContainer.innerHTML = '';
            totalHarga = baseHarga * parseInt(quantityInput.value);

            // Check if the "Sarapan" checkbox is selected
            const sarapanCheckbox = document.querySelector('#Sarapan');
            let sarapanPrice = parseInt(sarapanCheckbox.getAttribute('data-harga')) || 0;

            if (sarapanCheckbox.checked) {
                // Calculate discounted sarapan price for children under 5
                const childrenUnder5 = childrenAges.filter(age => age < 5).length;
                const totalGuests = parseInt(sarapanPrice / {{ $totalGuests }}) || 0; // Calculate per-person price
                const discountedSarapanPrice = sarapanPrice - (childrenUnder5 * totalGuests);

                console.log(childrenUnder5, totalGuests, discountedSarapanPrice);

                // Ensure no negative price
                sarapanPrice = Math.max(0, discountedSarapanPrice);

                // Display Sarapan price in the breakdown
                const sarapanItem = document.createElement('div');
                sarapanItem.className = 'd-flex justify-content-between';
                sarapanItem.innerHTML = `
                    <p class="mb-0">Sarapan</p>
                    <p class="mb-0" style="font-weight: bold;">IDR ${sarapanPrice.toLocaleString()}</p>
                `;
                rincianHargaContainer.appendChild(sarapanItem);

                totalHarga += sarapanPrice;
            }

            // Add other selected options
            document.querySelectorAll('.form-check-input:checked').forEach(input => {
                if (input.id !== 'Sarapan') { // Exclude sarapan as it's already handled
                    const name = input.getAttribute('data-name');
                    const harga = parseInt(input.getAttribute('data-harga')) || 0;

                    if (!isNaN(harga)) {
                        const item = document.createElement('div');
                        item.className = 'd-flex justify-content-between';
                        item.innerHTML = `
                            <p class="mb-0">${name}</p>
                            <p class="mb-0" style="font-weight: bold;">IDR ${harga.toLocaleString()}</p>
                        `;
                        rincianHargaContainer.appendChild(item);
                        totalHarga += harga;
                    }
                }
            });

            // Update total price display
            totalHargaElement.textContent = `IDR ${totalHarga.toLocaleString()}`;
        };

        // Add event listeners to checkboxes
        document.querySelectorAll('.form-check-input').forEach(input => {
            input.addEventListener('change', updateRincianHarga);
        });

        // Initial calculation
        updateRincianHarga();
        
        // Tombol pembayaran
        document.getElementById('pay-now').addEventListener('click', function(e) {
            e.preventDefault();

            // Ambil data pesanan dari formulir
            const formData = {
                kamar_id: document.getElementById('kamar_id').value,
                nama_depan: document.getElementById('firstName').value,
                nama_belakang: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                nomor_handphone: document.getElementById('NoHandphone').value,
                total_harga: totalHarga, // Ambil dari harga terbaru
                check_in: document.getElementById("check_in").value,
                check_out: document.getElementById("check_out").value,
                adults: parseInt(document.getElementById("adults").value),
                children: parseInt(document.getElementById("children").value),
                quantity: parseInt(document.getElementById("quantity").value),
                // status: parseInt(document.getElementById("status").value),
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            };

            console.log('Form Data:', formData);

            // Kirim data ke backend untuk disimpan
            fetch('/pesanan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(formData),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {

                    document.getElementById("pesanan_id").value = data.pesanan_id;

                    // Proses pembayaran dengan Midtrans
                    fetch('/payment', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            pesanan_id: data.pesanan_id,
                            totalHarga: totalHarga,
                            firstName: document.getElementById('firstName').value,
                            lastName: document.getElementById('lastName').value,
                            email: document.getElementById('email').value,
                            phone: document.getElementById('NoHandphone').value,
                        }),
                    })
                    .then(paymentResponse => paymentResponse.json())
                    .then(paymentData => {
                        if (paymentData.snap_token) {
                            snap.pay(paymentData.snap_token, {
                                onSuccess: function(result) {
                                    alert("Payment Success!");
                                    window.location.href = '/';
                                },
                                onPending: function(result) {
                                    alert("Waiting for your payment!");
                                },
                                onError: function(result) {
                                    alert("Payment Failed!");
                                },
                                onClose: function() {
                                    alert('You closed the payment popup without finishing the process.');
                                }
                            });
                        } else {
                            alert("Gagal mendapatkan Snap Token. Silakan coba lagi.");
                        }
                    });
                } else {
                    alert("Gagal menyimpan pesanan. Silakan coba lagi.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });
</script>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<!--Simpan data pemesa -->>
<script>
    document.getElementById("pay-now").addEventListener("click", function(event) {
        event.preventDefault();
              
        const formData = {
            nama_depan: document.getElementById("firstName").value,
            nama_belakang: document.getElementById("lastName").value,
            nomor_handphone: document.getElementById("NoHandphone").value,
            email: document.getElementById("email").value,
            total_harga: parseFloat(
                document.getElementById("totalHarga").textContent
                    .replace("IDR ", "")
                    .replace(",", "")
            ),
            check_in: document.getElementById("check_in").value,
            check_out: document.getElementById("check_out").value,
            _token: document.querySelector('input[name="_token"]').value,
    };
        // Kirim data pesanan ke backend menggunakan fetch
        fetch('/pesanan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(formData),
        })
    });
</script>
    
    
</body>
</html> 