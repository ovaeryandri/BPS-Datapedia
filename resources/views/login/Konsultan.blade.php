<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>BPS Konsultan | Login</title>
</head>

<body class="bg-blue-50 flex items-center justify-center py-20 overflow-hidden">

  <main class="w-9/12 max-h-screen rounded-2xl flex shadow-2xl">

    <form action="{{ route('prosesloginKonsultan') }}" method="POST"
      class="w-full h-full rounded-r-2xl flex flex-col items-center px-20 py-8 pb-12">
      @if (session('success'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative">
          {{ session('success') }}
        </div>
      @endif
      @csrf
      @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h1 class="text-black font-bold text-2xl">Silahkan Login</h1>

      <div class="flex flex-col w-full mt-10 relative">
        <label for="email" class="text-black font-semibold text-sm mb-1">Email</label>
        <img src="{{ asset('image/email.png') }}" alt="email" class="absolute left-3 top-8 flex items-center w-6 h-6">
        <input type="email" name="email" id="" required placeholder="Masukkan Email"
          class="w-full h-max py-2 px-11 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
      </div>

      <div class="flex flex-col w-full mt-5 relative">
        <label for="password" class="text-black font-semibold text-sm mb-1">Kata Sandi</label>
        <img src="{{ asset('image/password.png') }}" alt="email" class="absolute left-3 top-8 flex items-center w-6 h-6">
        <input type="password" name="password" id="passwordInput" required placeholder="Masukkan Kata Sandi"
          class="w-full h-max py-2 px-11 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">

        <button type="button" id="togglePassword" class="absolute right-3 top-9 text-gray-400 hover:text-gray-600">
          <!-- Icon Mata -->
          <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </button>
      </div>

      <button type="submit"
        class="w-full bg-primary py-2 rounded-xl text-white font-bold mt-7 cursor-pointer hover:bg-primary duration-150">
        Masuk
      </button>

      <div class="flex text-sm text-slate-600 font-semibold mt-5">
        <p class="mr-1">Bukan Konsultan?</p>
        <a href="{{ route('loginAdmin') }}" class="hover:underline text-primary"> Kembali ke Admin</a>
      </div>

    </form>

    <section class="w-full h-full bg-primary rounded-l-2xl px-5 py-8 pb-12 flex flex-col items-center">
      <h1 class="text-white font-bold text-3xl">Selamat Datang Konsultan</h1>
      <div class="flex flex-col w-full items-center text-white font-semibold text-sm mt-5">
        <p>Masukkan Email dan Password Anda</p>
        <p>Selamat Bekerja Tetap Semangat!!</p>
      </div>

      <img src="{{ asset('image/login.png') }}" alt="" class="h-96 mt-10">
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
