<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('public/css_pdf/style.css') }}">
</head>

<body>

    @include('admin.services.pdf_contract')
    @include('admin.services.pdf_contract2')
    @include('admin.services.pdf_contract3')
    @include('admin.services.pdf_contract4')
</body>

</html>