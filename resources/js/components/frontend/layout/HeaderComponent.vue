<template>
    <header>
        <div class="container-fluid position-relative no-side-padding">

            <a href="/" class="logo">
                <b>{{ app_settings[0].setting_value }}</b>
            </a>

            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

            <ul class="main-menu visible-on-click" id="main-menu">
                <li><a href="/">Home</a></li>
                <template v-if="user">

                <li><a href="javascript:void(0)" @click="logout()"> Logout</a></li>
                </template>
                <template v-else>
                <li><a href="/login">Login</a></li>
                </template>
            </ul><!-- main-menu -->



        </div><!-- conatiner -->
    </header>
</template>

<script>
    export default {
        props: ['user','app_settings'],
        name: "HeaderComponent",
        methods:{
            logout(){
                axios.post('/logout').then((res)=>{
                    location.href = '/login';
                }).catch((error) => {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
