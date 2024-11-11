<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
  <link href=”https://fonts.googleapis.com/css?family=Noto+Sans+JP&amp;subset=japanese” rel=”stylesheet”>
  <title>mogitate</title>
</head>

<body>
  <header class="header">
    <span class="header_ttl-logo">mogitate</span>
  </header>
  <main>
    @yield('content')
  </main>
</body>

</html>