<template>
    <div>
        <form  @submit.prevent="addFooter()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="footer_text">Footer Text</label>
                        <textarea v-model="footer_text" class="form-control" rows="4" id="footer_text" placeholder="Enter footer information"></textarea>
                        <span class="text-danger" id="footer_textError"></span>
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
        name: "FooterComponent",
        data(){
            return{
                footer_text : ''
            }
        },
        mounted() {
            this.getSocialInfo();
        },
        methods : {
            getSocialInfo(){
                axios.get('/admin/web-settings/footer/get').then((res)=>{
                    this.footer_text = res.data[0].setting_value;
                });
            },
            addFooter(){
                axios.post('/admin/web-settings/footer/add', {
                    footer_text : this.footer_text
                }).then((res) => {
                    $("footer_textError").text('');
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'Footer Info Updated'
                    });
                }).catch((err) => {
                    $("#footer_textError").text(err.response.data.errors.footer_text);
                });
            },
        }
    }
</script>

<style scoped>

</style>
