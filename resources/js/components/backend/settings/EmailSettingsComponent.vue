<template>
    <div>
        <form  @submit.prevent="addApp()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="mail_mailer">MAIL_MAILER/DRIVER</label>
                        <input type="text" v-model="mail_mailer" class="form-control" id="mail_mailer" placeholder="Mail Mailer">
                        <span class="text-danger" id="mail_mailerError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_host">MAIL_HOST</label>
                        <input type="text" v-model="mail_host" class="form-control" id="mail_host" placeholder="Mail Host">
                        <span class="text-danger" id="mail_hostError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_port">MAIL_PORT</label>
                        <input type="text" v-model="mail_port" class="form-control" id="mail_port" placeholder="Mail Port">
                        <span class="text-danger" id="mail_portError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_username">MAIL_USERNAME</label>
                        <input type="text" v-model="mail_username" class="form-control" id="mail_username" placeholder="Mail Username">
                        <span class="text-danger" id="mail_usernameError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_password">MAIL_PASSWORD</label>
                        <input type="text" v-model="mail_password" class="form-control" id="mail_password" placeholder="Mail Password">
                        <span class="text-danger" id="mail_passwordError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_encryption">MAIL_ENCRYPTION</label>
                        <select id="mail_encryption" v-model="mail_encryption" class="form-control">
                            <option value="">Select</option>
                            <option value="ssl">SSL</option>
                            <option value="tls">TLS</option>
                        </select>
                        <span class="text-danger" id="mail_encryptionError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_from_address">MAIL_FROM_ADDRESS</label>
                        <input type="text" v-model="mail_from_address" class="form-control" id="mail_from_address" placeholder="Mail From Address">
                        <span class="text-danger" id="mail_from_addressError"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="mail_from_name">MAIL_FROM_NAME</label>
                        <input type="text" v-model="mail_from_name" class="form-control" id="mail_from_name" placeholder="Mail From Name">
                        <span class="text-danger" id="mail_from_nameError"></span>
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
        name: "EmailSettingsComponent",
        data(){
            return {
                mail_mailer : '',
                mail_host : '',
                mail_port : '',
                mail_username : '',
                mail_password : '',
                mail_encryption : '',
                mail_from_address : '',
                mail_from_name : '',
            }
        },

        mounted(){
            this.getEmailInfo();
        },

        methods : {

            getEmailInfo(){
                axios.get('/admin/settings/email/get').then((res)=>{
                    this.mail_mailer = res.data[0].setting_value;
                    this.mail_host = res.data[1].setting_value;
                    this.mail_port = res.data[2].setting_value;
                    this.mail_username = res.data[3].setting_value;
                    this.mail_password = res.data[4].setting_value;
                    this.mail_encryption = res.data[5].setting_value;
                    this.mail_from_address = res.data[6].setting_value;
                    this.mail_from_name = res.data[7].setting_value;
                });
            },

            addApp(){
                axios.post('/admin/settings/email/store', {
                    mail_mailer : this.mail_mailer, mail_host: this.mail_host, mail_port: this.mail_port, mail_username: this.mail_username,
                    mail_password : this.mail_password, mail_encryption: this.mail_encryption, mail_from_address: this.mail_from_address, mail_from_name: this.mail_from_name
                }).then((res) => {
                    this.ClearError();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'Mail Setting Updated'
                    });
                }).catch((err) => {
                    this.ClearError();
                    $("#mail_mailerError").text(err.response.data.errors.mail_mailer);
                    $("#mail_hostError").text(err.response.data.errors.mail_host);
                    $("#mail_portError").text(err.response.data.errors.mail_port);
                    $("#mail_usernameError").text(err.response.data.errors.mail_username);
                    $("#mail_passwordError").text(err.response.data.errors.mail_password);
                    $("#mail_encryptionError").text(err.response.data.errors.mail_encryption);
                    $("#mail_from_addressError").text(err.response.data.errors.mail_from_address);
                    $("#mail_from_nameError").text(err.response.data.errors.mail_from_name);
                });
            },

            ClearError(){
                $("#mail_mailerError").text('');
                $("#mail_hostError").text('');
                $("#mail_portError").text('');
                $("#mail_usernameError").text('');
                $("#mail_passwordError").text('');
                $("#mail_encryptionError").text('');
                $("#mail_from_addressError").text('');
                $("#mail_from_nameError").text('');
            }
        }
    }
</script>

<style scoped>

</style>
