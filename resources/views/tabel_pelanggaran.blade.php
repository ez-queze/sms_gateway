<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            .modal {
              transition: opacity 0.25s ease;
            }
            .modal-active {
              overflow-x: hidden;
              overflow-y: visible !important;
            }
        </style>

        <style>
            .animated {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            .animated.faster {
                -webkit-animation-duration: 500ms;
                animation-duration: 500ms;
            }

            .fadeIn {
                -webkit-animation-name: fadeIn;
                animation-name: fadeIn;
            }

            .fadeOut {
                -webkit-animation-name: fadeOut;
                animation-name: fadeOut;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                }
             }
        </style>

        <style>
            :root {
                --main-color: #4a76a8;
            }

            .bg-main-color {
                background-color: var(--main-color);
            }

            .text-main-color {
                color: var(--main-color);
            }

            .border-main-color {
                border-color: var(--main-color);
            }
        </style>

<div class="w-full bg-white rounded-md">
    <div class="flex justify-end w-full px-2 mt-2">
        <div class="relative inline-block w-full">
        <form action="{{ route('dashboard.cari_pelanggaran') }}" method="POST">
            @csrf
            {{-- <input type="hidden" name="pilih" value="1"> --}}
            <input type="text" name="cari" value="{{ old('cari') }}" class="block w-full px-4 py-1 pl-8 text-sm leading-snug text-gray-600 bg-gray-100 border border-gray-300 rounded-lg appearance-none" placeholder="Search" />
        </form>
        </div>
        <div class="absolute inset-y-0 left-0 flex items-center px-2 pl-3 text-gray-300 pointer-events-none">
            <svg class="w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
            </svg>
        </div>
    </div>
</div>
<table class="w-full border-collapse table-auto">
    {{-- <thead>
        <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">NIS</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Kelas</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Angkatan</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Total Poin</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Tanggal Pelanggaran</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
        </tr>
    </thead> --}}
    <tbody class="text-sm font-normal text-gray-700">
        @if (count($pelanggarans) > 0)
        @foreach ($pelanggarans as $item)
            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                <td class="text-center w-1/12 py-4">{{ $loop->iteration }}</td>
                <td class="text-center w-1/12 py-4">{{ $item->nis }}</td>
                <td class="text-center w-1/12 py-4">{{ $item->nama_siswa }}</td>
                <td class="text-center w-1/12 py-4">{{ $item->kelas }}</td>
                <td class="text-center w-1/12 py-4">{{ $item->angkatan }}</td>
                <td class="text-center w-1/12 py-4">{{ $item->total_poin }}</td>
                <td class="text-center w-1/12 py-4">{{ $item->updated_at }}</td>
                <td class="text-center w-1/12 py-4">
                    <div class="space-y-10 md:space-x-2 md:space-y-2">
                        @if (Auth::user()->status == 'Wakil Kepala Sekolah')
                        <a href="/dashboard/tambah/pelanggaran/{{ $item->nis }}" target="_parent">
                            <button type="button" class='w-auto py-1 px-4 m-2 font-semibold text-white transition-all duration-300 bg-green-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>Pelanggaran</button>
                        </a>
                        @endif
                        <a href="/dashboard/informasi/{{ $item->nis }}" target="_parent">
                            <button class="w-auto py-1 px-10 m-1 font-semibold text-white transition-all duration-300 bg-yellow-400 rounded-full shadow-lg hover:bg-yellow-600 focus:outline-none focus:ring hover:shadow-none">Info</button>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        @else
            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                <td colspan="11" class="px-4 py-4 text-center">Data Pelanggaran Kosong!</td>
            </tr>
        @endif
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
