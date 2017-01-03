<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/css/app.css" rel="stylesheet">
<script> window.Sintoniza = <?php echo json_encode(['csrfToken' => csrf_token()]); ?> </script>