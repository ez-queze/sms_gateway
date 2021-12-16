<x-app-layout>
@if (Auth::user()->status == 'Wakil Kepala Sekolah')
<div class="flex justify-center h-screen">
	<!--actual component start-->
	<div x-data="setup()">
		<ul class="flex items-center justify-center my-4">
			<template x-for="(tab, index) in tabs" :key="index">
				<li class="px-4 py-2 text-gray-500 border-b-8 cursor-pointer"
					:class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
					x-text="tab"></li>
			</template>
		</ul>
        {{-- Tab Data Siswa --}}

        <div  x-show="activeTab===0" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="w-full p-6 bg-white border-b border-gray-200">
                <div class="w-full mt-6 overflow-x-auto">
                    <button onclick="openModal('main-modal')" class='w-40 p-1 m-2 font-semibold text-white transition-all duration-300 bg-green-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>Tambah Data</button>
                </div>
                <table class="w-full border-collapse table-auto">
                    <thead>
                        <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                            <th class="text-center w-28 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">NIS</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Kelas</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Angkatan</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Tgl Lahir</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Jenis Kelamin</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Alamat</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Nama Wali</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">No Tlp</th>
                            <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Opsi</th>
                        </tr>
                    </thead>
                </table>
                <iframe src="{{ url('/dashboard/tabel/siswa') }}" style="height:250px;width:100%; border:none;" title="Iframe Example"></iframe>
            </div>
            <style>
                thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
                thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
                tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
                tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
            </style>
            <br>
        </div>

        {{-- Tab Data Pelanggaran --}}
        <div  x-show="activeTab===1" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="w-full p-6 bg-white border-b border-gray-200">
                <div class="w-full mt-6 overflow-x-auto">
                    <button onclick="openModal('pelanggaran-sms')" class='w-40 p-1 m-2 font-semibold text-white transition-all duration-300 bg-blue-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>SMS</button>
                </div>
                <table class="w-full border-collapse table-auto">
                    <thead>
                        <tr class="pl-10 text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                            <th class="text-center w-40 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">NIS</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Kelas</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Angkatan</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Total Poin</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Tanggal Pelanggaran</th>
                            <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Opsi</th>
                        </tr>
                    </thead>
                </table>
                <iframe src="{{ url('/dashboard/tabel/pelanggaran') }}" style="height:300px;width:100%; border:none;" title="Iframe Example"></iframe>
            </div>
            <style>
                thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
                thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
                tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
                tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
            </style>
            <br>
        </div>

        {{-- Jenis Pelanggaran --}}
	    <div  x-show="activeTab===2">
	        <div class="w-full p-6 bg-white border-b border-gray-200">
	            <div class="w-full mt-6 overflow-x-auto">
	                    <button onclick="openModal('jenis-tambah')" class='w-40 p-1 m-2 font-semibold text-white transition-all duration-300 bg-green-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none'>Tambah Data</button>
	            </div>
	            <table class="w-full border-collapse table-auto">
                    <thead>
                        <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                            <th class="text-center w-52 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                            <th class="text-center w-52 py-2" style="background-color:#f8f8f8">Nama Pelanggaran</th>
                            <th class="text-center w-52 py-2" style="background-color:#f8f8f8">Kategori</th>
                            <th class="text-center w-52 py-2" style="background-color:#f8f8f8">Poin</th>
                            <th class="text-center w-52 py-2" style="background-color:#f8f8f8">Opsi</th>
                        </tr>
                    </thead>
                </table>
                <iframe src="{{ url('/dashboard/tabel/jenis') }}" style="height:250px;width:100%; border:none;" title="Iframe Example"></iframe>
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
<div class="fixed inset-0 z-50 flex items-center justify-center w-full overflow-hidden main-modal animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="z-50 w-4/12 mx-auto overflow-y-auto bg-white border border-blue-500 shadow-lg rounded-xl modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex items-center justify-between pb-3">
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
                <input type="text" name="nis" placeholder=" " class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                <input type="text" name="nama_siswa" placeholder=" " class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="grid grid-cols-1 gap-5 mx-3 mt-5 md:grid-cols-2 md:gap-8">
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir </label>
                    <input type="date" name="tgl_lahir" placeholder=" " class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Alamat </label>
                    <input type="text" name="alamat" placeholder=" " class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Jenis Kelamin</label>
                    <select name="jk" class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">No Tlpn </label>
                <div class="flex">
                    <span class="text-sm border border-2 rounded-l px-2 py-1 bg-white-300 whitespace-no-wrap">+62 </span>
                    <input name="telp_wali" class="block w-full px-2 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kelas </label>
                    <input name="kelas" class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Angkatan </label>
                    <input name="angkatan" class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-4">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Wali </label>
                <input name="nama_wali" class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button type="button" class="w-20 p-1 m-2 font-semibold text-white transition-all duration-300 bg-red-400 rounded-full shadow-lg hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('main-modal')">
                    Batal
                </button>
                <button type="submit" class="w-20 p-1 m-2 font-semibold text-white transition-all duration-300 bg-green-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none">
                    Simpan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal tambah Jenis pelanggaran --}}
<div class="fixed inset-0 z-50 flex items-center justify-center w-full overflow-hidden jenis-tambah animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="z-50 w-4/12 mx-auto overflow-y-auto bg-white border border-blue-500 shadow-lg rounded-xl modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <div class="flex items-center justify-between pb-3">
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
		  <form action="{{ route('dashboard.tambah.jenis_pelanggaran') }}" method="post">
			@csrf
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Pelanggaran</label>
                <input  name="nama_pelanggaran" placeholder=" " class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
		  <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kategori</label>
			 <select name="kategori" class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">
				<option>Pilih Kategori</option>
				<option>Berpakaian</option>
				<option>Belajar</option>
				<option>Sikap / Norma</option>
			 </select>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Poin</label>
                <input type="number" name="poin" placeholder=" " step="5" class="block w-full px-0 pt-1 pb-2 mt-0 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
            </div>
            <div class="flex justify-end pt-2 space-x-4">
			 <a href="{{ route('dashboard') }}">
	                <button type="button" class="w-20 p-1 m-2 font-semibold text-white transition-all duration-300 bg-red-400 rounded-full shadow-lg hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('jenis-tambah')">
	                    Batal
	                </button>
		 	 </a>
                <button type="submit" class="w-20 p-1 m-2 font-semibold text-white transition-all duration-300 bg-green-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
		  </form>
        </div>
    </div>
</div>

{{-- modal sms --}}
<div class="fixed inset-0 z-50 flex items-center justify-center w-full overflow-hidden pelanggaran-sms animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="z-50 w-4/12 mx-auto overflow-y-auto bg-white border border-blue-500 shadow-lg rounded-xl modal-container md:max-w-11/12">
        <div class="px-6 py-4 text-left modal-content">
            <!--Title-->
            <div class="flex items-center justify-between pb-3">
                <p class="text-2xl font-bold text-gray-700">SMS Gateway</p>
                <div class="z-50 cursor-pointer modal-close" onclick="modalClose('pelanggaran-sms')">
                </div>
            </div>
		  <form action="{{ route('dashboard.kirim_sms') }}" method="post">
		  @csrf
            <div class="block">
                <span class="block w-full px-0 pt-1 pb-2 mt-0 text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Poin Pelanggaran Siswa</span>
                <div class="mt-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="pilih1" value="1">
                            <span class="ml-2">Poin 50 - 100</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="pilih2" value="1">
                            <span class="ml-2">Poin diatas 100</span>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <!--Body-->
            <span class="block w-full px-0 pt-1 pb-2 mt-0 text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"><span style="color:red">*</span>Mohon perhatikan poin pelanggaran siswa sebelum mengirimkan teguran.</span>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
                <button type="button" class="w-20 p-1 m-2 font-semibold text-white transition-all duration-300 bg-red-400 rounded-full shadow-lg hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('pelanggaran-sms')">
                    Batal
                </button>
                <button type="submit" class="w-20 p-1 m-2 font-semibold text-white transition-all duration-300 bg-green-400 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Kirim
                </button>
            </div>
		  </form>
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
    all_modals = ['main-modal','pelanggaran-sms','jenis-tambah']
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
	    <div x-data="setup()">
            <ul class="flex items-center justify-center my-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="px-4 py-2 text-gray-500 border-b-8 cursor-pointer"
                        :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul>

            {{-- Tab Data Siswa --}}
            <div  x-show="activeTab===0" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="w-full p-6 bg-white border-b border-gray-200">
                    <div class="w-full mt-6 overflow-x-auto"></div>
                    <table class="w-full border-collapse table-auto">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                                <th class="text-center w-28 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">NIS</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Kelas</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Angkatan</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Tgl Lahir</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Jenis Kelamin</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Alamat</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Nama Wali</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">No Tlp</th>
                                @if (Auth::user()->status == 'Wakil Kepala Sekolah')
                                    <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Opsi</th>
                                @endif
                            </tr>
                        </thead>
                    </table>
                    <iframe src="{{ url('/dashboard/tabel/siswa') }}" style="height:250px;width:100%; border:none;" title="Iframe Example"></iframe>
                </div>
                <style>
                    thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
                    thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
                    tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
                    tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
                </style>
                <br>
            </div>

            {{-- Tab Data Pelanggaran --}}
            <div  x-show="activeTab===1" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="w-full p-6 bg-white border-b border-gray-200">
                    <div class="w-full mt-6 overflow-x-auto"></div>
                    <table class="w-full border-collapse table-auto">
                        <thead>
                            <tr class="pl-10 text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
                                <th class="text-center w-40 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
                                <th class="text-center w-40 py-2" style="background-color:#f8f8f8">NIS</th>
                                <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Nama Siswa</th>
                                <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Kelas</th>
                                <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Angkatan</th>
                                <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Total Poin</th>
                                <th class="text-center w-40 py-2" style="background-color:#f8f8f8">Tanggal Pelanggaran</th>
                                <th class="text-center w-28 py-2" style="background-color:#f8f8f8">Opsi</th>
                            </tr>
                        </thead>
                    </table>
                    <iframe src="{{ url('/dashboard/tabel/pelanggaran') }}" style="height:300px;width:100%; border:none;" title="Iframe Example"></iframe>
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
