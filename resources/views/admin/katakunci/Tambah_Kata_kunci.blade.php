    @extends('admin.layouts.container')
    @section('container')
        <!-- Topbar -->
        <div class="container-fluid">
            <div class="row">
                <!-- Begin Page Content -->
                <div class="col-md-12 bg-light py-5 px-2">
                    <form class="row px-3" action="" method="POST">
                        @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                        <div class="mb-3 col-md-6 ">
                            <label for="katakunci" class="form-label">kata kunci</label>
                            <input placeholder="Masukkan kata kunci" value="{{ old('katakunci') }}" name="katakunci"
                                type="text" class="form-control" id="katakunci">
                            @error('katakunci')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="kategori" class="form-label">kategori</label>
                            <select id="kategori" name="kategori" class="form-control">
                                <option value="" selected>Pilih kategori </option>
                                <option value="Perdata">Perdata</option>
                                <option value="Pidana">Pidana</option>
                            </select>

                            @error('kategori')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="keterangan" class="form-label">keterangan</label>
                            <input placeholder="Masukkan keterangan" value="{{ old('keterangan') }}" name="keterangan"
                                type="text" class="form-control" id="keterangan">
                            @error('keterangan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-success w-100">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endsection
