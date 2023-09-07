
<template>
    <div><br><br>
        <div class="row">
            <div class="col-md-12">

                <div class="container" style="background-color: #FFFFFF"><br><br><br>
                    <div class="badge badge-success col-md-8" id="rede" style="display: none">
                        <h3 style="color:white">Login Success. Redirecting......</h3><br>
                    </div><br><br>
                    <form @submit.prevent="logIn()" method="POST">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="email">
                                <span id="emailError" class="text-danger" role="alert"><strong></strong></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password">
                                <span id="passError" class="text-danger" role="alert"><strong></strong></span>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="/register">
                                    <i>Register</i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- col-lg-4 col-md-6 -->
        </div><!-- row -->
        </div>
</template>

<script>
    export default {
        name: "LoginComponent",
        data(){
            return{
                email : '',
                password : '',
            }
        },
        methods: {
            logIn(){
                axios.post('/login',{email: this.email, password: this.password}).then((res)=>{
                    $("#emailError").text('');
                    $("#passError").text('');

                    if (res.data.status == true){
                        $("#rede").show();

                        setTimeout(function(){
                            location.href = '/';
                        }, 1000);

                    }else{
                        $("#emailError").text(res.data.message);
                    }

                }).catch((err)=>{
                    $("#emailError").text('');
                    $("#passError").text('');

                    $("#emailError").text(err.response.data.errors.email);
                    $("#passError").text(err.response.data.errors.password);
                });
            }
        }
    }
</script>

<style scoped>

</style>
