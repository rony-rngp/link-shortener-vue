<template>
    <div>
        <form  @submit.prevent="addSocial()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="facebook">Facebook</label>
                        <input type="text" v-model="facebook" class="form-control" id="facebook" placeholder="Enter your facebook profile link">
                        <span class="text-danger" id="facebookError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" v-model="linkedin" class="form-control" id="linkedin" placeholder="Enter your linkedin profile link">
                        <span class="text-danger" id="linkedinError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="youtube">Youtube</label>
                        <input type="text" v-model="youtube" class="form-control" id="youtube" placeholder="Enter your youtube profile link">
                        <span class="text-danger" id="youtubeError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="instagram">Instagram</label>
                        <input type="text" v-model="instagram" class="form-control" id="instagram" placeholder="Enter your instagram profile link">
                        <span class="text-danger" id="instagramError"></span>
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
        name: "SocialComponent",
        data(){
            return {
                facebook : '',
                linkedin : '',
                youtube : '',
                instagram : '',
            }
        },

        mounted(){
            this.getSocialInfo();
        },

        methods : {

            getSocialInfo(){
                axios.get('/admin/web-settings/social/get').then((res)=>{
                    this.facebook = res.data[0].setting_value;
                    this.linkedin = res.data[1].setting_value;
                    this.youtube = res.data[2].setting_value;
                    this.instagram = res.data[3].setting_value;
                });
            },

            addSocial(){
                axios.post('/admin/web-settings/social/add', {
                    facebook : this.facebook, linkedin: this.linkedin, youtube: this.youtube, instagram: this.instagram
                }).then((res) => {
                    this.ClearError();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'Social Info Updated'
                    });
                }).catch((err) => {
                    this.ClearError();
                    $("#facebookError").text(err.response.data.errors.facebook);
                    $("#linkedinError").text(err.response.data.errors.linkedin);
                    $("#youtubeError").text(err.response.data.errors.youtube);
                    $("#instagramError").text(err.response.data.errors.instagram);
                });
            },

            ClearError(){
                $("#facebookError").text('');
                $("#linkedinError").text('');
                $("#youtubeError").text('');
                $("#instagramError").text('');
            }
        }
    }
</script>

<style scoped>

</style>
