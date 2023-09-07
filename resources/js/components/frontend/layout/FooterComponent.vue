<template>
    <footer>

        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">

                        <a class="logo" href="#">{{ app_settings[0].setting_value }}</a>
                        <p class="copyright">{{ app_settings[1].setting_value }}</p>
                        <p class="copyright">{{ footer_settings[0].setting_value }}</p>
                        <ul class="icons">
                            <li><a target="_blank" :href="social_settings[0].setting_value"><i class="ion-social-facebook-outline"></i></a></li>
                            <li><a target="_blank" :href="social_settings[1].setting_value"><i class="ion-social-linkedin-outline"></i></a></li>
                            <li><a target="_blank" :href="social_settings[2].setting_value"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a target="_blank" :href="social_settings[3].setting_value"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>

                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->

                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <h4 class="title"><b>CATAGORIES</b></h4>
                        <ul>
                            <li><a href="#">BEAUTY</a></li>
                            <li><a href="#">HEALTH</a></li>
                            <li><a href="#">MUSIC</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">SPORT</a></li>
                            <li><a href="#">DESIGN</a></li>
                            <li><a href="#">TRAVEL</a></li>
                        </ul>
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->

                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">

                        <h4 class="title"><b>SUBSCRIBE</b></h4>
                        <div class="input-area">
                            <form>
                                <input class="email-input" type="text" placeholder="Enter your email">
                                <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                            </form>
                        </div>

                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->

            </div><!-- row -->
        </div><!-- container -->
    </footer>
</template>

<script>
    export default {
        props:['app_settings', 'social_settings', 'footer_settings'],
        name: "FooterComponent"
    }
</script>

<style scoped>

</style>
