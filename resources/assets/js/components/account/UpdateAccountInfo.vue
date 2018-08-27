<template>
    <div class="text-center border border-light p-5">

        <p class="h4 mb-4">Register User Account</p>

        <!-- Name -->
        <input type="text" class="form-control mb-4" placeholder="Name" v-model="user.name">
       
        <!-- Create  button -->
       <button class="btn btn-info btn-block" type="button" @click='save'>Create</button>
    </div>
</template>


<script>
    import User from '../../components/api/user.js';
    export default{
        data() {
           return {
                user:  {}
            }
        },
          created(){
            User.getUserInfo()
            .then(user => {
                this.user = user
            })
            .catch(error => console.log(error))

        },
        methods: {
            save(){
                axios.post('/update/info', this.$data.user)
                    .then((response) =>{
                        alert("Updated!!")
                        console.log(response)
                    })
                    .catch((error) => {
                        if(error.response.status == 403)
                            alert("No permission!!!! redirect to login...");
                        else
                            alert("Invalid data or data duplication!!...")
                        console.log(error)
                    })
                }
            }
        } 
</script>