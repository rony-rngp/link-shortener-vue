<template>
    <div>
        <form  @submit.prevent="addRedirect()" enctype="multipart/form-data">
            <div class="row">

                       <div class="col-md-12">
                           <div class="form-group custom-control custom-radio ">
                               <input type="radio" id="customRadio1" v-model="redirect_status" value="enable" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio1">Enable</label>
                           </div>

                           <div class="form-group  custom-control custom-radio">
                               <input type="radio" id="customRadio2" v-model="redirect_status" value="disable" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio2">Disable</label>
                           </div>

                           <div class=" form-group custom-control custom-radio">
                               <input type="radio" id="customRadio3" v-model="redirect_status" value="enable_for_guest_user" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio3">Enable for guest user</label>
                           </div>

                           <p class="text-danger" id="ErrorMsg"></p>

                       </div>


                       <div class="col-md-12">
                           <button class="btn btn-sm btn-primary" type="submit">Update</button>
                       </div>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        name: "UrlShortSettingComponent",
        data(){
            return {
                redirect_status : '',
            }
        },

        mounted(){
             this.getRedirectInfo();
        },

        methods : {

            getRedirectInfo(){
                axios.get('/admin/settings/redirect/get').then((res)=>{
                    this.redirect_status = res.data[0].setting_value;
                });
            },

            addRedirect(){

               axios.post('/admin/settings/redirect/store', {
                   redirect_status : this.redirect_status
               }).then((res) => {
                   $("#ErrorMsg").text('');
                   iziToast.success({
                       title: 'Success',
                       position: 'topRight',
                       message: 'Redirect Setting Updated'
                   });
               }).catch((err) => {
                   $("#ErrorMsg").text(err.response.data.errors.redirect_status);
               });

            },

        }
    }
</script>

<style scoped>

</style>
