<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ env('APP_NAME') }} - Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/modules/jqvmap/dist/jqvmap.min.css"> --}}
    <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/modules/summernote/summernote-bs4.css">
    {{-- <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">  --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ env('ASSETS_URL') }}/assets/css/components.css">

    {{-- sweet alert --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @if (Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register')

                {{-- navbar --}}
    
                 @include('layouts.nav')
                
                {{-- SIDEBAR --}}
    
                @include('layouts.sidebar')
               
            @endif
    
            {{-- MAIN COBTENT --}}

            {{ $slot }}
    
            {{-- FOOTER --}}

            @include('layouts.footer')
    

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ env('ASSETS_URL') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/modules/popper.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/modules/tooltip.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/modules/moment.min.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/js/stisla.js"></script>
    
    <!-- JS Libraies -->
    <script src="{{ env('ASSETS_URL') }}/assets/modules/jquery.sparkline.min.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/modules/chart.min.js"></script>
    {{-- <script src="{{ env('ASSETS_URL') }}/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script> --}}
    <script src="{{ env('ASSETS_URL') }}/assets/modules/summernote/summernote-bs4.js"></script>
    {{-- <script src="{{ env('ASSETS_URL') }}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}
    
    <!-- Page Specific JS File -->
    <script src="{{ env('ASSETS_URL') }}/assets/js/page/index.js"></script>
    
    <!-- Template JS File -->
    <script src="{{ env('ASSETS_URL') }}/assets/js/scripts.js"></script>
    <script src="{{ env('ASSETS_URL') }}/assets/js/custom.js"></script>

    {{-- <script>
        window.addEventListener("show-delete-confirmation", event => {
            swal({
    
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                Livewire.emit("deleteConfirmed");
              } else {
                swal("Your imaginary file is safe!");
              }
            });
        });
    </script> --}}
    
</body>
</html>