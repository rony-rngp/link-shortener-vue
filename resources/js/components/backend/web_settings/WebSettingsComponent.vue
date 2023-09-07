<template>
    <div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-4">Web Setting</h4>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#social" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Social Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#footer" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Footer Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Contact Information
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="social">
                            <SocialComponent></SocialComponent>
                        </div>
                        <div class="tab-pane show" id="footer">
                            <FooterComponent></FooterComponent>
                        </div>
                        <div class="tab-pane show" id="contact">
                            <ContactComponent></ContactComponent>
                        </div>

                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->


        </div>
    </div>
</template>

<script>

    import SocialComponent from "./SocialComponent";
    import FooterComponent from "./FooterComponent";
    import ContactComponent from "./ContactComponent";

    export default {
        name: "WebSettingsComponent",
        components:{
            SocialComponent,FooterComponent,ContactComponent
        }
    }
</script>

<style scoped>

</style>
