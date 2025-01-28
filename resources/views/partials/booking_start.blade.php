<form method="GET" action="{{ route('search.rooms') }}">
    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow" style="padding: 35px;">
                <div class="row g-2">
                    <!-- Check-in Date -->
                    <div class="col-md-3">
                        <div class="date" id="date1" data-target-input="nearest">
                            <h6>Tanggal Check-in</h6>
                            <input 
                                type="date"
                                class="form-control datetimepicker-input @error('check_in') is-invalid @enderror" 
                                name="check_in" 
                                placeholder="Pilih Tanggal Check-in" 
                                value="{{ old('check_in') }}" 
                                required
                            />
                            @error('check_in')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Check-out Date -->
                    <div class="col-md-3">
                        <div class="date" id="date2" data-target-input="nearest">
                            <h6>Tanggal Check-out</h6>
                            <input 
                                type="date" 
                                class="form-control datetimepicker-input @error('check_out') is-invalid @enderror" 
                                name="check_out" 
                                placeholder="Pilih Tanggal Check-out" 
                                value="{{ old('check_out') }}" 
                                required
                            />
                            @error('check_out')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Adult Count -->
                    <div class="col-md-3">
                        <h6>Jumlah Orang Dewasa</h6>
                        <select 
                            class="form-select @error('adults') is-invalid @enderror" 
                            name="adults" 
                            required
                        >
                            <option disabled selected>Dewasa</option>
                            <option value="1" {{ old('adults') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('adults') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('adults') == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('adults') == 4 ? 'selected' : '' }}>4</option>
                        </select>
                        @error('adults')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Child Count -->
                    <div class="col-md-3">
                        <h6>Jumlah Anak</h6>
                        <select 
                            id="children-count" 
                            class="form-select @error('children') is-invalid @enderror" 
                            name="children" 
                            required
                        >
                            <option disabled selected>Anak</option>
                            <option value="0" {{ old('children') == 0 ? 'selected' : '' }}>0</option>
                            <option value="1" {{ old('children') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('children') == 2 ? 'selected' : '' }}>2</option>
                        </select>
                        @error('children')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Age of Children -->
                <div id="children-ages-container" class="row g-2 mt-3"></div>

                <!-- Submit Button -->
                <div class="row g-2 mt-3">
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Cari Kamar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const childrenCountSelect = document.getElementById('children-count');
        const childrenAgesContainer = document.getElementById('children-ages-container');
        const form = document.querySelector('form');

        // Dynamically add child age inputs
        childrenCountSelect.addEventListener('change', function () {
            const childrenCount = parseInt(this.value, 10);
            childrenAgesContainer.innerHTML = ''; // Clear existing inputs

            if (childrenCount > 0) {
                for (let i = 1; i <= childrenCount; i++) {
                    const col = document.createElement('div');
                    col.classList.add('col-md-3');
                    col.innerHTML = `
                        <h6>Umur Anak ${i}</h6>
                        <select 
                            class="form-select child-age" 
                            name="children_ages[]" 
                            required
                        >
                            <option value="" disabled selected>Pilih Umur</option>
                            ${Array.from({ length: 11 }, (_, idx) => `<option value="${idx + 1}">${idx + 1}</option>`).join('')}
                        </select>
                        <div class="invalid-feedback">Umur anak diperlukan.</div>
                    `;
                    childrenAgesContainer.appendChild(col);
                }
            }
        });

        // Validate child ages on form submission
        form.addEventListener('submit', function (e) {
            let isValid = true;
            const childAgeInputs = document.querySelectorAll('.child-age');

            childAgeInputs.forEach((input) => {
                if (!input.value) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault(); // Prevent form submission if invalid
                alert('Harap isi semua umur anak.');
            }
        });
    });
</script>

