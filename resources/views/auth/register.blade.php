<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Register - Stewardship</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  
  <!-- Fonts and Icons -->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link rel="shortcut icon" type="x-icon" href="admin_assets/img/tab-icon.png" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />
</head>
<body class="min-h-screen flex items-center justify-center" style="
  background-image: url('https://i.ibb.co/5hCyzs0L/plant.png');
  background-color: rgba(67, 94, 190, 0.2);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-blend-mode: overlay;
">

  <div class="w-full min-h-screen flex flex-col md:flex-row">
    <!-- Left: Register Form -->
    <div class="w-full md:w-2/5 bg-white flex flex-col justify-center px-8 py-12 shadow-lg" style="min-height: 100vh; background-color: #151521;">
      <div class="max-w-md mx-auto w-full">
        <div class="mb-8 text-left">
          <h1 class="text-3xl font-semibold text-white">Create an Account</h1>
          <h3 class="text-white pt-1">Please fill in your details to register.</h3>
        </div>

        <form action="{{ route('register.save') }}" method="POST" class="space-y-6">
          @csrf

          @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div>
            <input
              name="name"
              type="text"
              placeholder="Name"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
              required
            />
            @error('name')
              <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <input
              name="email"
              type="email"
              placeholder="Email Address"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
              required
            />
            @error('email')
              <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full">
              <input
                name="password"
                type="password"
                placeholder="Password"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror"
                required
              />
              @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="w-full">
              <input
                name="password_confirmation"
                type="password"
                placeholder="Repeat Password"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password_confirmation') border-red-500 @enderror"
                required
              />
              @error('password_confirmation')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <button
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition"
            style="background-color: #435ebe;"
          >
            Register Account
          </button>
        </form>

        <hr class="my-6 border-white-900" />

        <div class="text-center">
          <a href="{{ route('login') }}" class="text-white hover:text-indigo-300 font-medium text-sm">
            Already have an account? Login!
          </a>
        </div>
      </div>
    </div>

    <!-- Right: Image -->
    <div
      class="hidden md:block md:w-3/5 bg-cover bg-center"
      style="background-image: url('admin_assets/img/login-image.jpg'); min-height: 100vh"
      aria-label="Register image"
    ></div>
  </div>

</body>
</html>
