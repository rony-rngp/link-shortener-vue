<template>
    <div class="image"><br><br><br><br><br>
    <div class="row">
        <div class="col-md-12 text-white">
            <h2>{{ app_settings[2].setting_value }}</h2><br>
            <p class="text-white">{{ app_settings[3].setting_value }}</p><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" style="border-radius:10px"  v-model="main_link" id="link" class="form-control" placeholder="Enter url like https://.......">
                        <i><span id="ErrorMg" class="text-white"></span></i>
                    </div>
                    <div class="col-md-2">
                        <button style="border-radius:10px" class="btn btn-success" @click="addUrl()" type="button">Share Url</button>
                    </div>
                </div>


                <div class=" col-md-10" style="background-color:white;border-radius:17px" v-if="link_data">
                    <div class="row">

                        <div class="col-md-6 text-left">
                            <br>
                            <a target="_blank" style="color: #48599C" :href="link_data.main_link"><u>{{ link_data.main_link }}</u></a>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <a target="_blank" style="color: #48599C" :href="link_data.hash"><u>{{currentRoute+ link_data.hash}}</u></a>
                        </div>
                    </div>
                </div><br>


                <div class=" col-md-10" style="background-color:white;border-radius:17px" v-if="user">
                    <div class="row">
                        <div class="col-md-12" style="color: black">
                            <div class="card">
                                <div class="card-header">
                                    <h4> Hello, {{ user.name }}</h4>
                                    <p>Your shorted links are here. please check it...</p>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Main Link</th>
                                                <th class="text-center">Hash Link</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <template v-if="user_shorted_links.length > 0">
                                            <tr v-for="(user_shorted_link, key) in user_shorted_links">
                                                <td>{{ key+1 }}</td>
                                                <td>
                                                    <a style="color: #48599C" target="_blank" :href="user_shorted_link.main_link">{{ user_shorted_link.main_link }}</a>
                                                </td>
                                                <td>
                                                    <a style="color: #48599C" target="_blank" :href="currentRoute+user_shorted_link.hash">{{currentRoute+user_shorted_link.hash}}</a>
                                                </td>
                                            </tr>
                                            </template>
                                            <template v-else>
                                                <tr>
                                                    <td colspan="3"><i>Data not found..</i></td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- col-lg-4 col-md-6 -->
    </div><!-- row -->
    </div>
</template>

<script>
    export default {
        props: ['user', 'app_settings'],
        name: "HomeComponent",
        data(){
            return{
                main_link : '',
                link_data : '',
                currentRoute : window.location.href,
                user_shorted_links : ''
            }
        },

        mounted() {
            if (this.user){
                this.userLinklist();
            }

        },

        methods: {
            addUrl(){
                axios.post('/store',{main_link : this.main_link}).then((res) => {
                    if (res.data.status == true){
                        $("#ErrorMg").text('');
                        iziToast.success({
                            title: 'Success',
                            position: 'topRight',
                            message: res.data.message
                        });
                        if (this.user){
                            this.userLinklist();
                        }
                        this.link_data = res.data.link;
                        this.main_link = '';
                    }else{
                        alert('Something want to wrong');
                    }

                }).catch((err)=>{
                    $("#ErrorMg").text(err.response.data.errors.main_link);
                });
            },

            userLinklist(){
                axios.get('/user-shorted-links/list/'+this.user.id).then((res)=>{
                    if (res.data.status == true){
                        this.user_shorted_links = res.data.user_shorted_links;
                    }
                }).catch((err)=>{
                    console.log(err);
                })
            },
        }
    }
</script>

<style scoped>
    .image {
        min-height: 650px;
        background-image: url(/frontend/images/slider-1.jpg);
        /*background-image: url(/frontend/images/image.jpg);*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
