  @extends('public/layouts/container')
  @section('containerpublic')
      @if (session('success'))
          <script>
              document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                      title: 'Success!',
                      text: "'{{ session('success') }}'",
                      icon: 'success',
                      position: "top",
                      showConfirmButton: false,
                      timer: 1500
                  });
              });
          </script>
      @endif
      <div class="row">
          <div class="col">
              <div class="container mt-3">

                  <h1>Selamat datang warga <span class="text-success"> @isset($user)
                              {{ $user['username'] }}
                          @endisset
                      </span>
                  </h1>

              </div>
          </div>
      </div>
  @endsection
