<template>
    <div class="text-center border border-light p-5">

        <p class="h4 mb-4">Register User Account</p>

         <!-- Current Password -->
        <input type="password" class="form-control mb-4" placeholder="Current Password" v-model="user.currentPassword">

        <!-- New Password -->
        <input type="password" class="form-control mb-4" placeholder="New Password" v-model="user.newPassword">
       
        <!-- Confirm Password -->
        <input type="password"  class="form-control mb-4" placeholder="Confirm Password" v-model="user.newPassword_confirmation">

        <!-- Create  button -->
        <button class="btn btn-info btn-block" type="button" @click="save">Update</button>
    </div>
</template>



<script>
    export default{
        data() {
           return {
                user: {
                    currentPassword: '',
                    newPassword: '',
                    newPassword_confirmation: '',
                }
            }
        },
        methods: {
            save(){
                axios.post('/update/password', this.$data.user)
                    .then((response) =>{
                        alert("Created!!")
                        console.log(response)
                    })
                    .catch((error) => {
                        if(error.response.status == 403)
                            alert("No permission!!!! redirect to login...");
                        else if(error.response.status == 400)
                            alert("In correct credential!!!! Please input again...");
                        else
                            alert("Invalid data or data duplication!!...")
                        console.log(error)
                    })
                }
            }
        } 
</script>