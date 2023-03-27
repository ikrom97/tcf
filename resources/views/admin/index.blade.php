<!DOCTYPE html>
<html class="page" lang="ru">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Админ панель ФШТ (Федерация шахмат Таджикистана)</title>

  <script defer="defer" src="{{ asset('js/admin.min.js') }}"></script>
</head>

<body class="page__body">
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div class="page__root" id="root"></div>
</body>

</html>
