<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Sampah - Bank Sampah</title>

    <link rel="stylesheet" href="{{ asset('input_sampah.css') }}">
</head>

<body>

<div class="app">

    @include('partials.nav')
    @include('partials.header')

    <main class="main-content">

        <div class="page-header">
            <div>
                <h1>Input Transaksi Sampah</h1>
                <p class="subtitle">
                    Catat setoran sampah nasabah secara real-time untuk pembaruan saldo instan.
                </p>
            </div>
        </div>

        <div class="input-layout">

            <div>

                {{-- Form Identitas Nasabah --}}
                <div class="card form-card">
                    <h3>👤 Identitas Nasabah</h3>

                    <div class="form-row">

                        {{-- Pilih Nasabah (Bisa diketik mencari lewat Nama atau ID) --}}
                        <div class="field">
                            <label for="search-nasabah">Pilih Nasabah</label>

                            <div class="nasabah-select-container">
                                <div class="nasabah-input-wrap">
                                    <input 
                                        type="text" 
                                        id="search-nasabah" 
                                        class="nasabah-search-input" 
                                        placeholder="🔍 Ketik nama atau ID nasabah..." 
                                        autocomplete="off"
                                    >
                                    <button type="button" id="clear-nasabah-btn" class="clear-nasabah-btn" title="Hapus pilihan" style="display: none;">&times;</button>
                                </div>

                                <input type="hidden" name="id_nasabah" id="selected-id-nasabah" value="">

                                {{-- Dropdown Hasil Pencarian --}}
                                <div class="nasabah-dropdown" id="nasabah-dropdown" style="display: none;">
                                    @if(isset($nasabah) && $nasabah->count() > 0)
                                        <div class="nasabah-dropdown-header">
                                            Nasabah Terdaftar ({{ $nasabah->count() }})
                                        </div>
                                        <div class="nasabah-options-list" id="nasabah-options-list">
                                            @foreach($nasabah as $n)
                                                <div class="nasabah-option-item" 
                                                     data-id="{{ $n->id_nasabah }}" 
                                                     data-nama="{{ strtolower($n->nama) }}" 
                                                     data-display="{{ $n->nama }}"
                                                     data-telp="{{ $n->no_telp ?? '' }}"
                                                     onclick="pilihNasabah('{{ $n->id_nasabah }}', '{{ addslashes($n->nama) }}', '{{ $n->no_telp ?? '' }}')">
                                                    <div class="nasabah-info-left">
                                                        <span class="nasabah-id-badge">ID: {{ $n->id_nasabah }}</span>
                                                        <span class="nasabah-name">{{ $n->nama }}</span>
                                                    </div>
                                                    <div class="nasabah-info-right">
                                                        @if($n->no_telp)
                                                            <span class="nasabah-telp">📞 {{ $n->no_telp }}</span>
                                                        @endif
                                                        <span class="nasabah-status {{ $n->status == 'aktif' ? 'status-active' : 'status-inactive' }}">
                                                            {{ ucfirst($n->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div id="nasabah-not-found" class="nasabah-empty-msg" style="display: none;">
                                            Nasabah tidak ditemukan dengan kata kunci tersebut.
                                        </div>
                                    @else
                                        <div class="nasabah-empty-msg">
                                            Belum ada data nasabah di database (0)
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="tanggal-transaksi">Tanggal Transaksi</label>
                            <input type="date" id="tanggal-transaksi" value="{{ date('Y-m-d') }}">
                        </div>

                    </div>
                </div>

                {{-- Form Rincian Sampah --}}
                <div class="card form-card">

                    <div class="rincian-header">
                        <h3>♻️ Rincian Sampah</h3>

                        <a href="#" class="add-row-link" onclick="tambahBaris(event)">
                            ＋ Tambah Baris
                        </a>
                    </div>

                    <div id="rincian-list">

                        <div class="rincian-row">

                            <div class="field">
                                <label>Jenis Sampah</label>

                                <select class="jenis-sampah-select" onchange="hitungSubtotal(this)">
                                    <option value="">Pilih Jenis</option>
                                    <option value="2500">Plastik PET (Rp 2.500 / kg)</option>
                                    <option value="3000">Kertas/Kardus (Rp 3.000 / kg)</option>
                                    <option value="5000">Aluminium (Rp 5.000 / kg)</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Berat (kg)</label>

                                <input
                                    type="number"
                                    step="0.1"
                                    min="0"
                                    placeholder="0.0"
                                    class="berat-input"
                                    oninput="hitungSubtotal(this)"
                                >
                            </div>

                            <div class="subtotal subtotal-box">
                                <span>Subtotal</span>
                                <strong class="subtotal-val">Rp 0</strong>
                            </div>

                            <button class="delete-row delete-row-btn" type="button" onclick="hapusBaris(this)" title="Hapus baris">
                                🗑️
                            </button>

                        </div>

                    </div>

                    <div class="field notes-field" style="margin-top:20px">
                        <textarea placeholder="Catatan transaksi (opsional)..."></textarea>
                    </div>

                </div>

            </div>

            <div>

                {{-- Preview Nilai Tabungan --}}
                <div class="preview-card">

                    <div class="preview-label">Preview Nilai Tabungan</div>

                    <div class="preview-total" id="preview-total-display">
                        Rp 0
                    </div>

                    <hr class="preview-divider">

                    <div class="preview-row">
                        <span>Total Berat</span>
                        <strong id="preview-total-berat">0.0 kg</strong>
                    </div>

                    <div class="preview-row">
                        <span>Admin Fee (0%)</span>
                        <strong>Rp 0</strong>
                    </div>

                    <div class="preview-row total-masuk">
                        <span>Total Masuk</span>
                        <strong id="preview-total-masuk">Rp 0</strong>
                    </div>

                </div>

                <button class="btn-confirm" type="button" onclick="konfirmasiTransaksi()">
                    Konfirmasi Transaksi
                </button>

                <button class="btn-print" type="button" onclick="window.print()">
                    Cetak Bukti
                </button>

                <p class="wa-note">
                    Sistem akan secara otomatis mengirimkan notifikasi WhatsApp ke Nasabah setelah konfirmasi.
                </p>

                <div class="card price-info-card">

                    <div class="title">Informasi Harga Sampah</div>

                    <div class="price-row">
                        <span>Plastik PET</span>
                        <span class="val">Rp 2.500 / kg</span>
                    </div>

                    <div class="price-row">
                        <span>Kertas/Kardus</span>
                        <span class="val">Rp 3.000 / kg</span>
                    </div>

                    <div class="price-row">
                        <span>Aluminium</span>
                        <span class="val">Rp 5.000 / kg</span>
                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

<script>
// ==========================================
// 1. PENCARIAN & PEMILIHAN NASABAH (NAMA / ID)
// ==========================================
const searchInput = document.getElementById('search-nasabah');
const dropdown = document.getElementById('nasabah-dropdown');
const clearBtn = document.getElementById('clear-nasabah-btn');
const hiddenId = document.getElementById('selected-id-nasabah');
const optionItems = document.querySelectorAll('.nasabah-option-item');
const notFoundMsg = document.getElementById('nasabah-not-found');

if (searchInput) {
    searchInput.addEventListener('focus', function() {
        filterNasabah();
        dropdown.style.display = 'block';
    });

    searchInput.addEventListener('click', function() {
        filterNasabah();
        dropdown.style.display = 'block';
    });

    searchInput.addEventListener('input', function() {
        filterNasabah();
        dropdown.style.display = 'block';
        if (this.value.trim() !== '') {
            clearBtn.style.display = 'flex';
        } else {
            clearBtn.style.display = 'none';
            hiddenId.value = '';
        }
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nasabah-select-container')) {
            if (dropdown) dropdown.style.display = 'none';
        }
    });

    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            hiddenId.value = '';
            clearBtn.style.display = 'none';
            filterNasabah();
            searchInput.focus();
        });
    }
}

function filterNasabah() {
    if (!searchInput) return;
    const query = searchInput.value.toLowerCase().trim();
    let hasMatch = false;

    optionItems.forEach(item => {
        const id = (item.getAttribute('data-id') || '').toLowerCase();
        const nama = (item.getAttribute('data-nama') || '').toLowerCase();
        const telp = (item.getAttribute('data-telp') || '').toLowerCase();

        // Cari berdasarkan ID atau Nama atau No Telp
        if (!query || id.includes(query) || nama.includes(query) || telp.includes(query)) {
            item.style.display = 'flex';
            hasMatch = true;
        } else {
            item.style.display = 'none';
        }
    });

    if (notFoundMsg) {
        notFoundMsg.style.display = (!hasMatch && query !== '') ? 'block' : 'none';
    }
}

function pilihNasabah(id, nama, telp) {
    searchInput.value = `[ID: ${id}] ${nama}`;
    hiddenId.value = id;
    if (clearBtn) clearBtn.style.display = 'flex';
    if (dropdown) dropdown.style.display = 'none';

    optionItems.forEach(item => {
        if (item.getAttribute('data-id') === String(id)) {
            item.classList.add('selected');
        } else {
            item.classList.remove('selected');
        }
    });
}

// ==========================================
// 2. RINCIAN SAMPAH: TAMBAH & HAPUS BARIS
// ==========================================
function tambahBaris(e) {
    if (e) e.preventDefault();

    const list = document.getElementById('rincian-list');
    const rows = list.querySelectorAll('.rincian-row');
    if (rows.length === 0) return;

    // Duplikasi baris pertama
    const newRow = rows[0].cloneNode(true);

    // Reset input pada baris baru
    const beratInput = newRow.querySelector('.berat-input');
    if (beratInput) beratInput.value = '';

    const jenisSelect = newRow.querySelector('.jenis-sampah-select');
    if (jenisSelect) jenisSelect.selectedIndex = 0;

    const subtotalVal = newRow.querySelector('.subtotal-val');
    if (subtotalVal) subtotalVal.innerText = 'Rp 0';

    // Tambahkan baris baru ke rincian-list
    list.appendChild(newRow);
}

function hapusBaris(btn) {
    const list = document.getElementById('rincian-list');
    const rows = list.querySelectorAll('.rincian-row');
    const row = btn.closest('.rincian-row');

    if (rows.length > 1) {
        row.remove();
    } else {
        // Jika tersisa 1 baris, reset isinya agar form tidak hilang
        const beratInput = row.querySelector('.berat-input');
        if (beratInput) beratInput.value = '';

        const jenisSelect = row.querySelector('.jenis-sampah-select');
        if (jenisSelect) jenisSelect.selectedIndex = 0;

        const subtotalVal = row.querySelector('.subtotal-val');
        if (subtotalVal) subtotalVal.innerText = 'Rp 0';
    }

    hitungSemua();
}

// Event Delegation untuk tombol hapus
document.getElementById('rincian-list').addEventListener('click', function(e) {
    const deleteBtn = e.target.closest('.delete-row, .delete-row-btn');
    if (deleteBtn) {
        hapusBaris(deleteBtn);
    }
});

// ==========================================
// 3. PERHITUNGAN SUBTOTAL & TOTAL
// ==========================================
function formatRupiah(angka) {
    return 'Rp ' + Number(angka).toLocaleString('id-ID');
}

function hitungSubtotal(element) {
    const row = element.closest('.rincian-row');
    if (!row) return;

    const select = row.querySelector('.jenis-sampah-select');
    const beratInput = row.querySelector('.berat-input');
    const subtotalEl = row.querySelector('.subtotal-val');

    const harga = parseFloat(select.value) || 0;
    const berat = parseFloat(beratInput.value) || 0;
    const subtotal = Math.round(harga * berat);

    if (subtotalEl) {
        subtotalEl.innerText = formatRupiah(subtotal);
    }

    hitungSemua();
}

function hitungSemua() {
    const list = document.getElementById('rincian-list');
    const rows = list.querySelectorAll('.rincian-row');

    let totalBerat = 0;
    let totalHarga = 0;

    rows.forEach(row => {
        const select = row.querySelector('.jenis-sampah-select');
        const beratInput = row.querySelector('.berat-input');

        const harga = parseFloat(select.value) || 0;
        const berat = parseFloat(beratInput.value) || 0;

        totalBerat += berat;
        totalHarga += (harga * berat);
    });

    const totalDisplay = document.getElementById('preview-total-display');
    const totalBeratDisplay = document.getElementById('preview-total-berat');
    const totalMasukDisplay = document.getElementById('preview-total-masuk');

    if (totalDisplay) totalDisplay.innerText = formatRupiah(Math.round(totalHarga));
    if (totalBeratDisplay) totalBeratDisplay.innerText = totalBerat.toFixed(1) + ' kg';
    if (totalMasukDisplay) totalMasukDisplay.innerText = formatRupiah(Math.round(totalHarga));
}

function konfirmasiTransaksi() {
    const idNasabah = hiddenId.value;
    const searchVal = searchInput.value.trim();

    if (!idNasabah && !searchVal) {
        alert('Silakan pilih atau cari nasabah terlebih dahulu!');
        searchInput.focus();
        return;
    }

    alert('Transaksi berhasil dikonfirmasi!');
}
</script>

</body>
</html>