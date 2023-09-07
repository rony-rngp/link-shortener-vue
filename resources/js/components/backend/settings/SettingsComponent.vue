<template>
    <div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-4"> Settings</h4>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#app" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                App Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#urlShort" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Url Short Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#ads" data-toggle="tab" aria-expanded="true" class="nav-link">
                               Ads Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#email" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Email Setting
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="app">
                            <AppSettingComponent></AppSettingComponent>
                        </div>
                        <div class="tab-pane show" id="urlShort">
                            <UrlShortSettingComponent></UrlShortSettingComponent>
                        </div>
                        <div class="tab-pane show" id="ads">
                           <AdsSettingComponent></AdsSettingComponent>
                        </div>
                        <div class="tab-pane show" id="email">
                           <EmailSettingsComponent></EmailSettingsComponent>
                        </div>

                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->


        </div>
    </div>
</template>

<script>

    import AppSettingComponent from "./AppSettingComponent";
    import UrlShortSettingComponent from "./UrlShortSettingComponent";
    import AdsSettingComponent from "./AdsSettingComponent";
    import EmailSettingsComponent from "./EmailSettingsComponent";

    export default {
        name: "SettingsComponent",
        components:{
            AppSettingComponent, UrlShortSettingComponent, AdsSettingComponent, EmailSettingsComponent
        }
    }
</script>

<style scoped>

</style>
