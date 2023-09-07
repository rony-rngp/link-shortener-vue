<template>
    <div>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Link Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" style="width:100%">
                        <tr>
                            <td>ID :</td>
                            <td>{{ link.id }}</td>
                        </tr>
                        <tr>
                            <td>User :</td>
                            <template v-if="link.user">
                                <td>{{ link.user.name }}</td>
                            </template>
                            <template v-else>
                                <td><i>Null</i></td>
                            </template>

                        </tr>
                        <tr>
                            <td>Main Link :</td>
                            <td>{{ link.main_link }}</td>
                        </tr>
                        <tr>
                            <td>Hash Link :</td>
                            <td>{{ link.hash }}</td>
                        </tr>
                        <tr>
                            <td>View Count :</td>
                            <td>{{ link.view_count }}</td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td>
                                <template v-if="link.status == 1">
                                    <p class="badge badge-success">Active</p>
                                </template>
                                <template v-else>
                                    <p class="badge badge-warning">Inactive</p>
                                </template>
                            </td>
                        </tr>
                        <tr>
                            <td>Created At :</td>
                            <td>{{ link.created_at }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['link'],
        name: "LinkDetailsComponent"
    }
</script>

<style scoped>

</style>
