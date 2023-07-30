<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; {{ date('Y') }}.
    </div>
    <div class="footer-right">
        Versi 1.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/swipe/2.0.0/swipe.min.js"
    integrity="sha512-xC1fS6NWgwCMJd/b5MT0Ci1DttjZ2qTxmXHQnUIyWDJddui/jiC5QwAokElrYYT9SOlK/bKMz0UBYJYi1JxdDw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- sweet alert --}}
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

{{-- Bootstrap bundle --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>

<script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
<script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->


<!-- Page Specific JS File -->
<script src="{{ asset('stisla/pages/bootstrap-modal.html') }}"></script>

<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/home/main.js') }}"></script>
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
<script src="https://kit.fontawesome.com/3423f55a30.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('script')
</body>

</html>
