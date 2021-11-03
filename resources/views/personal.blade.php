<x-app-layout>
	<!-- End of Navbar -->
	<div class="container p-5 mx-auto my-5">
		<div class="md:flex no-wrap md:-mx-2">
			<!-- Left Side -->
			<div class="w-full md:w-3/12 md:mx-2">
				<!-- Profile Card -->
				<div class="p-3 bg-white border-t-4 border-green-400">
					<div class="overflow-hidden image">
						<img class="mx-auto w-full h-auto" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="">
					</div>
					<h1 class="my-1 text-xl font-bold leading-8 text-gray-900">{{ $siswa->nama_siswa }}</h1>
					<h3 class="leading-6 text-gray-600 font-lg text-semibold">Siswa SMK 2 PGRI DENPASAR</h3>
					<ul class="px-3 py-2 mt-3 text-gray-600 bg-gray-100 rounded divide-y shadow-sm hover:text-gray-700 hover:shadow">
						<li class="flex items-center py-3">
							<span>NIS</span>
							<span class="ml-auto">
								<span class="px-2 py-1 text-sm text-white bg-green-500 rounded">
									{{ $siswa->nis }}
								</span>
							</span>
						</li>
						<li class="flex items-center py-3">
							<span>Angkatan</span>
							<span class="ml-auto">{{ $siswa->angkatan }}</span>
						</li>
					</ul>
				</div>
				<!-- End of profile card -->
				<div class="my-4"></div>
				<!-- Friends card -->
				<!-- End of friends card -->
			</div>
				<!-- Right Side -->
				<div class="mx-2 w-full h-64 md:w-9/12">
				<!-- Profile tab -->
				<!-- About Section -->
					<div class="p-3 bg-white rounded-sm shadow-sm">
						<div class="flex items-center space-x-2 font-semibold leading-8 text-gray-900">
							<span clas="text-green-500">
								<svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
								</svg>
							</span>
							<span class="tracking-wide">About</span>
						</div>
						<div class="text-gray-700">
							<div class="grid text-sm md:grid-cols-2">
								<div class="grid grid-cols-2">
									<div class="px-4 py-2 font-semibold">Jenis Kelamin</div>
									<div class="px-4 py-2">{{ $siswa->jenis_kelamin }}</div>
								</div>
								<div class="grid grid-cols-2">
									<div class="px-4 py-2 font-semibold">Nama Wali.</div>
									<div class="px-4 py-2">{{ $siswa->nama_wali }}</div>
								</div>
								<div class="grid grid-cols-2">
									<div class="px-4 py-2 font-semibold">Alamat</div>
									<div class="px-4 py-2">{{ $siswa->alamat }}</div>
								</div>
								<div class="grid grid-cols-2">
									<div class="px-4 py-2 font-semibold">No Telp Wali.</div>
									<div class="px-4 py-2">{{ $siswa->telp_wali }}</div>
								</div>
								<div class="grid grid-cols-2">
									<div class="px-4 py-2 font-semibold">Tanggal Lahir</div>
									<div class="px-4 py-2">{{ $siswa->tgl_lahir }}</div>
								</div>
								<div class="grid grid-cols-2">
									<div class="px-4 py-2 font-semibold">Total Poin</div>
									<div class="px-4 py-2">{{ $pelanggaran->total_poin }}</div>
								</div>
							</div>

                            <button class="block p-3 my-4 w-full text-sm font-semibold text-green-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-400 hover:shadow-xs" onClick="window.print()">Cetak Laporan</button>

						</div>
						<!-- End of about section -->
						<div class="my-4"></div>
						<!-- Experience and education -->
					</div>
						<div class="p-3 bg-white rounded-sm shadow-sm">
							<div class="grid grid-cols-1 auto-rows-max">
								<div>
									<div class="flex items-center mb-1 space-x-2 font-semibold leading-8 text-gray-900">
										<span clas="text-green-500">
											<svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
											</svg>
										</span>
										<span class="tracking-wide">Data Pelanggaran</span>
									</div>
									<div class="flex items-center mb-1 space-x-2 font-semibold leading-8 text-gray-900">
									<table class="w-full bg-white border-collapse table-auto">
										<thead>
											<tr class="text-sm font-medium text-left text-gray-700 rounded-lg" style="font-size: 0.9674rem">
												<th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">No</th>
												<th class="px-4 py-2" style="background-color:#f8f8f8">Tanggal</th>
												<th class="px-4 py-2" style="background-color:#f8f8f8">Kategori</th>
												<th class="px-4 py-2" style="background-color:#f8f8f8">Nama Pelanggaran</th>
												<th class="px-4 py-2" style="background-color:#f8f8f8">Poin</th>
												<th class="px-4 py-2" style="background-color:#f8f8f8">Opsi</th>
											</tr>
										</thead>
										<tbody class="text-sm font-normal text-gray-700">
											@if (count($detail_pelanggaran) > 0)
											@foreach ($detail_pelanggaran as $item)
											<tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
												<td class="px-4 py-4">{{ $loop->iteration }}</td>
												<td class="px-4 py-4">{{ $item->updated_at}}</td>
												<td class="px-4 py-4">{{ $item->kategori }}</td>
												<td class="px-4 py-4">{{ $item->nama_pelanggaran }}</td>
												<td class="px-4 py-4">{{ $item->poin }}</td>
												<td class="px-4 py-4">
													<a href="/dashboard/informasi/hapus/{{ $item->id }}">
														<button type="button" class="p-1 m-2 w-20 font-semibold text-white bg-red-400 rounded-full shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring hover:shadow-none" @click="showModal1 = true"> Hapus </button>
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
									</div>
								</div>
								<div id="pagination" class="flex justify-center items-center w-full pt-4 border-t border-gray-100">
									{{ $detail_pelanggaran->onEachSide(5)->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</x-app-layout>
