<footer>
        <div class="logo">
            <img src="assets/images/llogo1.png" alt="">
            <ul>
                <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>

                <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>

                <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>

                <li><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
            </ul>
        </div>
        <div class="links">
            <ul>
                <li><a href="index.php">Home</a></li>

                <li><a href="about-us.php">About Us</a></li>

                <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="links">
            <ul>
                <li><span><i class="fa-solid fa-envelope"></i> Email </span><span><a href="#">info@muzika.com</a></span></li>
                <li><span><i class="fa-solid fa-phone"></i> Phone </span><span><a href="#">383 44 444 444</a></span></li>
                <li><span><i class="fa-solid fa-location-dot"></i> Location </span><span><a href="#">Prizren 20000 Marigona Nr.17</a></span></li>
            </ul>
        </div>

        
    <div class="copyright">
        <span id="copyright">&copy; Made by Dièse</span>
    </div>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var currentYear = new Date().getFullYear();
            document.getElementById("copyright").innerHTML += " " + currentYear;
        });

    </script>
    <!-- CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".slider").slick({
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4500,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                    },
                },
            ],
        });
    </script>
</body>

</html>