<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $attributes->get('title', 'Masuk') }} — PINJAM-IN</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo_pinjam_in_kotak_perkakas_hijau_senada.svg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans bg-white" x-data>
    <main class="min-h-screen lg:grid lg:grid-cols-[1.05fr_1fr]">
        {{-- Panel branding: penuh di desktop, header tipis di HP --}}
        <aside class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 px-5 py-5 text-white sm:px-8 lg:flex lg:flex-col lg:justify-between lg:p-12">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-60"
                 style="background-image: radial-gradient(rgba(255,255,255,.16) 1px, transparent 1px); background-size: 18px 18px;"></div>
            <div aria-hidden="true" class="pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full bg-emerald-500/30 blur-3xl"></div>
            <div aria-hidden="true" class="pointer-events-none absolute -bottom-32 -right-16 h-80 w-80 rounded-full bg-lime-300/20 blur-3xl"></div>
            <div aria-hidden="true" class="pointer-events-none absolute -bottom-28 -right-28 hidden h-[26rem] w-[26rem] rounded-full border border-white/10 lg:block"></div>
            <div aria-hidden="true" class="pointer-events-none absolute -bottom-10 -right-10 hidden h-72 w-72 rounded-full border border-white/10 lg:block"></div>

            <div class="relative">
                <h1 class="sr-only">PINJAM-IN</h1>
                <x-logo color="light" class="h-10 w-10 sm:h-11 sm:w-11" />

                <p class="mt-8 hidden max-w-sm text-2xl font-bold leading-snug tracking-tight lg:block">
                    Pinjam alat sekolah, tanpa antre di ruang sarpras.
                </p>
                <p class="mt-3 hidden max-w-sm text-sm leading-relaxed text-emerald-100 lg:block">
                    Peminjaman alat, tercatat dari awal hingga kembali.
                </p>

                <ul class="mt-8 hidden space-y-4 text-sm text-emerald-50 lg:block">
                    @foreach ([
                        'Ajukan peminjaman dalam hitungan menit',
                        'Ketersediaan alat terlihat real-time per tanggal',
                        'Riwayat, pengingat, dan bukti peminjaman otomatis',
                    ] as $point)
                        <li class="flex items-start gap-3">
                            <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-300">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="relative mt-10 hidden lg:block">
                <ol class="grid grid-cols-3 gap-3">
                    @foreach ([
                        ['Ajukan', 'Pilih alat, tanggal, dan keperluan.'],
                        ['Verifikasi', 'Petugas sarpras menyetujui pengajuan.'],
                        ['Ambil & kembali', 'Serah terima dan bukti tercatat otomatis.'],
                    ] as $i => [$step, $desc])
                        <li class="rounded-xl bg-white/5 p-4 ring-1 ring-white/10">
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-400/20 text-xs font-bold text-emerald-200">{{ $i + 1 }}</span>
                            <p class="mt-3 text-sm font-semibold text-white">{{ $step }}</p>
                            <p class="mt-1 text-xs leading-relaxed text-emerald-100/80">{{ $desc }}</p>
                        </li>
                    @endforeach
                </ol>

                <dl class="mt-8 flex gap-8 border-t border-white/15 pt-6">
                    @foreach ($stats as [$label, $value])
                        <div class="flex flex-col-reverse">
                            <dt class="mt-1 text-[11px] uppercase tracking-[0.14em] text-emerald-200/80">{{ $label }}</dt>
                            <dd class="text-2xl font-bold tracking-tight text-white">{{ number_format($value, 0, ',', '.') }}</dd>
                        </div>
                    @endforeach
                </dl>
                <p class="mt-8 text-xs text-emerald-200/80">SMKN 5 Surakarta &bull; Sistem internal v1.0</p>
            </div>
        </aside>

        <section class="flex items-start justify-center bg-gradient-to-b from-slate-50 to-white px-4 py-8 sm:items-center sm:px-8 lg:py-12">
            <div class="w-full max-w-md">
                <p class="mb-3 text-center text-xs font-semibold uppercase tracking-[0.18em] text-emerald-700">Sistem Peminjaman Sarpras</p>
                {{ $slot }}
                <p class="mt-6 text-center text-xs text-slate-400 lg:hidden">SMKN 5 Surakarta &bull; Sistem internal v1.0</p>
            </div>
        </section>
    </main>
    <x-toast/>
</body>
</html>
