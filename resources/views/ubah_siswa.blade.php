<x-app-layout>
    <div class="flex overflow-hidden fixed inset-0 z-50 justify-center items-center w-full pelanggaran-edit animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="overflow-y-auto z-50 mx-auto w-4/12 bg-white rounded-xl border border-blue-500 shadow-lg modal-container md:max-w-11/12">
            <div class="px-6 py-4 text-left modal-content">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold text-gray-500">Ubah Data Siswa</p>
                    <div class="z-50 cursor-pointer modal-close">
                    </div>
                </div>
                <!--Body-->
			 <form action="{{ route('dashboard.ubah.siswa') }}" method="post">
				 @csrf
                <input type="hidden" name="nis" value="{{ $siswa->nis }}"/>
                <div class="grid grid-cols-1 mx-3 mt-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Siswa</label>
                    <input type="text" name="nama_siswa" placeholder=" " value="{{ $siswa->nama_siswa }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" />
                </div>
                <div class="grid grid-cols-1 gap-5 mx-3 mt-5 md:grid-cols-2 md:gap-8">
                    <div class="grid grid-cols-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir </label>
                        <input type="date" name="tgl_lahir" placeholder=" " value="{{ $siswa->tgl_lahir }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Alamat </label>
                        <input type="text" name="alamat" placeholder=" " value="{{ $siswa->alamat }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black"/>
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Jenis Kelamin</label>
                        <select name="jk" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">
					   <option @if ($siswa->jenis_kelamin == "Laki-Laki") selected @endif>Laki-Laki</option>
                            <option @if ($siswa->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">No Tlpn </label>
                        <input name="telp_wali" value="{{ $siswa->telp_wali }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kelas </label>
                        <input name="kelas" value="{{ $siswa->kelas }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Angkatan </label>
                        <input name="angkatan" value="{{ $siswa->angkatan }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                    </div>
                </div>
                <div class="grid grid-cols-1 mx-3 mt-4">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama Wali </label>
                    <input name="nama_wali" value="{{ $siswa->nama_wali }}" class="block px-0 pt-1 pb-2 mt-0 w-full bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black" type="text" placeholder="" />
                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2 space-x-4">
				<a href="{{ route('dashboard') }}">
	                    <button class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none">
	                        Batal
	                    </button>
				</a>
                    <button type="submit" class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none">
                        Simpan
                    </button>
                </div>
			</form>
            </div>
        </div>
    </div>
</x-app-layout>
