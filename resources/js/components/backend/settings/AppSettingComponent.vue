<template>
    <div>
        <form  @submit.prevent="addApp()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="app_name">App Name</label>
                        <input type="text" v-model="app_name" class="form-control" id="app_name" placeholder="App Name">
                        <span class="text-danger" id="appError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="app_title">App Title</label>
                        <input type="text" v-model="app_title" class="form-control" id="app_title" placeholder="App Title">
                        <span class="text-danger" id="titleError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="slogan">Slogan</label>
                        <input type="text" v-model="slogan" class="form-control" id="slogan" placeholder="Slogan">
                        <span class="text-danger" id="sloganError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="second_slogan">Second Slogan</label>
                        <input type="text" v-model="second_slogan" class="form-control" id="second_slogan" placeholder="Second Slogan">
                        <span class="text-danger" id="second_sloganError"></span>
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
        name: "AppSettingComponent",
        data(){
            return {
                app_name : '',
                app_title : '',
                slogan : '',
                second_slogan : '',
            }
        },

        mounted(){
            this.getAppInfo();
        },

        methods : {

            getAppInfo(){
                axios.get('/admin/settings/app/get').then((res)=>{
                    this.app_name = res.data[0].setting_value;
                    this.app_title = res.data[1].setting_value;
                    this.slogan = res.data[2].setting_value;
                    this.second_slogan = res.data[3].setting_value;
                });
            },

            addApp(){
                axios.post('/admin/settings/app/store', {
                    app_name : this.app_name, app_title: this.app_title, slogan: this.slogan, second_slogan: this.second_slogan
                }).then((res) => {
                    this.ClearError();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'App Setting Updated'
                    });
                }).catch((err) => {
                    this.ClearError();
                    $("#appError").text(err.response.data.errors.app_name);
                    $("#titleError").text(err.response.data.errors.app_title);
                    $("#sloganError").text(err.response.data.errors.slogan);
                    $("#second_sloganError").text(err.response.data.errors.second_slogan);
                });
            },

            ClearError(){
                $("#appError").text('');
                $("#titleError").text('');
                $("#sloganError").text('');
                $("#second_sloganError").text('');
            }
        }
    }
</script>

<style scoped>

</style>
