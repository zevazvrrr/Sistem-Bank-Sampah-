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

                <div class="card form-card">
                    <h3>👤 Identitas Nasabah</h3>

                    <div class="form-row">

                        <div class="field">
                            <label>Pilih Nasabah</label>

                            <select>
                                <option>-- Cari Nama atau ID --</option>
                                <option>Ahmad Hidayat</option>
                                <option>Siti Aminah</option>
                                <option>Budi Santoso</option>
                            </select>
                        </div>

                        <div class="field">
                            <label>Tanggal Transaksi</label>
                            <input type="date">
                        </div>

                    </div>
                </div>

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

                                <select>
                                    <option>Pilih Jenis</option>
                                    <option>Plastik PET</option>
                                    <option>Kertas/Kardus</option>
                                    <option>Aluminium</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Berat (kg)</label>

                                <input
                                    type="number"
                                    step="0.1"
                                    placeholder="0.0"
                                >
                            </div>

                            <div class="subtotal">
                                <span>Subtotal</span>
                                <strong>Rp 0</strong>
                            </div>

                            <button class="delete-row" type="button">
                                🗑️
                            </button>

                        </div>

                        <div class="rincian-row">

                            <div class="field">
                                <label>Jenis Sampah</label>

                                <select>
                                    <option>Pilih Jenis</option>
                                    <option>Plastik PET</option>
                                    <option>Kertas/Kardus</option>
                                    <option>Aluminium</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Berat (kg)</label>

                                <input
                                    type="number"
                                    step="0.1"
                                    placeholder="0.0"
                                >
                            </div>

                            <div class="subtotal">
                                <span>Subtotal</span>
                                <strong>Rp 0</strong>
                            </div>

                            <button class="delete-row" type="button">
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

                <div class="preview-card">

                    <h3>Preview Nilai Tabungan</h3>

                    <div class="preview-total">
                        Rp 0
                    </div>

                    <div class="preview-item">
                        <span>Total Berat</span>
                        <strong>0.0 kg</strong>
                    </div>

                    <div class="preview-item">
                        <span>Admin Fee (0%)</span>
                        <strong>Rp 0</strong>
                    </div>

                    <div class="preview-item">
                        <span>Total Masuk</span>
                        <strong>Rp 0</strong>
                    </div>

                </div>

                <button class="btn-confirm">
                    Konfirmasi Transaksi
                </button>

                <button class="btn-print">
                    Cetak Bukti
                </button>

                <p class="wa-note">
                    Sistem akan secara otomatis mengirimkan notifikasi WhatsApp ke Nasabah setelah konfirmasi.
                </p>

                <div class="card price-info-card">

                    <h3>Informasi Harga</h3>

                    <div class="price-item">
                        <span>Plastik PET</span>
                        <strong>Rp 2.500 / kg</strong>
                    </div>

                    <div class="price-item">
                        <span>Kertas/Kardus</span>
                        <strong>Rp 3.000 / kg</strong>
                    </div>

                    <div class="price-item">
                        <span>Aluminium</span>
                        <strong>Rp 5.000 / kg</strong>
                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

<script>
function tambahBaris(e) {
    e.preventDefault();

    const list = document.getElementById('rincian-list');
    const row = list.children[0].cloneNode(true);

    row.querySelectorAll('input').forEach(i => i.value = '');
    row.querySelector('select').selectedIndex = 0;

    list.appendChild(row);
}
</script>

</body>
</html>