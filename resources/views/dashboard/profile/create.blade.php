@extends('dashboard.layout')

@section('konten')
<div class="pb-3"><a href="{{ route('profile.index') }}" class="btn btn-secondary">Kembali</a></div>

    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control form-control sm" name="alamat" id="alamat" aria-describedby="helpId" placeholder="Alamat" value="{{ old('alamat') }}">
        </div>

        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control form-control sm" name="kontak" id="kontak" aria-describedby="helpId" placeholder="Kontak" value="{{ old('kontak') }}">
        </div>

        <div class="mb-3">
            <label for="riwayatPendidikan" class="form-label">Riwayat Pendidikan</label>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Sekolah/Universitas</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Keluar</th>
                    </tr>
                </thead>
                <tbody id="Pendidikan">
                    <tr>
                        <td><input type="text" class="form-control" name="riwayatPendidikan[0][namaSekolah]" placeholder="Nama Sekolah/Universitas" required value="{{ old('namaSekolah') }}"></td>
                        <td><input type="text" class="form-control" name="riwayatPendidikan[0][thn_mulai]" placeholder="Tahun Masuk" required value="{{ old('thn_mulai') }}"></td>
                        <td><input type="text" class="form-control" name="riwayatPendidikan[0][thn_akhir]" placeholder="Tahun Keluar" required value="{{ old('thn_akhir') }}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary" id="tambahRiwayatPendidikan">Tambah Riwayat Pendidikan</button>
        </div>

        <div class="mb-3">
            <label for="riwayatPekerjaan" class="form-label">Riwayat Pekerjaan</label>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Domisili Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                    </tr>
                </thead>
                <tbody id = "Pekerjaan">
                    <tr>
                        <td><input type="text" class="form-control" name="riwayatPekerjaan[0][namaPerusahaan]" placeholder="Nama Perusahaan" required value="{{ old('namaPerusahaan') }}"></td>
                        <td><input type="text" class="form-control" name="riwayatPekerjaan[0][domisilPerusahaan]" placeholder="Domisili Perusahaan" required value="{{ old('domisiliPerusahaan') }}"></td>
                        <td><input type="text" class="form-control" name="riwayatPekerjaan[0][jabatan]" placeholder="Jabatan" required value="{{ old('jabatan') }}"></td>
                        <td><input type="date" class="form-control" name="riwayatPekerjaan[0][tgl_mulai]" required value="{{ old('tgl_mulai') }}"></td>
                        <td><input type="date" class="form-control" name="riwayatPekerjaan[0][tgl_akhir]" required value="{{ old('tgl_akhir') }}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary" id="tambahRiwayatPekerjaan">Tambah Riwayat Pekerjaan</button>
        </div>

        <div class="mb-3">
            <label for="hardskill" class="form-label">Skills</label>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Skill</th>
                        <th>Tingkat (%)</th>
                    </tr>
                </thead>
                <tbody id="hardSkill">
                    <tr>
                        <td><input type="text" class="form-control" name="hardSkills[0][namaSkill]" placeholder="Nama Skill" required value="{{ old('namaSkill') }}"></td>
                        <td><input type="number" class="form-control" name="hardSkills[0][tingkatanSkill]" placeholder="Tingkat (%) (0-100)" required value="{{ old('tingkatanSkill') }}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary" id="tambahSkill">Tambah skill</button>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar">

            <label for="portofolio" class="form-label">Portofolio</label>
            <input type="file" class="form-control" name="portofolio[]" id="portofolio" multiple>
        </div>

        <div class="mb-3">
            <label for="dataDiri" class="form-label">Deskripsi Diri</label>
            <textarea class="form-control" rows="5" name="dataDiri" value="{{ old('daraDiri') }}"></textarea>
        </div>

        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>

    <script>
        let riwayatPekerjaanIndex = 1;

        document.getElementById('tambahRiwayatPekerjaan').addEventListener('click', function() {
            let newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][namaPerusahaan]" placeholder="Nama Perusahaan" required value="{{ old('namaPerusahaan') }}"></td>
                <td><input type="text" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][domisilPerusahaan]" placeholder="Domisili Perusahaan" required value="{{ old('domisiliPerusahaan') }}"></td>
                <td><input type="text" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][jabatan]" placeholder="Jabatan" required value="{{ old('jabatan') }}"></td>
                <td><input type="date" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][tgl_mulai]" required value="{{ old('tgl_mulai') }}"></td>
                <td><input type="date" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][tgl_akhir]" required value="{{ old('tgl_akhir') }}"></td>
            `;
            document.getElementById('Pekerjaan').appendChild(newRow);
            riwayatPekerjaanIndex++;
        });

        let riwayatPendidikanIndex = 1;

        document.getElementById('tambahRiwayatPendidikan').addEventListener('click', function() {
            let newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="form-control" name="riwayatPendidikan[${riwayatPendidikanIndex}][namaSekolah]" placeholder="Nama Sekolah/Universitas" required value="{{ old('namaSekolah') }}"></td>
                <td><input type="text" class="form-control" name="riwayatPendidikan[${riwayatPendidikanIndex}][thn_mulai]" placeholder="Tahun Masuk" required value="{{ old('thn_mulai') }}"></td>
                <td><input type="text" class="form-control" name="riwayatPendidikan[${riwayatPendidikanIndex}][thn_akhir]" placeholder="Tahun Keluar" required value="{{ old('thn_akhir') }}"></td>
            `;
            document.getElementById('Pendidikan').appendChild(newRow);
            riwayatPekerjaanIndex++;
        });

        let hardSkillIndex = 1;

        document.getElementById('tambahSkill').addEventListener('click', function() {
            let newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="form-control" name="hardSkills[${hardSkillIndex}][namaSkill]" placeholder="Nama Skill" required value="{{ old('namaSkill') }}"></td>
                <td><input type="number" class="form-control" name="hardSkills[${hardSkillIndex}][tingkatanSkill]" placeholder="Tingkat (%) (0-100)" required value="{{ old('tingkatanSkill') }}"></td>
            `;
            document.getElementById('hardSkill').appendChild(newRow);
            hardSkillIndex++;
        });

    </script>
</div>
@endsection
