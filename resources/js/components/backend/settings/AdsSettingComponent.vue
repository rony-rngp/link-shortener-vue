<template>
    <div>
        <form  @submit.prevent="addAds()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label>Popup Ads</label>
                        <textarea v-model="popup_ads" rows="5" class="form-control" placeholder="Popup Ads"></textarea>
                        <span class="text-danger" id="popup_adsError"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Top Ads</label>
                        <textarea v-model="top_ads" rows="5" class="form-control" placeholder="Top Ads"></textarea>
                        <span class="text-danger" id="top_adsError"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Bottom Ads</label>
                        <textarea v-model="bottom_ads" rows="5" class="form-control"  placeholder="Bttom Ads"></textarea>
                        <span class="text-danger" id="bottom_adsError"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AdsSettingComponent",
        data(){
            return {
                popup_ads : '',
                top_ads : '',
                bottom_ads : '',
            }
        },

        mounted(){
            this.getAdsInfo();
        },

        methods : {

            getAdsInfo(){
                axios.get('/admin/settings/ads/get').then((res)=>{
                    this.popup_ads = res.data[0].setting_value;
                    this.top_ads = res.data[1].setting_value;
                    this.bottom_ads = res.data[2].setting_value;
                });
            },

            addAds(){
                axios.post('/admin/settings/ads/store', {
                    popup_ads : this.popup_ads, top_ads: this.top_ads, bottom_ads: this.bottom_ads
                }).then((res) => {
                    this.ClearError();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'Ads Setting Updated'
                    });
                }).catch((err) => {
                    this.ClearError();
                    $("#popup_adsError").text(err.response.data.errors.popup_ads);
                    $("#top_adsError").text(err.response.data.errors.top_ads);
                    $("#bottom_adsError").text(err.response.data.errors.bottom_ads);
                });
            },

            ClearError(){
                $("#popup_adsError").text('');
                $("#top_adsError").text('');
                $("#bottom_adsError").text('');
            }
        }
    }
</script>

<style scoped>

</style>
