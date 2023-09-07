<template>
    <div>
        <form  @submit.prevent="addContact()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" v-model="email" class="form-control" id="email" placeholder="Enter your email">
                        <span class="text-danger" id="emailError"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="phone">Phone</label>
                        <input type="text" v-model="phone" class="form-control" id="phone" placeholder="Enter your phone">
                        <span class="text-danger" id="phoneError"></span>
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
        name: "ContactComponent",
        data(){
          return{
              email : '',
              phone : '',
          }
        },
        mounted() {
            this.getSocialInfo();
        },
        methods:{
            getSocialInfo(){
                axios.get('/admin/web-settings/contact/get').then((res)=>{
                    this.email = res.data[0].setting_value;
                    this.phone = res.data[1].setting_value;
                });
            },

            addContact(){
                axios.post('/admin/web-settings/contact/add', {
                    email : this.email, phone: this.phone
                }).then((res) => {
                    this.ClearError();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'Contact Info Updated'
                    });
                }).catch((err) => {
                    this.ClearError();
                    $("#emailError").text(err.response.data.errors.email);
                    $("#phoneError").text(err.response.data.errors.phone);
                });
            },

            ClearError(){
                $("#emailError").text('');
                $("#phoneError").text('');
            }

        }
    }
</script>

<style scoped>

</style>
