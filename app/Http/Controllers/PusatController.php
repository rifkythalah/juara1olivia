<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class PusatController extends Controller
{
    public function create()
    {
        $dinas = Dinas::all();
        return view('Dashboardstlhlogin.Admin.Akun.BuatAkunPusat', compact('dinas'));
    }

    public function store(Request $request)
    {
        Log::info('Attempting to create pusat account', ['request_data' => $request->all()]);

        try {
            $validated = $request->validate([
                'nama_lengkap' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Password::defaults()],
                'nomor_telepon' => ['required', 'string', 'max:15'],
                'latitude' => ['nullable', 'numeric'],
                'longitude' => ['nullable', 'numeric'],
                'dinas' => ['required', 'array', 'min:1'],
                'dinas.*' => ['exists:dinas,id'],
                'nik' => ['nullable', 'prohibited']
            ]);

            Log::info('Validation passed', ['validated_data' => $validated]);

            DB::beginTransaction();

            // Create user
            $user = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nomor_telepon' => $request->nomor_telepon,
                'role' => 'pemerintahpusat',
                'nik' => null
            ]);

            Log::info('User created', ['user_id' => $user->id]);

            // Prepare pivot data
            $pivotData = [];
            foreach ($request->dinas as $dinasId) {
                $dinas = Dinas::find($dinasId);
                $pivotData[$dinasId] = [
                    'username' => $request->username,
                    'nomor_telepon' => $request->nomor_telepon,
                    'email' => $request->email,
                    'wilayah' => $dinas->wilayah,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude
                ];
            }

            // Attach selected dinas with additional data
            $user->dinasPusat()->attach($pivotData);

            Log::info('Dinas attached', ['dinas_ids' => $request->dinas]);

            DB::commit();

            Log::info('Transaction committed successfully');

            return redirect()->route('admin.akun')
                ->with('success', 'Akun pemerintah pusat berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating pusat account', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function laporanBelumRespon()
    {
        $laporans = \App\Models\LaporanPengaduan::where('escalated_to_pusat', true)
            ->where('status', 'Menunggu')
            ->get();

        return view('Dashboardstlhlogin.pemerintahpusat.laporan-pusat', compact('laporans'));
    }

    public function laporanPusat()
    {
        $trackingIds = \App\Models\TrackingLaporan::where('escalated_to_pusat', 1)
            ->where('status', 'Tidak Terselesaikan')
            ->pluck('pengaduan_id');
        $laporans = \App\Models\LaporanPengaduan::whereIn('id', $trackingIds)->get();
        return view('Dashboardstlhlogin.pemerintahpusat.laporan-pusat', compact('laporans'));
    }
} 