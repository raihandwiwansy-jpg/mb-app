<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-500 leading-tight">
            {{ __('Data Pendaftar Simphony') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-500 dark:text-gray-100">
                        Daftar Anggota Baru Terdaftar
                    </h3>
                </div>

                @if(session('success'))
                    <div id="alert-notification" class="flex items-center justify-between p-4 mb-6 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-900 dark:text-green-400 dark:border-green-800 shadow-md transition-all duration-500 ease-in-out" role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 inline w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Sukses</span>
                            <div>
                                <span class="font-bold">Berhasil!</span> {{ session('success') }}
                            </div>
                        </div>
                        <button type="button" onclick="closeAlert()" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-900 dark:text-green-400 dark:hover:bg-gray-800" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="overflow-x-auto w-full border border-gray-200 dark:border-gray-700 rounded-lg shadow-inner">
                    <table class="w-full min-w-[1000px] text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3 text-center w-12">#</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Sekolah</th>
                                <th class="px-4 py-3">No. HP</th>
                                <th class="px-4 py-3 text-center">Pernah Ikut</th>
                                <th class="px-4 py-3">Pilihan Alat</th>
                                <th class="px-4 py-3 text-center">Latihan</th>
                                <th class="px-4 py-3">Alasan</th>
                                <th class="px-4 py-3 text-center w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($pendaftar as $p)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-4 py-3 text-center font-medium text-gray-600 dark:text-gray-400">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">
                                    {{ $p->nama }} <span class="text-xs font-normal text-gray-400 dark:text-gray-500">({{ $p->jenis_kelamin }})</span>
                                </td>
                                <td class="px-4 py-3">{{ $p->asal_sekolah }}</td>
                                <td class="px-4 py-3 text-amber-600 dark:text-amber-400 font-mono">
                                    {{ $p->no_telp }}
                                </td>
                                <td class="px-4 py-3 text-center">{{ $p->pernah_ikut }}</td>
                                <td class="px-4 py-3">
                                    @if($p->opsi_alat)
                                        <div class="flex flex-wrap gap-1">
                                            @foreach(json_decode($p->opsi_alat) as $alat)
                                                <span class="inline-block bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 text-xs px-2 py-0.5 rounded font-medium">
                                                    {{ $alat }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-600">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">{{ $p->bersedia_latihan }}</td>
                                <td class="px-4 py-3 max-w-xs truncate" title="{{ $p->alasan_bergabung }}">
                                    {{ $p->alasan_bergabung }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <form action="{{ route('pendaftaran.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data {{ $p->nama }} secara permanen, Bray?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 font-semibold text-xs bg-red-50 dark:bg-red-950/30 px-2 py-1 rounded border border-red-200 dark:border-red-900 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-gray-400 dark:text-gray-500 font-medium">
                                    Belum ada pendaftar yang masuk ke database.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menutup manual jika tombol silang diklik
        function closeAlert() {
            const alertElement = document.getElementById('alert-notification');
            if (alertElement) {
                alertElement.style.opacity = '0';
                setTimeout(() => {
                    alertElement.remove();
                }, 500); // Sinkronisasi waktu dengan animasi fade-out
            }
        }

        // Fitur Auto-Fade Out: Menghilang otomatis setelah 4 detik
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('alert-notification');
            if (alertElement) {
                setTimeout(() => {
                    alertElement.style.opacity = '0';
                    setTimeout(() => {
                        alertElement.remove();
                    }, 500);
                }, 4000); // 4000ms = 4 detik
            }
        });
    </script>
</x-app-layout>
