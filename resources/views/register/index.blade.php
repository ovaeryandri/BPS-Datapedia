<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>BPS User | Register</title>
</head>

<body class="bg-blue-50 flex items-center justify-center py-20 overflow-hidden">

  <main class="w-9/12 max-h-screen rounded-2xl flex shadow-2xl">

    <form action="{{ route('prosesregisterUser') }}" method="POST"
    class="w-full h-full rounded-r-2xl flex flex-col items-center px-20 py-8 pb-12">
    @csrf
      @if (session('success'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative">
          {{ session('success') }}
        </div>
      @endif

      <h1 class="text-black font-bold text-2xl">Silahkan Buat Akun</h1>

      <div class="flex flex-col w-full mt-10 relative">
        <label for="no_hp" class="text-black font-semibold text-sm mb-1">Nomor Handphone</label>
        <img src="{{ asset('image/phone.png') }}" alt="no_hp" class="absolute left-3 top-8 flex items-center w-6 h-6">
        <input type="no_hp" name="no_hp" id="" placeholder="Masukkan nomor handphone"
          class="w-full h-max py-2 px-11 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('no_hp') }}">
          @error('no_hp')
            <p class="text-red-600 text-sm">{{ $message }}</p>
          @enderror
      </div>

      <div class="flex flex-col w-full mt-5 relative">
        <label for="nama" class="text-black font-semibold text-sm mb-1">Username</label>
        <img src="{{ asset('image/user.png') }}" alt="nama" class="absolute left-3 top-8 flex items-center w-6 h-6">
        <input type="text" name="nama" id="passwordInput" placeholder="Masukkan Username"
          class="w-full h-max py-2 px-11 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('nama') }}">
        @error('nama')
        <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
        class="w-full bg-primary py-2 rounded-xl text-white font-bold mt-7 cursor-pointer hover:bg-primary duration-150">
        Masuk
      </button>

      <div class="flex text-sm text-slate-600 font-semibold mt-5">
        <p class="mr-1">Sudah Memiliki Akun?</p>
        <a href="{{ route('loginUser') }}" class="hover:underline text-primary"> Kembali Ke Halaman Login</a>
      </div>

    </form>


    <section class="w-full h-full bg-primary rounded-l-2xl px-5 py-8 pb-12 flex flex-col items-center">
      <h1 class="text-white font-bold text-3xl">Selamat Datang </h1>
      <div class="flex flex-col w-full items-center text-white font-semibold text-sm mt-5">
        <p>Masukkan Email dan Username Anda</p>
      </div>

      <img src="{{ asset('image/registerUser.png') }}" alt="" class="h-96 mt-10">
    </section>

  </main>

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
