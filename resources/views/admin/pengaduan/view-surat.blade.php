
            <div class="col-lg-8 mb-3">
                <div class="card px-3">
                    <table class="table table-bordered mt-5">

                        <tbody>
                            <tr>
                                <th scope="row">Nama Terlapor</th>
                                <td>{{ $data['nama_terlapor'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul perkara</th>
                                <td>{{ $data['judul_perkara'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul perkara</th>
                                <td>{{ $data['deskripsi'] }}</td>
                            </tr>
                         
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ $data['status'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Hasil</th>
                                <td>{{ $data['hasil'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal</th>
                                <td>{{ $data['tanggal'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Rujukan</th>
                                <td>{{ $data['rujukan'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>