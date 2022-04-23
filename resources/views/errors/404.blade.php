<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/front/Css/sheet.css') }}">
  <title>404 page design</title>
</head>
<body>
  <div class="container">
    <h2>Oops! page not found.</h2>
    <h1>404</h1>
    <p>We can't find the page you're looking for.</p>
    <a href="{{ url()->previous() }}">Let's Go Home</a>
  </div>
  {{-- <script src="{{ asset('assets/front/Js/main.js') }}"></script> --}}
</body>
</html>