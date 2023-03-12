<footer class="app-footer">
  <div>
    <a href="">Da Nang Free Walking Tour</a>
  </div>
</footer>
<!-- CoreUI and necessary plugins-->
<script src="admin_asset/vendors/jquery/js/jquery.min.js"></script>
<script src="admin_asset/vendors/popper.js/js/popper.min.js"></script>
<script src="admin_asset/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="admin_asset/vendors/pace-progress/js/pace.min.js"></script>
<script src="admin_asset/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
<script src="admin_asset/vendors/@coreui/coreui/js/coreui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    });
</script>
@yield('script')