<template>
    <div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-4">Profile Setting</h4>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#profile_info" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Profile Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#change_pws" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Change Password
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile_info">
                            <form  @submit.prevent="updateProfile()" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label for="name">Name</label>
                                            <input type="text" v-model="name" class="form-control" id="name" placeholder="Name">
                                            <span class="text-danger" id="nameErro"></span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" v-model="admin.email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="gender">Gender</label>
                                            <select v-model="gender" class="form-control" id="gender">
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="text-danger" id="genderError"></span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="image">Image</label>
                                            <input type="file" @change="showImage($event)" class="form-control" id="image" accept="image/*" >
                                        </div>

                                        <div class="form-group col-md-12">
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <img width="300" height="200" :src="updateImage(image)">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane show" id="change_pws">
                           <change_password-component></change_password-component>
                        </div>

                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->


        </div>
    </div>
</template>

<script>
    export default {
        name: "ProfileComponent",
        props : ['admin'],
        data(){
           return{
               name : this.admin.name,
               gender : this.admin.gender,
               image : this.admin.image,
           }
        },

        methods:{
            updateProfile(){
                axios.post('/admin/update/profile', {
                    'name' : this.name,
                    'gender' : this.gender,
                    'image' : this.image,
                }).then((res)=>{

                    $("#nameErro").text('');
                    $("#genderError").text('');
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: res.data
                    });
                }).catch((err)=>{
                    $("#nameErro").text('');
                    $("#genderError").text('');
                    $("#nameErro").text(err.response.data.errors.name);
                    $("#genderError").text(err.response.data.errors.gender);
                });
            },

            showImage(event){
                let file = event.target.files[0];

                if (file.size > 3072000){
                    iziToast.error({
                        title: 'Error',
                        position: 'topRight',
                        message: 'Maximum file size to upload is 3MB (3072 KB)'
                    });
                }else {
                    if (file.type.includes('image')){
                        let reader = new FileReader();
                        reader.onload = (evt) => {
                            this.image = evt.target.result;
                        };
                        reader.readAsDataURL(file);
                    }else{
                        iziToast.error({
                            title: 'Error',
                            position: 'topRight',
                            message: 'File is not an image'
                        });
                    }

                }
            },

            updateImage(image){
                if(image.length>100){
                    return image;
                }else{
                    return '/backend/upload/admin/'+image;
                }
            }
        }
    }
</script>

<style scoped>

</style>
