<x-app-layout>
@if (Auth::user()->status == 'Wakil Kepala Sekolah')
<div class="flex justify-center h-screen">
	<!--actual component start-->
	<div x-data="setup()">
		<ul class="flex justify-center items-center my-4">
			<template x-for="(tab, index) in tabs" :key="index">
				<li class="px-4 py-2 text-gray-500 border-b-8 cursor-pointer"
					:class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
					x-text="tab"></li>
			</template>
		</ul>

        {{-- Tab Data Siswa --}}

        <div  x-show="activeTab===0" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 w-full bg-white border-b border-gray-200">
                <div class="px-4 pb-4 w-full bg-white rounded-md">
                    <div class="flex justify-end px-2 mt-2 w-full">
                        <div class="inline-block relative w-full sm:w-64">
                            <div class="flex justify-between">
                                <input type="" name="" class="block px-4 py-1 pl-8 w-full text-sm leading-snug text-gray-600 bg-gray-100 rounded-lg border border-gray-300 appearance-none" placeholder="Search" />
                                <div class="flex absolute inset-y-0 left-0 items-center px-2 pl-3 text-gray-300 pointer-events-none">
                                <svg class="w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                                    <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="overflow-x-auto mt-6 w-full">
                        <div class="space-y-10 md:space-x-2 md:space-y-0">
                            <button onclick="openModal('main-modal')" class='p-1 m-2 w-40 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>Tambah Data</button>
                        </div>

                        <table class="w-full border-collapse table-auto">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">NIS</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Kelas</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Angkatan</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Tgl Lahir</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Jenis Kelamin</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Alamat</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Wali</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">No Tlp</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-normal text-gray-700">
                            @if (count($siswas) > 0)
                            @foreach ($siswas as $item)
                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">{{ $loop->iteration }}</td>
                                <td class="px-4 py-4">{{ $item->nis }}</td>
                                <td class="px-4 py-4">{{ $item->nama_siswa }}</td>
                                <td class="px-4 py-4">{{ $item->kelas }}</td>
                                <td class="px-4 py-4">{{ $item->angkatan }}</td>
                                <td class="px-4 py-4">{{ $item->tgl_lahir }}</td>
                                <td class="px-4 py-4">{{ $item->jenis_kelamin }}</td>
                                <td class="px-4 py-4">{{ $item->alamat }}</td>
                                <td class="px-4 py-4">{{ $item->nama_wali }}</td>
                                <td class="px-4 py-4">{{ $item->telp_wali }}</td>
                                <td class="px-4 py-4">
                                    <div class="space-y-10 md:space-x-2 md:space-y-0">
                                        <button type="button" id="index" value="{{ $item->nis }}" onclick="openModal('another-modal');" class='p-1 m-2 w-20 font-semibold text-white bg-yellow-400 rounded-full shadow-lg transition-all duration-300 hover:bg-yellow-600 focus:outline-none focus:ring hover:shadow-none'>
                                            Ubah
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                    <td colspan="11" class="px-4 py-4 text-center">Data Siswa Kosong!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div id="pagination" class="flex justify-center items-center pt-4 w-full border-t border-gray-100">
                    {{ $siswas->onEachSide(5)->links() }}
                </div>
            </div>
            <style>
                thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
                thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
                tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
                tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
            </style>
            <br>
        </div>
    </div>

    {{-- Tab Data Pelanggaran --}}
    <div  x-show="activeTab===1" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 w-full bg-white border-b border-gray-200">
            <div class="px-4 pb-4 w-full bg-white rounded-md">
                <div class="flex justify-end px-2 mt-2 w-full">
                    <div class="inline-block relative w-full sm:w-64">
                        <input type="" name="" class="block px-4 py-1 pl-8 w-full text-sm leading-snug text-gray-600 bg-gray-100 rounded-lg border border-gray-300 appearance-none" placeholder="Search" />
                        <div class="flex absolute inset-y-0 left-0 items-center px-2 pl-3 text-gray-300 pointer-events-none">
                            <svg class="w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                            <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto mt-6 w-full">
                    <div class="space-y-10 md:space-x-2 md:space-y-0">
                        <button onclick="openModal('pelanggaran-sms')" class='p-1 m-2 w-40 font-semibold text-white bg-blue-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>SMS</button>
                    </div>
                    <table class="w-full border-collapse table-auto">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Tanggal</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">NIS</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Kelas</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Angkatan</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Total Poin</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-normal text-gray-700">
                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">1</td>
                                <td class="px-4 py-4">9/7/2021</td>
                                <td class="px-4 py-4">884001</td>
                                <td class="px-4 py-4">Ajie</td>
                                <td class="px-4 py-4">X IPA</td>
                                <td class="px-4 py-4">2017</td>
                                <td class="px-4 py-4">40</td>
                                <td class="px-4 py-4">
                                    <div class="space-y-10 md:space-x-2 md:space-y-2">
                                        <button onclick="openModal('pelanggaran-tambah')" class='p-1 m-2 w-full font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>Pelanggaran</button>
                                        <button class="p-1 m-5 w-full font-semibold text-white bg-yellow-400 rounded-full shadow-lg transition-all duration-300 hover:bg-yellow-600 focus:outline-none focus:ring hover:shadow-none">Info</button>
                                        {{-- <button onclick="openModal('pelanggaran-edit')"  class="p-1 m-5 w-full font-semibold text-white bg-yellow-400 rounded-full shadow-lg transition-all duration-300 hover:bg-yellow-600 focus:outline-none focus:ring hover:shadow-none">Info</button> --}}
                                    </div>
                                </td>
                            </tr>
                            <tr class="py-4 border-b border-gray-200 hover:bg-gray-100">
                                <td class="flex items-center px-4 py-4">2</td>
                                <td class="px-4 py-4"></td>
                                <td class="px-4 py-4">884002</td>
                                <td class="px-4 py-4">Kresna</td>
                            </tr>
                            <tr class="border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">3</td>
                                <td class="px-4 py-4"></td>
                                <td class="px-4 py-4">884003</td>
                                <td class="px-4 py-4">Dimas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="pagination" class="flex justify-center items-center pt-4 w-full border-t border-gray-100">
                    <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z" fill="#2C2C2C"/>
                        </g>
                    </svg>
                    <p class="mx-2 text-sm leading-relaxed text-blue-600 cursor-pointer hover:text-blue-600">1</p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" >2</p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600"> 3 </p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600"> 4 </p>
                <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z" fill="#18A0FB"/>
                </svg>
            </div>
        </div>
        <style>
            thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
            thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
            tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
            tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
        </style>
        <br>
    </div>

    {{-- jenis pelanggaran --}}
    <div x-show="activeTab===2">
        <div class="p-6 w-full bg-white border-b border-gray-200">
            <div class="px-4 pb-4 w-full bg-white rounded-md">
                <div class="flex justify-end px-2 mt-2 w-full">
                    <div class="inline-block relative w-full sm:w-64">
                        <input type="" name="" class="block px-4 py-1 pl-8 w-full text-sm leading-snug text-gray-600 bg-gray-100 rounded-lg border border-gray-300 appearance-none" placeholder="Search" />
                        <div class="flex absolute inset-y-0 left-0 items-center px-2 pl-3 text-gray-300 pointer-events-none">
                        <svg class="w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                            <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto mt-6 w-full">
                <div class="space-y-10 md:space-x-2 md:space-y-0">
                    <button onclick="openModal('jenis-tambah')" class='p-1 m-2 w-40 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>Tambah Data</button>
                </div>
                <table class="w-full border-collapse table-auto">
                    <thead>
                        <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                            <th class="px-4 py-2" style="background-color:#f8f8f8">Kategori</th>
                            <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Pelanggaran</th>
                            <th class="px-4 py-2" style="background-color:#f8f8f8">Poin</th>
                            <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-4 py-4">1</td>
                            <td class="px-4 py-4">Berpakaian</td>
                            <td class="px-4 py-4">Tidak memasukan baju</td>
                            <td class="px-4 py-4">5</td>
                            <td class="px-4 py-4">
                                <div class="space-y-10 md:space-x-2 md:space-y-0">
                                    <button onclick="openModal('jenis-edit')"  class="p-1 m-2 w-20 font-semibold text-white bg-yellow-400 rounded-full shadow-lg transition-all duration-300 hover:bg-yellow-600 focus:outline-none focus:ring hover:shadow-none">Ubah</button>
                            </div>
                            </td>
                        </tr>
                        <tr class="py-4 border-b border-gray-200 hover:bg-gray-100">
                            <td class="flex items-center px-4 py-4">2</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">-</td>
                        </tr>
                        <tr class="border-gray-200 hover:bg-gray-100">
                            <td class="px-4 py-4">3</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="pagination" class="flex justify-center items-center pt-4 w-full border-t border-gray-100">

            </div>
        </div>
        <style>
            thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
            thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
            tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
            tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
        </style>
        <br>
    </div>
    </div>
</div>

{{-- modal tambah data siswa --}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full main-modal animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-700">Tambah Data Siswa</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('main-modal')">
                    <svg class="text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <form action="{{ route('dashboard.tambah.siswa') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">NIS</label>
                <input type="text" name="nis" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                <input type="text" name="nama_siswa" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="grid grid-cols-1 gap-5 mx-3 mt-5 md:grid-cols-2 md:gap-8">
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir </label>
                    <input type="date" name="tgl_lahir" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Alamat </label>
                    <input type="text" name="alamat" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Jenis Kelamin</label>
                    <select name="jk" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">No Tlpn </label>
                    <input name="telp_wali" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kelas </label>
                    <input name="kelas" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Angkatan </label>
                    <input name="angkatan" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-4">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Wali </label>
                <input name="nama_wali" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button type="button" class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('main-modal')">
                    Batal
                </button>
                <button type="submit" class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none">
                    Simpan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal Ubah data siswa (sudah di buatkan blade/dipisahkan)--}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full another-modal animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-700">Ubah Data Siswa</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('another-modal')">
                </div>
            </div>
            <!--Body-->
            <form action="{{ route('dashboard.ubah.siswa') }}" method="post">
            @csrf
            @foreach ($datas as $item)
            @if ($item->nis == $id[0])
            <input type="hidden" name="nis" placeholder=" " value="{{ $item->nis }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                <input type="text" name="nama_siswa" placeholder=" " value="{{ $item->nama_siswa }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="grid grid-cols-1 gap-5 mx-3 mt-5 md:grid-cols-2 md:gap-8">
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir </label>
                    <input type="date" name="tgl_lahir" placeholder=" " value="{{ $item->tgl_lahir }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Alamat </label>
                    <input type="text" name="alamat" placeholder=" " value="{{ $item->alamat }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Jenis Kelamin</label>
                    <select name="jk" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">
                        <option @if ($item->jenis_kelamin == "Laki-Laki") selected @endif>Laki-laki</option>
                        <option @if ($item->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">No Tlpn </label>
                    <input name="telp_wali" value="{{ $item->telp_wali }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kelas </label>
                    <input name="kelas" value="{{ $item->kelas }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Angkatan</label>
                    <input name="angkatan" value="{{ $item->angkatan }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-4">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Wali </label>
                <input name="nama_wali" value="{{ $item->nama_wali }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button type="button" class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('another-modal')">
                    Batal
                </button>
                <button type="submit" class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
            {{-- scrip modal baru --}}
            @endif
            @endforeach
            </form>
        </div>
    </div>
</div>

{{-- modal tambah data pelanggaran --}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full pelanggaran-tambah animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-700">Tambah Data Pelanggaran</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('pelanggaran-tambah')">
                    <svg class="text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="grid grid-cols-1 mx-3 mt-2">
                <div class="block">
                    <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Berpakaian</span>
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3"checked>
                                <span class="ml-2">Tidak memasukan baju</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Tidak memakai kaos</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Tidak memakai tali pinggang</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Rambut panjang tergerai (siswa putri/putra)</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <div class="block">
                    <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Belajar</span>
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3"checked>
                                <span class="ml-2">Datang terlambat lebih dari 10 menit</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Tidak membawa buku sesuai jadwal</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Merokok di sekolah</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Tidak mengerjakan tugas PR</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <div class="block">
                    <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Sikap / Norma</span>
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3"checked>
                                <span class="ml-2">Pelecehan Seksual</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Bertindak tidak sopan</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Merusak fasilitas sekolah</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                                <span class="ml-2">Membawa benda tajam</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('pelanggaran-tambah')">
                    Batal
                </button>
                <button class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

{{-- modal edit data pelaggaran --}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full pelanggaran-edit animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Ubah Data Pelanggaran</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('pelanggaran-edit')">
                </div>
            </div>
            <!--Body-->
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">NIS</label>
                <input type="text" name="NIS" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                <input type="text" name="nama siswa" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="grid grid-cols-1 gap-5 mx-3 mt-5 md:grid-cols-2 md:gap-8">
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir </label>
                    <input type="date" name="tanggl lahir" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Alamat </label>
                    <input type="text" name="alamat" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Jenis Kelamin</label>
                    <select class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">No Tlpn </label>
                    <input class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-4">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Wali </label>
                <input class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('pelanggaran-edit')">
                    Batal
                </button>
                <button class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

{{-- modal sms --}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full pelanggaran-sms animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-700">SMS Gateway</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('pelanggaran-sms')">
                </div>
            </div>
            <div class="block">
                <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Poin Pelanggaran Siswa</span>
                <div class="mt-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="checkbox" value="3"checked>
                            <span class="ml-2">Poin 25 - 49</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                            <span class="ml-2">Poin 50 - 69</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="checkbox" value="3">
                            <span class="ml-2">Poin 70 - 79</span>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <!--Body-->
            <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"><span style="color:red">*</span>Mohon perhatikan poin pelanggaran siswa sebelum mengirimkan teguran.</span>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('pelanggaran-sms')">
                    Batal
                </button>
                <button class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Kirim
                </button>
            </div>
        </div>
    </div>
</div>

{{-- modal tambah Jenis pelanggaran --}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full jenis-tambah animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Tambah Jenis Pelanggaran</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('jenis-tambah')">
                    <svg class="text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kategori</label>
                <input type="text" name="NIS" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                <input type="text" name="" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Poin</label>
                <input type="number" name="" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('jenis-tambah')">
                    Batal
                </button>
                <button class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

{{-- modal edit jenis pelanggaran --}}
<div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full jenis-edit animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Ubah Jenis Pelanggaran</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('jenis-edit')">
                </div>
            </div>
            <!--Body-->
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kategori</label>
                <input type="text" name="NIS" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                <input type="text" name="" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Poin</label>
                <input type="number" name="" placeholder=" " class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('jenis-edit')">
                    Batal
                </button>
                <button class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Tab Bimbingan Konseling --}}
<script>
    function setup() {
        return {
        activeTab: 0,
        tabs: [
            "Data Siswa",
            "Data Pelanggaran",
            "Jenis Pelanggaran",
        ]};
    };
</script>

{{-- scrip modal baru --}}
<script>
    all_modals = ['main-modal', 'another-modal','pelanggaran-tambah','pelanggaran-edit','pelanggaran-sms','jenis-tambah','jenis-edit']
    all_modals.forEach((modal)=>{
        const modalSelected = document.querySelector('.'+modal);
        modalSelected.classList.remove('fadeIn');
        modalSelected.classList.add('fadeOut');
        modalSelected.style.display = 'none';
    })
    const modalClose = (modal) => {
        const modalToClose = document.querySelector('.'+modal);
        modalToClose.classList.remove('fadeIn');
        modalToClose.classList.add('fadeOut');
        setTimeout(() => {
            modalToClose.style.display = 'none';
        }, 500);
    }
    const openModal = (modal) => {
        const modalToOpen = document.querySelector('.'+modal);
        modalToOpen.classList.remove('fadeOut');
        modalToOpen.classList.add('fadeIn');
        modalToOpen.style.display = 'flex';
    }
</script>

@elseif (Auth::user()->status == 'Kepala Sekolah')
<div class="py-12">
    <div class="flex justify-center h-screen">
	<!--actual component start-->
	<div x-data="setup()">
		<ul class="flex justify-center items-center my-4">
			<template x-for="(tab, index) in tabs" :key="index">
				<li class="px-4 py-2 text-gray-500 border-b-8 cursor-pointer"
					:class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
					x-text="tab"></li>
			</template>
		</ul>

        {{-- Tab Data Siswa --}}

        <div  x-show="activeTab===0" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 w-full bg-white border-b border-gray-200">
                <div class="px-4 pb-4 w-full bg-white rounded-md">
                    <div class="flex justify-end px-2 mt-2 w-full">
                        <div class="inline-block relative w-full sm:w-64">
                            <input type="" name="" class="block px-4 py-1 pl-8 w-full text-sm leading-snug text-gray-600 bg-gray-100 rounded-lg border border-gray-300 appearance-none" placeholder="Search" />
                            <div class="flex absolute inset-y-0 left-0 items-center px-2 pl-3 text-gray-300 pointer-events-none">
                                <svg class="w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                                    <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto mt-6 w-full">
                    <table class="w-full border-collapse table-auto">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">NIS</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Kelas</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Tahun Ajaran</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Tgl Lahir</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Jenis Kelamin</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Alamat</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Wali</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">No Tlp</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-normal text-gray-700">
                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">1</td>
                                <td class="px-4 py-4">884001</td>
                                <td class="px-4 py-4">Ajie</td>
                                <td class="px-4 py-4">X IPA</td>
                                <td class="px-4 py-4">2017</td>
                                <td class="px-4 py-4">14-11-98</td>
                                <td class="px-4 py-4">Laki-laki</td>
                                <td class="px-4 py-4">Aokigahara</td>
                                <td class="px-4 py-4">PP Miky</td>
                                <td class="px-4 py-4">081 *** *** ***</td>
                                <td class="px-4 py-4">
                                    <div class="space-y-10 md:space-x-2 md:space-y-0">
                                        <button
                                        class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none"
                                        @click="showModal1 = true"> Info </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="py-4 border-b border-gray-200 hover:bg-gray-100">
                                <td class="flex items-center px-4 py-4">2</td>
                                <td class="px-4 py-4">884002</td>
                                <td class="px-4 py-4">Kresna</td>
                            </tr>
                            <tr class="border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">2</td>
                                <td class="px-4 py-4">884003</td>
                                <td class="px-4 py-4">Dimas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="pagination" class="flex justify-center items-center pt-4 w-full border-t border-gray-100">
                    <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z" fill="#2C2C2C"/>
                        </g>
                    </svg>
                    <p class="mx-2 text-sm leading-relaxed text-blue-600 cursor-pointer hover:text-blue-600">1</p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" >2</p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600"> 3 </p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600"> 4 </p>
                    <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z" fill="#18A0FB"/>
                    </svg>
                </div>
            </div>
            <style>
                thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
                thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
                tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
                tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
            </style>
            <br>
        </div>
    </div>
    {{-- Tab Data Pelanggaran --}}
    <div  x-show="activeTab===1" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 w-full bg-white border-b border-gray-200">
            <div class="px-4 pb-4 w-full bg-white rounded-md">
                <div class="flex justify-end px-2 mt-2 w-full">
                    <div class="inline-block relative w-full sm:w-64">
                        <input type="" name="" class="block px-4 py-1 pl-8 w-full text-sm leading-snug text-gray-600 bg-gray-100 rounded-lg border border-gray-300 appearance-none" placeholder="Search" />
                        <div class="flex absolute inset-y-0 left-0 items-center px-2 pl-3 text-gray-300 pointer-events-none">
                            <svg class="w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                                <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto mt-6 w-full">
                    <table class="w-full border-collapse table-auto">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Tanggal</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">NIS</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Kelas</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Angkatan</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Poin</th>
                                <th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-normal text-gray-700">
                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">1</td>
                                <td class="px-4 py-4">9/7/2021</td>
                                <td class="px-4 py-4">884001</td>
                                <td class="px-4 py-4">Ajie</td>
                                <td class="px-4 py-4">X IPA</td>
                                <td class="px-4 py-4">2017</td>
                                <td class="px-4 py-4">20</td>
                                <td class="px-4 py-4">
                                <div class="space-y-10 md:space-x-2 md:space-y-0">
                                    <button
                                    class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none"
                                    @click="showModal3 = true"> Info </button>
                                </div>
                                </td>


                            </tr>
                            <tr class="py-4 border-b border-gray-200 hover:bg-gray-100">
                                <td class="flex items-center px-4 py-4">2</td>
                                <td class="px-4 py-4"></td>
                                <td class="px-4 py-4">884002</td>
                                <td class="px-4 py-4">Kresna</td>
                            </tr>
                            <tr class="border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">3</td>
                                <td class="px-4 py-4"></td>
                                <td class="px-4 py-4">884003</td>
                                <td class="px-4 py-4">Dimas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="pagination" class="flex justify-center items-center pt-4 w-full border-t border-gray-100">
                    <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24"     fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z" fill="#2C2C2C"/>
                        </g>
                    </svg>
                    <p class="mx-2 text-sm leading-relaxed text-blue-600 cursor-pointer hover:text-blue-600">1</p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" >2</p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600"> 3 </p>
                    <p class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600"> 4 </p>
                    <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z" fill="#18A0FB"/>
                    </svg>
                </div>
            </div>
            <style>
                thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
                thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}

                tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
                tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
            </style>
            <br>
        </div>
    </div>
	<!--actual component end-->
</div>
</div>

{{-- Tab Kepala Sekolah --}}
<script>
    function setup() {
    return {
    activeTab: 0,
        tabs: [
            "Data Siswa",
            "Data Pelanggaran",
        ]};
    };
</script>
@endif
</x-app-layout>
