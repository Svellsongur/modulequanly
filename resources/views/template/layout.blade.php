<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Bootstrap Đơn giản</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">

    {{-- Hàm asset: trỏ trực tiếp đến folder public --}}
</head>

<body>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        @yield('content') <br>
        @include('template.error')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center p-3 mt-4">
        <p>Đây là footer của trang web.</p>
        <p></p>
    </footer>
    <script src=" {{ asset('bootstrap/js/bootstrap.js') }}"></script>

    {{-- code bổ sung --}}
    <script src="{{ asset('bootstrap/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('bootstrap/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
    
                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };
    
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_anh").change(function () {
                readURL(this, '#anh_the_preview');
            });
    
        });
    </script>
</body>

</html>