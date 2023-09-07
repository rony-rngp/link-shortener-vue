
<template>
    <div><br><br>
        <div class="row">
            <div class="col-md-12">

                <div class="container" style="background-color: #FFFFFF"><br><br><br>
                    <div class="badge badge-success col-md-8" id="rede" style="display: none">
                        <h3 style="color:white">Register Success. Redirecting......</h3><br>
                    </div><br><br>
                    <form @submit.prevent="logIn()" method="POST">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="name">
                                <span id="nameError" class="text-danger" role="alert"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="email">
                                <span id="emailError" class="text-danger" role="alert"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password">
                                <span id="passError" class="text-danger" role="alert"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" v-model="password_confirmation">
                                <span id="pass2Error" class="text-danger" role="alert"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                                <a class="btn btn-link" href="/login">
                                    <i>Login</i>
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
        name: "RegisterComponent",
        data(){
            return{
                name : '',
                email : '',
                password : '',
                password_confirmation : '',
            }
        },
        methods: {
            logIn(){
                axios.post('/register',{name: this.name, email: this.email, password: this.password, password_confirmation:this.password_confirmation}).then((res)=>{
                    $("#nameError").text('');
                    $("#emailError").text('');
                    $("#passError").text('');
                    $("#pass2Error").text('');


                    if (res.data.status == true){
                        $("#rede").show();

                        setTimeout(function(){
                            location.href = '/';
                        }, 1000);

                    }else{
                        $("#emailError").text(res.data.message);
                    }

                }).catch((err)=>{
                    $("#nameError").text('');
                    $("#emailError").text('');
                    $("#passError").text('');
                    $("#pass2Error").text('');

                    $("#nameError").text(err.response.data.errors.name);
                    $("#emailError").text(err.response.data.errors.email);
                    $("#passError").text(err.response.data.errors.password);
                    $("#pass2Error").text(err.response.data.errors.password_confirmation);
                });
            }
        }
    }
</script>

<style scoped>

</style>
