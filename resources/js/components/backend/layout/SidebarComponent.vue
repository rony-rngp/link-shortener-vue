<template>
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>


            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li>
                        <a href="/admin/dashboard" :style="currentRoute == '/admin/dashboard' ? styleObject : ''">
                            <i data-feather="airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/profile" :style="currentRoute == '/admin/profile' ? styleObject : ''">
                            <i data-feather="settings"></i>
                            <span> Profile Setting </span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/user/list" :style="currentRoute == '/admin/user/list' ? styleObject : ''">
                            <i data-feather="users"></i>
                            <span> User </span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/link/view" :style="currentRoute == '/admin/link/view' ? styleObject : ''">
                            <i data-feather="link"></i>
                            <span> Link </span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/web-settings" :style="currentRoute == '/admin/web-settings' ? styleObject : ''">
                            <i data-feather="settings"></i>
                            <span> Web Settings </span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/settings" :style="currentRoute == '/admin/settings' ? styleObject : ''">
                            <i data-feather="settings"></i>
                            <span> Settings </span>
                        </a>
                    </li>

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
</template>

<script>
    export default {
        name: "SidebarComponent",
        data(){
          return {
              styleObject: {
                  color: 'blue',
              },
              currentRoute : window.location.pathname,

          }
        },


        mounted() {
            console.log(this.currentRoute)
        }
    }
</script>

<style scoped>

</style>
