<x-app-layout>

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
</x-app-layout>
