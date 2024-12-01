
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
    
    <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Form</title>
</head>
<body>

    <header class="header">
        <div class="container">
            <div class="logo">
                <h1>AMIRA HOTEL</h1> 
            </div>
            <nav class="nav-steps-container">
                <div class="step active">
                    <div class="step-number">1</div>
                    <div class="step-label">Pesan</div>
                </div>
                <div class="step">
                    <div class="step-line"></div>
                    <div class="step-number">2</div>
                    <div class="step-label">Bayar</div>
                </div>
                <div class="step">
                    <div class="step-line"></div>
                    <div class="step-number">3</div>
                    <div class="step-label">Selesai</div>
                </div>
            </nav>
        </div>
    </header>
        
    
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
       
                <form id="validationForm" class="row g-3 bg-white p-4 rounded">
                    <h5 style="font-weight: bold">Data Pemesan</h5>
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
                    <div class="d-flex align-items-center">
                        <div class="form-check me-5">
                            <input type="radio" name="Pemesan" id="Pemesan" class="form-check-input">
                            <label for="Pemesan" class="form-check-label">Untuk diri sendiri</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="Pemesan" id="OrangLain" class="form-check-input">
                            <label for="OrangLain" class="form-check-label">Untuk orang lain</label>
                        </div>
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
                        <p id="hargaKamar" class="mb-0" style="font-weight: bold;">IDR 400.000</p>
                    </div>
                    <p style="font-weight: 100">(1x) Deluxe Twin (1 Malam)</p>
                    <div id="rincianHargaContainer"></div>
                    <hr class="mt-3 mb-3">
                    <div class="d-flex justify-content-between w-100">
                        <h5 style="font-weight: bold">Total Harga</h5>
                        <p id="totalHarga" class="mb-0" style="font-weight: bold;">IDR 350.000</p>
                    </div>
                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="#">Lanjut ke Pembayaran</a>
                    <p style="font-size: 15px">Dengan lanjut ke pembayaran, kamu telah menyetujui menyetujui Syarat dan Ketentuan, Kebijakan Privasi, dan Prosedur Refund Akomodasi dari Traveloka.</p>
                </form>
                
                
            </div>
            <div class="box-white col-lg-6 bg-white p-4">
                <p style="font-weight: bold">AMIRA HOTEL BANDUNG</p>
                <img src="{{ asset('img/Kamar_deluxe.jpg') }}"alt="Gambar Deskripsi" class="img-fluid mb-3">
                <h5 style="font-weight: bold;">Deluxe Twin</h5>
                <div class="d-flex flex-column mb-3" style="gap: 10px;">
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="fa fa-bed me-3 fa-lg" style="color: #FEA116"></i>1 Bed
                    </small>
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="bi bi-person-fill me-3 fa-lg" style="color: #FEA116"></i>2 Guests
                    </small>
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="fa fa-wifi me-3 fa-lg" style="color: #FEA116"></i>wifi
                    </small>
                    <small style="display: flex; align-items: center; font-weight: 600;">
                        <i class="fa-solid fa-utensils me-4 fa-lg" style="color: #FEA116"></i>Sarapan
                    </small>
                </div>
                <hr class="mt-3 mb-3">
                <small style="display: flex; align-items: center; font-weight: bold; font-size: 15px">
                    <i class="bi bi-receipt me-3 fa-lg" style="color: #1256b5"></i>
                    Harga Kamar
                    <span style="margin-left: 140px; color: #333; font-size: 18px">IDR 400.000</span>
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

    <!-- Rincian Harga-->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    const baseHarga = 400000; // Harga kamar awal
    let totalHarga = baseHarga;

    const rincianHargaContainer = document.getElementById('rincianHargaContainer');
    const totalHargaElement = document.getElementById('totalHarga');

    // Update rincian harga berdasarkan checkbox yang dipilih
    const updateRincianHarga = () => {
        rincianHargaContainer.innerHTML = ''; // Reset rincian
        totalHarga = baseHarga;

        document.querySelectorAll('.form-check-input:checked').forEach(input => {
            const name = input.getAttribute('data-name');
            const harga = parseInt(input.getAttribute('data-harga'));

            // Tambahkan rincian ke tampilan
            const item = document.createElement('div');
            item.className = 'd-flex justify-content-between';
            item.innerHTML = `
                <p class="mb-0">${name}</p>
                <p class="mb-0" style="font-weight: bold;">IDR ${harga.toLocaleString()}</p>
            `;
            rincianHargaContainer.appendChild(item);

            // Tambahkan ke total harga
            totalHarga += harga;
        });

        // Update total harga di tampilan
        totalHargaElement.textContent = `IDR ${totalHarga.toLocaleString()}`;
    };

    // Tambahkan event listener ke semua checkbox
    document.querySelectorAll('.form-check-input').forEach(input => {
        input.addEventListener('change', updateRincianHarga);
    });

    // Inisialisasi tampilan awal
    updateRincianHarga();
});

</script>
    
</body>
</html>
