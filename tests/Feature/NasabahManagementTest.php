<?php

namespace Tests\Feature;

use App\Models\Nasabah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NasabahManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_and_nasabah_pages_link_to_valid_routes(): void
    {
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee('href="'.route('dashboard').'"', false)
            ->assertSee('href="'.route('nasabah.index').'"', false)
            ->assertSee('href="'.route('input_sampah').'"', false);

        $this->get(route('nasabah.index'))
            ->assertOk()
            ->assertSee('href="'.route('dashboard').'"', false)
            ->assertSee('href="'.route('input_sampah').'"', false);
    }

    public function test_input_sampah_page_and_legacy_link_are_available(): void
    {
        $this->get(route('input_sampah'))
            ->assertOk()
            ->assertSee('Input Transaksi Sampah');

        $this->get('/input-sampah.html')
            ->assertRedirect(route('input_sampah'));
    }

    public function test_nasabah_details_can_be_updated(): void
    {
        $nasabah = Nasabah::create([
            'nama' => 'Nasabah Lama',
            'no_telp' => '08123456789',
            'alamat' => 'Alamat lama',
            'status' => 'aktif',
        ]);

        $this->put(route('nasabah.update', $nasabah->id_nasabah), [
            'nama' => 'Nasabah Baru',
            'no_telp' => '08987654321',
            'alamat' => 'Alamat baru',
            'status' => 'tidak_aktif',
        ])
            ->assertRedirect(route('nasabah.index'))
            ->assertSessionHas('success', 'Data nasabah berhasil diperbarui!');

        $this->assertDatabaseHas('nasabah', [
            'id_nasabah' => $nasabah->id_nasabah,
            'nama' => 'Nasabah Baru',
            'no_telp' => '08987654321',
            'alamat' => 'Alamat baru',
            'status' => 'tidak_aktif',
        ]);
    }

    public function test_invalid_nasabah_updates_are_rejected(): void
    {
        $nasabah = Nasabah::create([
            'nama' => 'Nasabah Lama',
            'no_telp' => '08123456789',
            'alamat' => 'Alamat lama',
            'status' => 'aktif',
        ]);

        $this->from(route('nasabah.index'))
            ->put(route('nasabah.update', $nasabah->id_nasabah), [
                'editing_nasabah_id' => $nasabah->id_nasabah,
                'nama' => '',
                'no_telp' => '08987654321',
                'alamat' => 'Alamat baru',
                'status' => 'status_tidak_valid',
            ])
            ->assertRedirect(route('nasabah.index'))
            ->assertSessionHasErrors(['nama', 'status'])
            ->assertSessionHasInput('editing_nasabah_id', $nasabah->id_nasabah);

        $this->get(route('nasabah.index'))
            ->assertOk()
            ->assertSee("document.getElementById('modalEdit-{$nasabah->id_nasabah}')", false);

        $this->assertDatabaseHas('nasabah', [
            'id_nasabah' => $nasabah->id_nasabah,
            'nama' => 'Nasabah Lama',
        ]);
    }
}
