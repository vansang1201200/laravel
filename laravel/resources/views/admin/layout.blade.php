<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.admin.head')
</head>
<body id="page-top">
<div id="wrapper">
@include('partials.admin.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
        @include('partials.admin.nav')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    @include('partials.admin.footer')
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@include('partials.admin.js')

</body>

</html>
