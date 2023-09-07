<template>
   <div class="row">
       <div class="col-md-6">
           <form @submit.prevent="updatePassword()" action="javascript:void(0)">
               <div class="form-group">
                   <label for="current_password">Current Password</label>
                   <input type="password" v-model="current_password" id="current_password" class="form-control">
                   <span class="text-danger" id="cPwdError"></span>
               </div>
               <div class="form-group">
                   <label for="password">New Password</label>
                   <input type="password" v-model="password" id="password" class="form-control">
                   <span class="text-danger" id="PwdError"></span>
               </div>
               <div class="form-group">
                   <label for="password_confirmation">Confirm Password</label>
                   <input type="password" v-model="password_confirmation" id="password_confirmation" class="form-control">
                   <span class="text-danger" id="conPwdError"></span>
               </div>

               <button type="submit" class="btn btn-primary btn-sm"> Submit</button>
           </form>
       </div>
   </div>
</template>

<script>
    export default {
        name: "ChangePasswordComponent",
        data(){
            return{
                current_password : '',
                password : '',
                password_confirmation : '',
            }
        },
        methods : {
            updatePassword(){
                axios.post('/admin/update/password', {
                    current_password : this.current_password,
                    password : this.password,
                    password_confirmation : this.password_confirmation,
                }).then((res) => {
                    this.ClearPassError();

                    if (res.data.status == 'passerror'){
                        $("#PwdError").text(res.data.msg);
                    }

                    if (res.data.status == 'current_pass_error'){
                        $("#cPwdError").text(res.data.msg);
                    }

                    if (res.data.status == true){

                        iziToast.success({
                            title: 'Success',
                            position: 'topRight',
                            message: res.data.msg
                        });

                    }



                }).catch((err) => {
                    this.ClearPassError();

                    $("#cPwdError").text(err.response.data.errors.current_password);
                    $("#PwdError").text(err.response.data.errors.password);
                    $("#conPwdError").text(err.response.data.errors.password_confirmation);
                });
            },

            ClearPassError(){
                $("#cPwdError").text('');
                $("#PwdError").text('');
                $("#conPwdError").text('');
            }

        },
    }
</script>

<style scoped>

</style>
