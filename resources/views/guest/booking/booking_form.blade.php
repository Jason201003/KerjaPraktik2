
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Web Fonts -->
     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/main.js') }}"></script>
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
                <form id="validationForm" class="row g-3 bg-white p-4 rounded">
                    @csrf
                    <h5 style="font-weight: bold">Data Pemesan</h5>
                    <!-- <div class="col-md-6">
                        <div>Check In :</div>
                        {{ $checkIn }}
                    </div>
                    <div class="col-md-6">
                        <div>Check Out :</div>
                        {{ $checkOut }}
                    </div> -->
                    <div class="col-md-6">
                        <label for="check_in" class="form-label">Check In</label>
                        <input type="text" class="form-control" id="check_in" value="{{ $checkIn }}"required>
                    </div>
                    <div class="col-md-6">
                        <label for="check_out" class="form-label">Check Out</label>
                        <input type="text" class="form-control" id="check_out" value="{{ $checkOut }}"required>
                    </div>
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="firstName" required>
                        <div class="invalid-feedback">Masukkan nama yang valid</div>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastName" required>
                        <div class="invalid-feedback">Masukkan nama yang valid</div>
                    </div>
                    <div class="col-md-6">
                        <label for="NoHandphone" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="NoHandphone" placeholder="+62" required>
                        <div class="invalid-feedback">Masukkan Nomor Handphone yang valid.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" required>
                        <div class="invalid-feedback">Masukkan email yang valid.</div>
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
                        <input type="checkbox" name="BebasAsapRokok" id="bebasAsapRokok" class="form-check-input" data-name="Bebas Asap Rokok" data-harga="0">
                        <label for="bebasAsapRokok" class="form-check-label">Bebas Asap Rokok</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="LantaiAtas" id="lantaiAtas" class="form-check-input" data-name="Lantai Atas" data-harga="20000">
                        <label for="lantaiAtas" class="form-check-label">Lantai Atas</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="WaktuCheckIn" id="waktuCheckIn" class="form-check-input" data-name="Waktu Check-in" data-harga="30000">
                        <label for="waktuCheckIn" class="form-check-label">Waktu Check-in</label>
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
                        <p id="hargaKamar" class="mb-0" style="font-weight: bold;">IDR {{ number_format($room->harga, 0, ',', '.') }}</p>
                    </div>
                    <p style="font-weight: 100">(1x) Deluxe (1 Malam)</p>
                    <div id="rincianHargaContainer"></div>
                    <hr class="mt-3 mb-3">
                    <div class="d-flex justify-content-between w-100">
                        <h5 style="font-weight: bold">Total Harga</h5>
                        <p id="totalHarga" class="mb-0" style="font-weight: bold;">IDR {{ number_format($room->harga, 0, ',', '.') }}</p>
                    </div>
                    <form id="payment-form" method="post" action="/payment">
                        @csrf
                        <input type="hidden" id="snap-token" name="snap_token">
                        <button id="pay-button" class="btn btn-sm btn-dark rounded py-2 px-4" disabled>Bayar Sekarang</button>
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
                    <span style="margin-left: 140px; color: #333; font-size: 18px">IDR {{ number_format($room->harga, 0, ',', '.') }}</span>
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

<!-- Harga dan Pembayaran -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const baseHarga = {{ $room->harga }}; 
        let totalHarga = baseHarga;

        const rincianHargaContainer = document.getElementById('rincianHargaContainer');
        const totalHargaElement = document.getElementById('totalHarga');

        const updateRincianHarga = () => {
            rincianHargaContainer.innerHTML = '';
            totalHarga = baseHarga;

            // Loop untuk semua checkbox yang dipilih
            document.querySelectorAll('.form-check-input:checked').forEach(input => {
                const name = input.getAttribute('data-name');
                const harga = parseInt(input.getAttribute('data-harga')) || 0;

                console.log('Nama Item:', name, 'Harga:', harga);

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
            });

            // Perbarui tampilan total harga
            totalHargaElement.textContent = `IDR ${totalHarga.toLocaleString()}`;
            console.log('Total Harga Final:', totalHarga);
        };

        // Event listener untuk setiap checkbox
        document.querySelectorAll('.form-check-input').forEach(input => {
            input.addEventListener('change', updateRincianHarga);
        });

        // Inisialisasi awal
        updateRincianHarga();

        // Tombol pembayaran
        document.getElementById('pay-button').addEventListener('click', function(e) {
            e.preventDefault();

            // Ambil data pesanan dari formulir
            const formData = {
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('NoHandphone').value,
                totalHarga: totalHarga, // Ambil dari harga terbaru
                check_in: document.getElementById("check_in").value,
                check_out: document.getElementById("check_out").value,
            };

            console.log('Form Data:', formData);

            // Kirim data ke backend untuk mendapatkan Snap Token
            fetch('/payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(formData),
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            alert("Payment Success!");
                            console.log(result);
                            document.getElementById('payment-form').submit();
                        },
                        onPending: function(result) {
                            alert("Waiting for your payment!");
                            console.log(result);
                        },
                        onError: function(result) {
                            alert("Payment Failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            alert('You closed the payment popup without finishing the process.');
                        }
                    });
                } else {
                    alert("Gagal mendapatkan Snap Token. Silakan coba lagi.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });
</script>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const payButton = document.getElementById('pay-button');
        const requiredFields = [
            document.getElementById('firstName'),
            document.getElementById('lastName'),
            document.getElementById('NoHandphone'),
            document.getElementById('email'),
            document.getElementById("check_in"),
            document.getElementById("check_out")
            

        ];
        
        // Fungsi validasi untuk memeriksa apakah semua input terisi dan valid
        const validateForm = () => {
            let allValid = true;

            // Periksa semua input teks dan
            check_out: document.getElementById("check_out").value,
            //  email
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    allValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                    field.classList.add('is-valid');
                }
            });

           

            // Aktifkan atau nonaktifkan tombol pembayaran berdasarkan validitas form
            payButton.disabled = !allValid;
        };

        // Event listener untuk semua input teks dan email
        requiredFields.forEach(field => {
            field.addEventListener('input', validateForm);
        });

    

        // Inisialisasi validasi awal
        validateForm();
    });
</script>

<!--Simpan data pemesa -->>
<script>
    document.getElementById("pay-button").addEventListener("click", function(event) {
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
            },
            body: JSON.stringify(formData),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.message) {
                alert("Pesanan berhasil dibuat dengan ID: " + data.id_pesanan);
                // Setelah data berhasil dikirim, lanjutkan ke proses pembayaran (jika ada)
                // Misalnya menampilkan halaman atau melanjutkan integrasi pembayaran
                window.location.href = "data.payment_url";  // Ganti dengan URL pembayaran jika diperlukan
            }
        })
        // .catch((error) => {
        //     console.error('Error:', error);
        //     alert("Terjadi kesalahan saat menyimpan pesanan");
        // });
    });
    
    
    </script>
    
    
</body>
</html>
