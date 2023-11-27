    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
        <div class="suha-footer-nav">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
                <li><a href="home.html"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="message.html"><i class="fa-solid fa-comment-dots"></i>Chat</a></li>
                <li><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i>Basket</a></li>
                <li><a href="/setting"><i class="fa-solid fa-gear"></i>Settings</a></li>
                <li><a href="pages.html"><i class="fa-solid fa-heart"></i>Pages</a></li>
            </ul>
        </div>
    </div>

    @include('sweetalert::alert')

    <!-- All JavaScript Files-->
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('dist/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.passwordstrength.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('dist/js/theme-switching.js') }}"></script>
    <script src="{{ asset('dist/js/no-internet.js') }}"></script>
    <script src="{{ asset('dist/js/active.js') }}"></script>
    <script src="{{ asset('dist/js/pwa.js') }}"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
    @stack('scripts')
