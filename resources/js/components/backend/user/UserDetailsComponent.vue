<template>
    <div>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>ID :</td>
                            <td>{{ user.id }}</td>
                        </tr>
                        <tr>
                            <td>Name :</td>
                            <td>{{ user.name }}</td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td>{{ user.email }}</td>
                        </tr>
                        <tr>
                            <td>Created At :</td>
                            <td>{{ user.created_at }}</td>
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
        props : ['user'],
        name: "UserDetailsComponent",

    }
</script>

<style scoped>

</style>
