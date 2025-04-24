<!-- Footer Start -->
<footer class="ehsan-footer text-white pt-5 pb-4">
    <div class="container text-md-left">
        <div class="row text-md-left">

            <!-- Logo + Description -->
            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mt-3">
                <h4 class="mb-4 d-flex align-items-center" style="gap: 10px;">
                    <img src="{{ asset('img/Ehsan_Logo2.png') }}" alt="Ehsan Logo" style="width: 60px; height: 60px;">
                    <span class="fw-bold text-light">Ehsan</span>
                </h4>
                <p class="text-light-emphasis">Une plateforme solidaire qui connecte donateurs et associations pour créer un impact positif et durable.</p>
                <div class="mt-3">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Liens utiles -->
            <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mt-3 text-light">
                <h6 class="text-light fw-bold mb-4">Liens utiles</h6>
                <p><a href="#" class="footer-link">Accueil</a></p>
                <p><a href="#" class="footer-link">À propos</a></p>
                <p><a href="#" class="footer-link">Nos projets</a></p>
                <p><a href="#" class="footer-link">Contact</a></p>
            </div>

            <!-- Contact -->
            <div class="col-md-5 col-lg-5 col-xl-4 mx-auto mt-3">
                <h6 class="text-light fw-bold mb-4">Contact</h6>
                <p><i class="fas fa-map-marker-alt me-2"></i> Casablanca, Maroc</p>
                <p><i class="fas fa-envelope me-2"></i> contact@ehsan.org</p>
                <p><i class="fas fa-phone me-2"></i> +212 6 00 00 00 00</p>
            </div>
        </div>

        <hr class="my-4 text-secondary" />

        <!-- Copyright -->
        <div class="row text-center text-md-start">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} Ehsan. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">Développé par <a href="#" class="footer-link fw-semibold">Yassin Rmichi</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->



<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>


<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
