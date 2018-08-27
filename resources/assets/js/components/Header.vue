<template>
   <nav class="navbar navbar-expand-sm bg-light  bg-faded">


       <!-- USER -->
      <ul v-if = "user.role == 'user'" class="navbar-nav">
         <li class="nav-item">
            <router-link to = "/"> Home </router-link>&nbsp;/
         </li>
         <li class="nav-item">
            <router-link to = "/sales/create"> Sell </router-link>&nbsp;/
         </li>   
         <li class="nav-item">
            <router-link to = "/sales/inquiry/receipt"> Receipts </router-link>&nbsp;/
         </li>
            <li class="nav-item">
            <router-link to = "/sales/inquiry/daily-report"> Daily report </router-link>&nbsp;/
         </li>
         <li class="nav-item">
            <router-link to = "/products/create"> Add New Product </router-link>&nbsp;/
         </li>
         <li class="nav-item">
            <router-link to = "/products/edit/stock"> Add Stock </router-link>&nbsp;/
         </li>
         <li class="nav-item">
            <router-link to = "/users/edit/info"> Change Account Info </router-link>&nbsp;/
         </li>
         <li class="nav-item">
            <router-link to = "/users/edit/password"> Change Password </router-link>&nbsp;
         </li>
      </ul>

     

      <!-- ADMIN -->
      <ul v-else-if = "user.role == 'admin'" class="navbar-nav">
         <li class="nav-item">
            <router-link to = "/"> Home </router-link>&nbsp;
         </li>
         <li class="nav-item">
            <router-link to = "/users/create"> Add User </router-link>&nbsp;
         </li>
         <li class="nav-item">
            <router-link to = "/users/edit/info" @click.native="click"> Change Account Info </router-link>&nbsp;
         </li>
         <li class="nav-item">
            <router-link to = "/users/edit/password"> Change Password </router-link>&nbsp;
         </li>
      </ul>



        <!-- GUEST -->
       <ul v-else  class="navbar-nav">
         <li class="nav-item">
            <a href= "/login">Login</a>
         </li>
      </ul>



   </nav>
</template>


<script>
  import User from './api/user.js';
  import { EventBus } from './api/user.js';


export default {
    data(){
        return{ 
            user: ""
        }
    },
  created(){
      User.getUserInfo()
        .then(user => {
            this.user = user
            self.user = user;
        })
        .catch(error => console.log(error))
  },
   methods: {
    click() {
      EventBus.$emit('click', self.user);
    }
  },
}
</script>