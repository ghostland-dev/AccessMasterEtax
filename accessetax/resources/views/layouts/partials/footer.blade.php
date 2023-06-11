<footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.6.0/alpine.js"></script>
    @auth
        <script src="{{ asset('js/sidebarmenu.js') }}"></script>
        {{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}

    @endauth
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
    <!-- MDB -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" > </script> --}}


    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/costumized.js') }}"></script>

    {{-- <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init({});
    </script> --}}
</footer>
