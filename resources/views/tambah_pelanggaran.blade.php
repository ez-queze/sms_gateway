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
</x-app-layout>
