<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Welcome To Stewardship</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <!-- Custom fonts for this template -->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link rel="shortcut icon" type="x-icon" href="admin_assets/img/tab-icon.png" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
    rel="stylesheet"
  />
  <!-- Optional: your custom css or sb-admin-2.min.css -->
</head>
<body
  class="min-h-screen flex items-center justify-center"
  style="
    background-image: url('https://i.ibb.co/5hCyzs0L/plant.png');
    background-color: rgba(67, 94, 190, 0.2); /* Higher alpha = darker overlay = more faded image */
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-blend-mode: overlay;
  "
>




  <div class="w-full min-h-screen flex flex-col md:flex-row">
    <!-- Left: Login Form (40%) -->
    <div
      class="w-full md:w-2/5 bg-white flex flex-col justify-center px-8 py-12 shadow-lg" style="min-height: 100vh; background-color: #151521;">
      <div class="max-w-md mx-auto w-full">
        <div class="mb-8 text-left">
          <h1 class="text-3xl font-semibold text-white">Login</h1>
          <h3 class="text-white" style="padding-top:1px;">Log in with your data provided by your administrator. </h3>
        </div>
        <form action="{{ route('login.action') }}" method="POST" class="space-y-6">
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
              name="email"
              type="email"
              placeholder="Enter Email Address..."
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required
            />
          </div>
          <div>
            <input
              name="password"
              type="password"
              placeholder="Password"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required
            />
          </div>
          <div class="flex items-center">
            <input
              id="remember"
              name="remember"
              type="checkbox"
              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
            />
            <label for="remember" class="ml-2 block text-sm text-white">Remember Me</label>
          </div>
          <button
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition" style="background-color: #435ebe;">
            Login
          </button>
        </form>
        <hr class="my-6 border-white-900" />
        <div class="text-center">
          <a href="{{ route('register') }}" class="text-white hover:text-indigo-800 font-medium text-sm"
            >Don’t have an account? Contact Admin</a
          >
        </div>
      </div>
    </div>

    <!-- Right: Image (60%) -->
    <div
      class="hidden md:block md:w-3/5 bg-cover bg-center"
      style="background-image: url('admin_assets/img/login-image.jpg'); min-height: 100vh"
      aria-label="Login image"
    ></div>
  </div>

  <!-- Optional: your scripts here -->
</body>
</html>
