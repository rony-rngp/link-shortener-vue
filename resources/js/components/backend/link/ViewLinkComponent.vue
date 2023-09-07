<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: rgb(255,255,255); border: 1px solid #DEE2E6">
                        Link List ({{ count_links }})
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" @keyup="getLinkList" placeholder="Search Here By Link" type="text" v-model="search">
                        </div>
                        <table class="table table-bordered col-md-12">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">View Count</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <template v-if="data_length > 0">
                                <tr v-for="link in links.data">
                                    <td>{{ link.id }}</td>
                                    <template v-if="link.user">
                                        <td>{{ link.user.name }}</td>
                                    </template>

                                    <template v-else>
                                        <td><i>Null</i></td>
                                    </template>

                                    <td>{{ link.view_count }}</td>
                                    <td>
                                        <template v-if="link.status == 1">
                                            <p class="badge badge-success">Active</p>
                                        </template>
                                        <template v-else>
                                            <p class="badge badge-warning">Inactive</p>
                                        </template>
                                    </td>
                                    <td>{{ link.created_at }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success" @click="linkDetails(link.id)"> <i class="fa fa-eye"></i></a>
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
                        <pagination :data="links" @pagination-change-page="getLinkList"></pagination>
                    </div>
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


            <LinkDetailsComponent :link="link"></LinkDetailsComponent>
        </div>
    </div>
</template>

<script>

    import LinkDetailsComponent from "./LinkDetailsComponent";

    export default {
        name: "ViewLinkComponent",
        components : {
            LinkDetailsComponent
        },
        data(){
            return {
                links : {},
                data_length : 0,
                link : '',
                count_links : 0,
                search : ''
            }
        },

        mounted() {
            this.getLinkList();
        },

        methods:{
            getLinkList(page = 1){
                axios.get('/admin/link/list?page='+ page+'&search='+this.search).then((res) => {
                    this.links = res.data.links;
                    this.count_links = res.data.count_links;
                    this.data_length = res.data.links.data.length;
                }).catch((err) => {
                    console.log(err);
                });
            },

            linkDetails(id){
                axios.get('/admin/link/details/'+id).then((res) => {
                    this.link = res.data.link;
                    $("#exampleModal").modal('show');
                }).catch((err) => {
                    console.log(err);
                })
            }

        }
    }
</script>

<style scoped>

</style>
