document.getElementById("validationForm").addEventListener("submit", function (event) {
    event.preventDefault();
    
    const formData = {
        nama_depan: document.getElementById("firstName").value,
        nama_belakang: document.getElementById("lastName").value,
        nomor_handphone: document.getElementById("NoHandphone").value,
        email: document.getElementById("email").value,
        total_harga: parseFloat(document.getElementById("totalHarga").textContent.replace('IDR ', '').replace(',', '')),
        _token: document.querySelector('input[name="_token"]').value,
    };

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
            }
        })
        .catch((error) => console.error('Error:', error));
});
