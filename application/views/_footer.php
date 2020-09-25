<!-- Start Footer Area -->
<footer class="htc__footer__area">
    <!-- Start Footer Top Area -->
    <div class="footer__top" data--black__overlay="8"
         style="background: rgba(0, 0, 0, 0) url(<?php echo base_url('assets/frontend/images/bg/3.jpg')?>) no-repeat scroll 0 0 / cover ;">
        <div class="container">
            <div class="row footer__wrap">
                <!-- Start Single Content -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="footer">
                        <div class="ft__logo">
                            <a href="<?php echo base_url('home')?>">
                                <img src="<?php echo base_url('assets/frontend/images/logo/pesh-logo.png')?>" alt="footer logo">
                            </a>
                        </div>
                        <div class="ft__deatails">
                            <p>Lorem ipsum dolor sit amet, consectetur adipimisicing elit text. seius imod
                                tempor incididunt ut labore ewanmt dolore maliqua. eniim nilapiad minim
                                veniam, quis nostrudiullamco laboris niutalquip ex ea commodo</p>
                        </div>
                        <ul class="social__icon">
                            <li><a href="<?php echo $this->settings->twitter_page;?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $this->settings->instagram_page;?>"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="<?php echo $this->settings->facebook_page;?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $this->settings->google_plus_page;?>"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Content -->
                <!-- Start Single Content -->
                <div class="col-lg-3 offset-lg-1 col-md-6 col-12 xsmt--40">
                    <div class="footer">
                        <h2 class="footer__title">Information</h2>
                        <div class="footer__content">
                            <ul class="ft__menu">
                                <li><a href="<?php echo base_url('aboutus')?>">about</a></li>
                                <li><a href="<?php echo base_url('gallery')?>">gallery</a></li>
                                <li><a href="<?php echo base_url('collection')?>">collections</a></li>
                                <li><a href="<?php echo base_url('contact')?>">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Content -->
                <!-- Start Single Content -->
                <div class="col-lg-4 col-12 smmt--30 xsmt--40">
                    <div class="footer">
                        <h2 class="footer__title">Reach out to us</h2>
                        <div class="ft__recent__post">
                            <div class="ft__single__post">

                                <ul class="ft__post__list">
<!--                                    <li><i class="fa fa-map-marker"></i>Peshawar Museum</li>-->
                                    <li><i class="fa fa-clock-o"></i><?php echo $this->settings->timings;?></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Single Content -->
            </div>
        </div>
    </div>
    <!-- End Footer Top Area -->
    <!-- Start Footer Bottom -->
    <div class="footer__bottom bg__cat--1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <div class="copyright__inner">
                            <p>Copyright <?php echo date("Y"); ?> <a href="<?php echo base_url('home')?>">Peshawar Museum.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer Area -->
<!-- End Gallery Area -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="<?php echo base_url('assets/frontend/js/vendor/jquery-1.12.0.min.js')?>"></script>
<!-- Bootstrap framework js -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
<!-- All js plugins included in this file. -->
<script src="<?php echo base_url('assets/frontend/js/plugins.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/slick.min.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/owl.carousel.min.js')?>"></script>
<!-- Waypoints.min.js. -->
<script src="<?php echo base_url('assets/frontend/js/waypoints.min.js')?>"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="<?php echo base_url('/assets/frontend/js/main.js')?>"></script>

</body>
</html>