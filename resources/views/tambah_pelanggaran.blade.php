<x-app-layout>
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
		  <form action="{{ route('dashboard.tambah.pelanggaran') }}" method="post">
		  @csrf
		  <input type="hidden" name="nis" value="{{ $siswa->nis }}">
		  <input type="hidden" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
		  <input type="hidden" name="kelas" value="{{ $siswa->kelas }}">
		  @for ($i=0; $i < count($kategori); $i++)
			<input type="hidden" name="kategori-{{ $i }}" value="{{ $kategori[$i] }}">
		  @endfor
            <div class="grid grid-cols-1 mx-3 mt-2">
                <div class="block">
                    <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Berpakaian</span>
                    <div class="mt-2">
					@foreach ($berpakaian as $item)
				    	<div>
						<label class="inline-flex items-center">
							<input type="checkbox" class="form-checkbox" name="berpakaian-{{ $loop->index }}" value="{{ $item->nama_pelanggaran }}">
							<span class="ml-2">{{ $item->nama_pelanggaran }}</span>
						</label>
                        	</div>
				    	@endforeach
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <div class="block">
                    <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Belajar</span>
                    <div class="mt-2">
					@foreach ($belajar as $item)
                         <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="belajar-{{ $loop->index }}" value="{{ $item->nama_pelanggaran }}">
                                <span class="ml-2">{{ $item->nama_pelanggaran }}</span>
                            </label>
                         </div>
					@endforeach
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 mx-3 mt-2">
                <div class="block">
                    <span class="block px-0 pt-1 pb-2 mt-0 w-full text-gray-700 bg-transparent border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-black">Sikap / Norma</span>
                    <div class="mt-2">
					@foreach ($sikap as $item)
                         <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="sikap-{{ $loop->index }}" value="{{ $item->nama_pelanggaran }}">
                                <span class="ml-2">{{ $item->nama_pelanggaran }}</span>
                            </label>
                         </div>
					@endforeach
                    </div>
                </div>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-4">
			<a href="{{ route('dashboard') }}">
				<button type="button" class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" onclick="modalClose('pelanggaran-tambah')">
					Batal
				</button>
		 	</a>
                <button type="submit" class="p-1 m-2 w-20 font-semibold text-white bg-green-400 rounded-full shadow-lg transition-all duration-300 hover:bg-green-600 focus:outline-none focus:ring hover:shadow-none" onclick="validate_form(document.getElementById('add_caretaker_form'))">
                    Simpan
                </button>
            </div>
		  </form>
        </div>
    </div>
</div>
</x-app-layout>
