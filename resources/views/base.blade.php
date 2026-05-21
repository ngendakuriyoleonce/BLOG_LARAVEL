<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title')</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
   <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>

<nav class="bg-black shadow-md">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between h-16">
      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center space-x-6 text-white">
        <a href="{{Route('home')}}" class=" hover:text-blue-600">HOME</a>
        <a href="{{route('MailForm')}}" class=" hover:text-blue-600">CONTACT</a>
      </div>
         <div class="hidden md:flex items-center space-x-6 text-white">
         <a href="{{Route('login')}}" class="hover:text-blue-600">LOGIN</a></div>
    </div>
 
  </div>
</nav>
<div>
    @yield('content')
</div>

</body>
</html>