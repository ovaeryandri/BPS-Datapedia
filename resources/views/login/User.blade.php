<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>BPS User | Login</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-blue-50 flex items-center justify-center py-20 overflow-hidden">

  <main class="w-full max-w-6xl mx-auto rounded-2xl flex flex-col lg:flex-row shadow-2xl bg-white">

  <!-- Section Kiri -->
  <section class="w-full lg:w-1/2 h-auto bg-primary rounded-t-2xl lg:rounded-l-2xl lg:rounded-tr-none px-5 py-8 flex flex-col items-center">
    <h1 class="text-white font-bold text-3xl text-center">Selamat Datang</h1>
    <p class="text-white font-semibold text-sm mt-5 text-center">Masukkan Email dan Username Anda</p>
    <img src="{{ asset('image/loginUser.png') }}" alt="" class="h-64 lg:h-96 mt-10 object-contain">
  </section>

  <!-- Form Login -->

  <form action="{{ route('prosesloginUser') }}" method="POST"
    class="w-full lg:w-1/2 h-auto flex flex-col items-center px-4 sm:px-8 lg:px-20 py-8">

    @csrf

    @if($errors->has('invalid_no_hp') || $errors->has('invalid_nama'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 w-full text-center">
            {{ $errors->first('invalid_no_hp') ?? $errors->first('invalid_nama') }}
        </div>
    @endif

    @if (session('success'))
      <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative w-full mb-4">
        {{ session('success') }}
      </div>
    @endif

    <h1 class="text-black font-bold text-2xl text-center">Silahkan Login</h1>

    <!-- Input Nomor HP -->
    <div class="flex flex-col w-full mt-8 relative">
      <label for="no_hp" class="text-black font-semibold text-sm mb-1">Nomor Handphone</label>
      <img src="{{ asset('image/phone.png') }}" alt="phone" class="absolute left-3 top-9 w-5 h-5">
      <input type="text" name="no_hp" placeholder="Masukkan Nomor Handphone"
        class="w-full py-2 px-10 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('no_hp') }}">
        @error('no_hp')
            <p class="text-red-600 text-sm">{{ $message }}</p>
          @enderror
    </div>

    <!-- Input Username -->
    <div class="flex flex-col w-full mt-5 relative">
      <label for="nama" class="text-black font-semibold text-sm mb-1">Username</label>
      <img src="{{ asset('image/user.png') }}" alt="user" class="absolute left-3 top-9 w-5 h-5">
      <input type="text" name="nama" id="passwordInput" placeholder="Masukkan Username"
        class="w-full py-2 px-10 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('nama') }}">
        @error('nama')
            <p class="text-red-600 text-sm">{{ $message }}</p>
          @enderror
    </div>

    <!-- Tombol Login -->
    <button type="submit"
      class="w-full bg-primary py-2 rounded-xl text-white font-bold mt-7 hover:bg-primary/90 transition">
      Masuk
    </button>

    <!-- Link Registrasi -->
    <div class="text-sm text-slate-600 font-semibold mt-5 text-center">
      <p class="mr-1">Belum Memiliki Akun?
        <a href="{{ route('registerUser') }}" class="hover:underline text-primary">Bikin akun dulu yuk!!</a>
      </p>
    </div>
  </form>
</main>


  @if (session('session_timeout'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'warning',
            title: 'Sesi Anda telah berakhir',
            text: 'Silakan login kembali untuk melanjutkan.',
            confirmButtonText: 'Login Ulang',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('loginUser') }}";
            }
        });
    });
</script>
@endif


  <script>
    const passwordInput = document.getElementById('passwordInput');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      if (type === 'text') {
        eyeIcon.setAttribute('stroke', 'blue');
      } else {
        eyeIcon.setAttribute('stroke', 'currentColor');
      }
    });
  </script>

</body>

</html>
