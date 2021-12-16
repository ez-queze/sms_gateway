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
<table class="w-full border-collapse table-auto">
    {{-- <thead>
        <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Tanggal</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Kategori</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Pelanggaran</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Poin</th>
            <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
        </tr>
    </thead> --}}
    <tbody class="text-sm font-normal text-gray-700">
        @if (count($detail_pelanggaran) > 0)
        @foreach ($detail_pelanggaran as $item)
        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
            <td class="text-center w-1/12 py-4">{{ $loop->iteration }}</td>
            <td class="text-center w-2/12 py-4">{{ $item->updated_at}}</td>
            <td class="text-center w-1/12 py-4">{{ $item->kategori }}</td>
            <td class="text-center w-2/12 py-4">{{ $item->nama_pelanggaran }}</td>
            <td class="text-center w-1/12 py-4">{{ $item->poin }}</td>
            <td class="text-center w-1/12 py-4">
                <a href="/dashboard/informasi/hapus/{{ $item->id }}" target="_parent">
                    <button type="button" class="py-1 m-2 w-28 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" @click="showModal1 = true"> Hapus </button>
                </a>
            </td>
        </tr>
        @endforeach
        @else
        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
            <td colspan="11" class="px-4 py-4 text-center">Data Detail Pelanggaran Kosong!</td>
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

