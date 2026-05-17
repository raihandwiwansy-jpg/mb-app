<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran - Simphony Al Washliyah 2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-gray-100 font-sans min-h-screen flex flex-col justify-between selection:bg-amber-500 selection:text-black relative overflow-x-hidden">

    <div class="absolute inset-0 w-full h-full overflow-hidden -z-10 pointer-events-none fixed">
        <div class="absolute inset-0 bg-black/70 md:bg-black/65 z-10"></div>
        <img src="{{ asset('img/foto.jpg') }}" alt="Background Simphony MB" class="w-full h-full object-cover">
    </div>

    <header class="bg-gray-950/40 backdrop-blur-md sticky top-0 z-50 py-4 border-b border-gray-800/40 shadow-lg">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">

            <div class="flex items-center gap-2 md:gap-3">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo Simphony MB" class="h-7 w-7 md:h-9 md:w-9 object-contain rounded-full shadow-md">

                <h1 class="text-base md:text-xl font-black text-amber-500 tracking-widest uppercase leading-none">
                    SIMPHONY <span class="text-white font-light">MB</span>
                </h1>
            </div>

            <a href="{{ route('login') }}" class="text-xs md:text-sm font-medium text-gray-300 hover:text-amber-400 border border-gray-700/50 hover:border-amber-500/30 px-3 py-1.5 rounded-lg transition duration-300 bg-gray-950/30">
                Portal Admin
            </a>
        </div>
    </header>

    <main class="max-w-sm sm:max-w-xl md:max-w-2xl mx-auto px-4 py-8 w-full flex-grow flex flex-col items-center justify-center z-20">

        @if(session('success'))
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="w-full bg-emerald-950/80 border border-emerald-500/40 text-emerald-300 p-4 rounded-xl mb-5 flex items-start justify-between shadow-xl backdrop-blur-md">
                <div class="flex gap-2.5">
                    <span class="text-base mt-0.5">✨</span>
                    <p class="text-xs md:text-sm font-medium leading-relaxed">
                        {{ session('success') }}
                    </p>
                </div>
                <button @click="show = false" class="text-emerald-400 hover:text-emerald-200 transition duration-150 p-1 rounded-lg hover:bg-emerald-900/40 ml-2 focus:outline-none cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        <div class="bg-gray-900/75 md:bg-gray-900/80 border border-gray-800/80 rounded-2xl p-5 md:p-8 shadow-2xl w-full backdrop-blur-lg">

            <div class="text-center mb-8">
                <span class="text-[10px] uppercase font-bold tracking-widest text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full border border-amber-500/20">
                    Penerimaan Anggota Baru
                </span>
                <h2 class="text-xl md:text-3xl font-black text-white tracking-tight mt-3 mb-1">
                    FORM PENDAFTARAN
                </h2>
                <p class="text-[11px] md:text-sm text-gray-300 font-medium p-1">
                    Marching Band Simphony Al Washliyah 2 Perdagangan
                </p>
            </div>

            <form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Nama Lengkap <span class="text-amber-500">*</span></label>
                        <input type="text" name="nama" required placeholder="Contoh: Raihan" class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 placeholder:text-gray-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Jenis Kelamin <span class="text-amber-500">*</span></label>
                        <select name="jenis_kelamin" required class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300 cursor-pointer">
                            <option value="" class="bg-gray-950">-- Pilih --</option>
                            <option value="Laki-laki" class="bg-gray-950">Laki-laki</option>
                            <option value="Perempuan" class="bg-gray-950">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Asal Sekolah <span class="text-amber-500">*</span></label>
                        <input type="text" name="asal_sekolah" required placeholder="Nama sekolah kamu" class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 placeholder:text-gray-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">No. Telp (WhatsApp) <span class="text-amber-500">*</span></label>
                        <input type="tel" name="no_telp" required placeholder="08xxxxxxxxxx" class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 placeholder:text-gray-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300 font-mono">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Alamat Rumah <span class="text-amber-500">*</span></label>
                    <textarea name="alamat" rows="2" required placeholder="Tuliskan alamat lengkap tempat tinggalmu..." class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 placeholder:text-gray-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300 resize-none"></textarea>
                </div>

                <div class="relative py-2">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-800/60"></div>
                    </div>
                </div>

                <div class="bg-gray-950/60 border border-gray-800/80 rounded-xl p-4 md:p-5 space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-200 mb-2.5">Apakah kamu sebelumnya sudah pernah ikut drumband / marching band? <span class="text-amber-500">*</span></label>
                        <div class="flex space-x-6">
                            <label class="inline-flex items-center text-gray-300 text-sm cursor-pointer group">
                                <input type="radio" name="pernah_ikut" value="Ya" required class="w-4 h-4 text-amber-500 focus:ring-amber-500/20 bg-gray-900 border-gray-700 cursor-pointer transition">
                                <span class="ml-2 group-hover:text-amber-400 transition duration-200">Ya</span>
                            </label>
                            <label class="inline-flex items-center text-gray-300 text-sm cursor-pointer group">
                                <input type="radio" name="pernah_ikut" value="Toggle" class="w-4 h-4 text-amber-500 focus:ring-amber-500/20 bg-gray-900 border-gray-700 cursor-pointer transition">
                                <span class="ml-2 group-hover:text-amber-400 transition duration-200">Tidak</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2.5">Pilih Alat Musik / Divisi (Bisa centang satu atau lebih):</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                            @foreach(['Snare', 'Quartom', 'Bellira', 'Cymbal', 'Color Guard', 'Pianika', 'Trumpet', 'Bass', 'Tenor'] as $alat)
                                <label class="inline-flex items-center text-gray-300 text-xs font-medium bg-gray-950/50 px-3 py-2.5 border border-gray-800 rounded-xl hover:border-amber-500/30 hover:bg-gray-900/50 transition duration-200 cursor-pointer select-none has-[:checked]:border-amber-500/40 has-[:checked]:bg-amber-500/[0.04]">
                                    <input type="checkbox" name="opsi_alat[]" value="{{ $alat }}" class="rounded w-3.5 h-3.5 text-amber-500 focus:ring-amber-500/20 bg-gray-900 border-gray-700 cursor-pointer transition">
                                    <span class="ml-2.5 tracking-wide">{{ $alat }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-gray-950/60 border border-gray-800/80 rounded-xl p-4 md:p-5">
                    <label class="block text-sm font-semibold text-gray-200 mb-2.5">Apakah kamu bersedia jika latihan dilaksanakan 2 hari? (Jumat sore & Sabtu pagi) <span class="text-amber-500">*</span></label>
                    <div class="flex space-x-6">
                        <label class="inline-flex items-center text-gray-300 text-sm cursor-pointer group">
                            <input type="radio" name="bersedia_latihan" value="Ya" required class="w-4 h-4 text-amber-500 focus:ring-amber-500/20 bg-gray-900 border-gray-700 cursor-pointer transition">
                            <span class="ml-2 group-hover:text-amber-400 transition duration-200">Ya, Bersedia</span>
                        </label>
                        <label class="inline-flex items-center text-gray-300 text-sm cursor-pointer group">
                            <input type="radio" name="bersedia_latihan" value="Tidak" class="w-4 h-4 text-amber-500 focus:ring-amber-500/20 bg-gray-900 border-gray-700 cursor-pointer transition">
                            <span class="ml-2 group-hover:text-amber-400 transition duration-200">Tidak</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Kesan di Ekstrakurikuler Sebelumnya</label>
                    <textarea name="kesan_sebelumnya" rows="2" placeholder="Ceritakan singkat kesanmu (Boleh dikosongkan jika belum pernah)..." class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 placeholder:text-gray-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300 resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Alasan Ingin Bergabung <span class="text-amber-500">*</span></label>
                    <textarea name="alasan_bergabung" rows="2" required placeholder="Tuliskan motivasimu bergabung dengan Simphony MB..." class="w-full bg-gray-950/80 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-gray-100 placeholder:text-gray-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 outline-none transition duration-300 resize-none"></textarea>
                </div>

                <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-black font-extrabold py-3.5 px-4 rounded-xl shadow-lg shadow-amber-500/5 hover:shadow-amber-500/10 active:scale-[0.99] transition duration-200 text-center uppercase text-xs tracking-widest mt-2">
                    Kirim Pendaftaran
                </button>
            </form>

        </div>
    </main>

    <footer class="bg-gray-950/40 backdrop-blur-md text-center py-4 text-gray-500 text-[10px] md:text-xs border-t border-gray-900/60 tracking-wider z-20">
        <p>&copy; 2026 Simphony Al Washliyah 2 Perdagangan. All Rights Reserved.</p>
    </footer>

</body>
</html>
