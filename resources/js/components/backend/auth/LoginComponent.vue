<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="javascript:void(0)" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img :src="'/backend/assets/images/logo-dark.png'" alt="" height="22">
                                            </span>
                                </a>

                                <a href="index-2.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img :src="'/backend/assets/images/logo-light.png'" alt="" height="22">
                                            </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>

                        </div>

                        <div class="badge badge-success col-md-12" id="rede" style="display: none">
                            <h3 style="color:white">Login Success. Redirecting......</h3><br>
                        </div>

                        <form>

                            <div class="form-group mb-3">
                                <label for="email">Email address</label>
                                <input class="form-control" v-model="email" type="email" id="email" placeholder="Enter your email">
                                <span class="text-danger" id="emailError"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" v-model="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span id="emailPass" class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-danger" id="passError"></span>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" v-model="remember" class="custom-control-input" id="checkbox-signin" >
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" @click.prevent="Login()" type="submit"> Log In </button>
                            </div>

                        </form>


                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->


                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</template>

<script>
    export default {
        name: "LoginComponent",
        data(){
            return{
                email : '',
                password : '',
                remember : ''
            }
        },
        methods : {
            Login(){
                axios.post('/admin',{
                    'email': this.email,
                    'password': this.password,
                    'remember': this.remember,
                }).then(function (res) {
                    $("#emailError").text('');
                    $("#passError").text('');

                    if (res.data.status == true){
                        $("#rede").show();

                        setTimeout(function(){
                            location.href = '/admin/dashboard';
                        }, 1000);

                    }else{
                        $("#emailError").text(res.data.message);
                    }
                }).catch(function (error) {
                    console.log(error.response.data.errors.password)
                    $("#emailError").text('');
                    $("#passError").text('');

                    $("#emailError").text(error.response.data.errors.email);
                    $("#passError").text(error.response.data.errors.password);
                });
            },
        },
    }
</script>

<style scoped>

</style>
