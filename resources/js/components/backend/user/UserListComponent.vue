<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: rgb(255,255,255); border: 1px solid #DEE2E6">
                        User List ({{ count_users }})
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <input class="form-control" @keyup="getUserList" placeholder="Search Here By Name & Email" type="text" v-model="search">
                        </div>
                        <table class="table table-bordered col-md-12">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <template v-if="data_length > 0">
                                    <tr v-for="user in users.data">
                                        <td>{{ user.id }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.created_at }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-success" @click="userData(user.id)" > <i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </template>
                            <template v-else>
                                <tr>
                                    <td class="text-center" colspan="5">Data not found !</td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                    <div class="col-md-12">
                        <pagination :data="users" @pagination-change-page="getUserList"></pagination>
                    </div>



                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <user_details-component :user="user"></user_details-component>
        </div>

    </div>
</template>

<script>
    export default {
        name: "UserListComponent",
        data(){
          return {
              users : {},
              data_length : 0,
              user : '',
              count_users : 0,
              search : ''
          }
        },

        mounted() {
            this.getUserList();
        },

        methods:{
            getUserList(page = 1){
            
                axios.get('/admin/get/user/list?page='+ page+'&search='+this.search).then((res) => {
                    this.users = res.data.users;
                    this.count_users = res.data.count_users;
                    this.data_length = res.data.users.data.length;
                }).catch((err) => {
                    console.log(err);
                });
            },
            userData(id){
                axios.get('/admin/get/user/details/'+id).then((res)=>{
                    this.user = res.data.user;
                    $("#exampleModal").modal('show')
                }).catch((error) => {
                    console.log(error);
                });


            }
        }
    }
</script>

<style scoped>

</style>
