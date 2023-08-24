<?= $this->extend('layout/homepage') ?>
<?= $this->section('contentHome') ?>
<?= $this->include('components/alerts') ?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
	<div class="container d-flex align-items-center">

		<h5 class="logo me-auto" style="font-size: 20px;">
			<img src="<?= base_url('public/img/umc.png') ?>" class="mb-1" style="height: 28px; width: 28px;" alt="">
			<a href="#home">Sispasi Umc </a>
		</h5>
		<!-- Uncomment below if you prefer to use an image logo -->
		<!-- <a href="index.html" class="logo me-auto"><img src="public/landing/assets/img/logo.png" alt="" class="img-fluid"></a> -->

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
				<li><a class="nav-link scrollto" href="#cek">Cek Diagnosa</a></li>
				<li><a class="nav-link scrollto" href="<?= base_url('logout') ?>">Logout</a></li>
			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav><!-- .navbar -->

	</div>
</header>
<!-- End Header -->

<!-- ======= Home Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-8 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
			data-aos="fade-up" data-aos-delay="200">
			<h1>Cek Tingkat Depresimu</h1>
			<h2 class="mb-4">Selamat Datang <?= session()->get('nama_lengkap') ?><br> Silahkan Pilih <strong class="text-warning">Gejala</strong>
			Yang Kamu Alami!</h2>
			<div class="d-flex justify-content-center justify-content-lg-start mt-3">
				<a href="#cek" class="btn-get-started scrollto">Pilih Gejala</a>
			</div>
		</div>
		<div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
			<img src="<?= base_url('public/landing/assets/img/doctor.png') ?>" class="img-fluid animated"
			style="height: 280px; width: 280px; margin-bottom: 50px; margin-top: -50px;">
		</div>
	</div>
</div>
</section>
<!-- End Home -->

<!-- ======= FAQ Section ======= -->
<main id="main">
	<section id="cek" class="faq section-bg">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>Form Diagnosis</h2>
				<p><strong>Tidak semua gejala harus dipilih!</strong>, jadi pastikan untuk memberikan pilihan gejala yang tepat sesuai dengan yang dialami oleh anda. Silahkan cek panduan untuk informasi lebih detail.</p>
			</div>

			<!-- Begin Page Content -->
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<form id="formDiagnosa" action="<?= base_url('mahasiswa/hasil_diagnosa') ?>" method="post">
						<!-- Form Step 1 - Biodata -->
						<div id="step1">
							<div class="card-header">
								<a type="button" class="btn btn-outline-danger btn-sm mt-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#panduan">
									<i class="fas fa-book"></i> Panduan
								</a>
								<h5 class="m-0 font-weight-bold text-primary m-2">
									<font color="#8B0000">Biodata</font>
								</h5>
							</div>
							<div class="card-body">
								<div class="form-group mb-3">
									<input type="text" class="form-control" id="nama_mahasiswa" placeholder="Nama Lengkap" maxlength="50" name="nama_mahasiswa" required>
								</div>
								<div class="form-group mb-3">
									<input type="number" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa" name="nim" required>
								</div>
								<div class="form-group mb-3">
									<select class="form-select" aria-label="Default select example" name="prodi" id="prodi" required>
										<option selected disabled>Pilih Prodi</option>
										<option>Teknik Informatika</option>
										<option>Teknik Industri</option>
										<option>Peternakan</option>
									</select>
								</div>
								<div class="row">
									<div class="form-group mb-3 col-md-6">
										<select class="form-select" aria-label="Default select example" name="semester" id="semester" required>
											<option selected disabled>Pilih Semester</option>
											<option value="1" class="text">Semester 1</option>
											<option value="2">Semester 2</option>
											<option value="3">Semester 3</option>
											<option value="4">Semester 4</option>
											<option value="5">Semester 5</option>
											<option value="6">Semester 6</option>
											<option value="7">Semester 7</option>
											<option value="8">Semester 8</option>
											<option value="9">Semester 9</option>
											<option value="10">Semester 10</option>
											<option value="10+">Semester 10+</option>
										</select>
									</div>
									<div class="form-group mb-3 col-md-6">
										<select class="form-select" aria-label="Default select example" name="jk" id="jk" required>
											<option selected disabled>Pilih Jenis Kelamin</option>
											<option>Laki - Laki</option>
											<option>Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col-auto">
									<div class="input-group">
										<div class="input-group-text">Tanggal</div>
										<input type="date" name="tgl_diagnosa" id="tgl_diagnosa" class="form-control" required>
									</div>
								</div>
							</div>
						</div>

						<!-- Form Step 2 - Pilih Gejala -->
						<div id="step2">
							<div class="card-header">
								<a type="button" class="btn btn-outline-danger btn-sm mt-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#panduan">
									<i class="fas fa-book"></i> Panduan
								</a>
								<h5 class="m-0 font-weight-bold text-primary m-2">
									<font color="#8B0000">Pertanyaan Tentang Anda</font>
								</h5>
							</div>
							<div class="card-body">
								<div class="form-group mt-2">
									<label for="exampleFormControlSelect1" class="mb-2">Apakah anda melakukan test ini untuk diri sendiri atau orang lain?</label>
									<select class="form-select" aria-label="Default select example" name="p_1" id="p_1" required>
										<option selected disabled>--Pilih--</option>
										<option>Untuk Diri Saya</option>
										<option>Untuk Orang Lain</option>
									</select>
								</div>
								<div class="form-group mt-4">
									<label for="exampleFormControlSelect1" class="mb-2">Berapa rentan usia anda?</label>
									<select class="form-select" aria-label="Default select example" name="p_2" id="p_2" required>
										<option selected disabled>--Pilih--</option>
										<option>16-17 Tahun</option>
										<option>18-20 Tahun</option>
										<option>21-25 Tahun</option>
										<option>26-30 Tahun</option>
										<option>31-40 Tahun</option>
									</select>
								</div>
								<div class="form-group mt-4">
									<label for="exampleFormControlSelect1" class="mb-2">Apakah anda sedang mempunyai masalah?</label>
									<select class="form-select" aria-label="Default select example" name="p_3" id="p_3" required>
										<option selected disabled>--Pilih--</option>
										<option>Ya</option>
										<option>Tidak</option>
									</select>
								</div>
								<div class="form-group mt-4">
									<label for="exampleFormControlSelect1" class="mb-2">Apakah ada masalah berikut yang menggambarkan anda sekarang?</label>
									<select class="form-select" aria-label="Default select example" name="p_4" id="p_4" required>
										<option selected disabled>--Pilih--</option>
										<option>Tidak Ada</option>
										<option>Masalah ekonomi keluarga</option>
										<option>Masalah orang tua (bercerai)</option>
										<option>Masalah hubungan (keluarga, teman, pasangan atau sebagainya)</option>
										<option>Kehilangan seseorang yang berharga (meninggal dunia)</option>
										<option>Masalah pekerjaan </option>
										<option>Tekanan Skripsi dan semacamnya</option>
										<option>Masalah pembayaran kuliah</option>
										<option>Korban bullying (Dikampus ataupun diluar kampus)</option>
									</select>
								</div>
								<div class="form-group mt-4">
									<label for="exampleFormControlSelect1" class="mb-2">Apakah anda mempunyai keluhan lain?</label>
									<textarea rows="3" type="text" class="form-control" id="p_5" placeholder="Isi keluhan anda disini" name="p_5" required></textarea>
								</div>
							</div>
						</div>

						<!-- Form Step 3 - Pilih Gejala -->
						<div id="step3">
							<div class="card-header">
								<a type="button" class="btn btn-outline-danger btn-sm mt-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#panduan">
									<i class="fas fa-book"></i> Panduan
								</a>
								<h5 class="m-0 font-weight-bold text-primary m-2">
									<font color="#8B0000">Pilih Gejala</font>
								</h5>
							</div>
							<div class="card-body">
								<div class="accordion" id="accordionExample">
									<div class="accordion-item mt-4">
										<h2 class="accordion-header" id="headingTwo">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<i class="fas fa-stethoscope"></i>
												&nbsp; <strong>Pilih Gejala</strong>
											</button>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<div class="table-responsive">
													<table class="table table-bordered" width="100%" cellspacing="0">
														<thead>
															<tr>
																<th>Kode</th>
																<th>Gejala</th>
																<th>Pilih Nilai</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1; ?>
															<?php foreach ($result as $gejala) : ?>
																<tr>
																	<td>
																		<input class="form-check-input" type="checkbox" name="selectedGejala[]" value="<?= $gejala['id_gejala'] ?>" id="check<?= $gejala['id_gejala'] ?>">
																		<label class="form-check-label" for="check<?= $gejala['id_gejala'] ?>"><?= $gejala['kode_gejala'] ?></label>
																	</td>
																	<td>
																		<label class="form-check-label" for="check<?= $gejala['id_gejala'] ?>">Apakah <?= $gejala['nama_gejala'] ?>?</label>
																	</td>
																	<td>
																		<select class="btn btn-outline-danger btn-sm cf-select" name="cf[]" required disabled>
																			<option selected disabled>Pilih</option>
																			<?php foreach ($listCFMahasiswa as $item) : ?>
																				<option value="<?= $item['id_cf_mahasiswa'] ?>">
																					<?= $item['nama_nilai'] ?>
																				</option>
																			<?php endforeach; ?>
																		</select>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Navigation Buttons -->
						<div class="mx-auto mb-4 mt-2 text-center">
							<button type="button" class="btn btn-outline-danger" id="prevBtn" onclick="previousStep()"><i class="fas fa-chevron-left"></i> Back</button>
							<button type="button" class="btn btn-outline-danger" id="nextBtn" onclick="nextStep()">Next <i class="fas fa-chevron-right"></i></button>
							<button type="submit" class="btn btn-outline-danger mx-1" id="submitBtn">Mulai Diagnosa <i class="fas fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>

<script>
	const checkboxes = document.querySelectorAll('.form-check-input');
	const cfSelects = document.querySelectorAll('.cf-select');

	checkboxes.forEach((checkbox, index) => {
		checkbox.addEventListener('change', () => {
			if (checkbox.checked) {
				cfSelects[index].removeAttribute('disabled');
			} else {
				cfSelects[index].setAttribute('disabled', 'disabled');
			}
		});
	});
</script>

<script>
	const formSteps = document.querySelectorAll('[id^="step"]');
	const prevButton = document.getElementById('prevBtn');
	const nextButton = document.getElementById('nextBtn');
	const submitButton = document.getElementById('submitBtn');
	let currentStep = 0;

	function showStep(stepIndex) {
		formSteps.forEach((step, index) => {
			if (index === stepIndex) {
				step.style.display = 'block';
			} else {
				step.style.display = 'none';
			}
		});

		if (stepIndex === 0) {
			prevButton.style.display = 'none';
		} else {
			prevButton.style.display = 'inline-block';
		}

		if (stepIndex === formSteps.length - 1) {
			nextButton.style.display = 'none';
			submitButton.style.display = 'inline-block';
		} else {
			nextButton.style.display = 'inline-block';
			submitButton.style.display = 'none';
		}
	}

	function previousStep() {
		if (currentStep > 0) {
			currentStep--;
			showStep(currentStep);
		}
	}

	function nextStep() {
		if (currentStep < formSteps.length - 1) {
			if (currentStep === 0) {
				const biodataFields = formSteps[currentStep].querySelectorAll('input, select');
				let isBiodataComplete = true;

				biodataFields.forEach(field => {
					if (field.value.trim() === '' || (field.tagName === 'SELECT' && field.value === 'Pilih Prodi') || (field.tagName === 'SELECT' && field.value === 'Pilih Semester') || (field.tagName === 'SELECT' && field.value === 'Pilih Jenis Kelamin')) {
						isBiodataComplete = false;
					}
				});

				if (!isBiodataComplete) {
					alert('Form biodata anda belum lengkap!');
					return;
				}
			} else if (currentStep === 1) {
				const gejalaFields = formSteps[currentStep].querySelectorAll('select, textarea');
				let isGejalaComplete = true;

				gejalaFields.forEach(field => {
					if (field.value.trim() === '' || (field.tagName === 'SELECT' && field.value === '--Pilih--')) {
						isGejalaComplete = false;
					}
				});

				if (!isGejalaComplete) {
					alert('Form gejala anda belum lengkap!');
					return;
				}
			}

			currentStep++;
			showStep(currentStep);
		}
	}

	showStep(currentStep);
</script>

<script>
    // Batasi panjang input pada elemen number menjadi maksimal 15 karakter
	document.getElementById("nim").addEventListener("input", function() {
		if (this.value.length > 15) {
			this.value = this.value.slice(0, 15);
		}
	});
</script>

<script>
    // Batasi panjang input pada elemen textarea menjadi maksimal 150 karakter
	document.getElementById("p_5").addEventListener("input", function() {
		if (this.value.length > 350) {
			this.value = this.value.slice(0, 350);
		}
	});
</script>

<script>
    // Atur tanggal default saat aplikasi dibuka
	let today = new Date().toISOString().substr(0, 10);
	document.getElementById("tgl_diagnosa").value = today;
</script>


<!-- Modal - Panduan -->
<div class="modal fade" id="panduan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Panduan Cek Diagnosa</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<ol>
					<li>Pilih gejala yang Anda alami dengan cara mencentang kode gejala yang ingin dipilih.</li>
					<li>Selanjutnya, pilih nilai pada gejala yang telah Anda centang.</li>
					<li>Lanjutkan memilih gejala selanjutnya dengan cara yang sama.</li>
					<li>Setelah semua gejala terpilih, klik tombol "Mulai Diagnosa" untuk memulai proses diagnosis.</li>
				</ol>
				<hr>
				<p><strong>Catatan:</strong></p>
				<ol>
					<li>Sistem akan mengalami error jika biodata tidak diisi dengan lengkap.</li>
					<li>Sistem juga akan mengalami error jika kode gejala yang Anda pilih tidak dicentang.</li>
					<li>Pastikan untuk mengisi nilai pada gejala yang Anda pilih.</li>
				</ol>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>



<?= $this->endSection() ?>