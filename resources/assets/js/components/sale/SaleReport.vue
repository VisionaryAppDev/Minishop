<template>
    <div class="text-center border border-light p-5">

        <router-link to="/" class="navbar-item">HOME</router-link>
        
        <p class="h4 mb-4">Register User Account</p>

        <!-- Name -->
        <input type="text" class="form-control mb-4" placeholder="Name" v-model="list.name">
        
        <input type="email" class="form-control mb-4" placeholder="Email" v-model="list.email">

        <!-- Password -->
        <input type="password" class="form-control mb-4" placeholder="Password" v-model="list.password">

        <!-- Confirm Password -->
        <input type="password" class="form-control mb-4" placeholder="Confirm Password"  v-model="list.password_confirmation">

        <!-- Create  button -->
        <button class="btn btn-info btn-block" type="button" @click='save'>Create</button>
    </div>
</template>

<script>
    export default{
        data() {
           return {
                list:{
                    name: 'norin1',
                    email: 'norin@norin.com',
                    password: '111111',
                    password_confirmation: '111111',
                }
            }
        },
        methods: {
            close() {
                //this.$emit('closeRequest')
            },
            save(){
                if(this.$data.list.password !== this.$data.list.password_confirmation)
                {
                    alert("Password mismatch!!")
                    return 
                }
                axios.post('/', this.$data.list)
                    .then((response) =>{
                        alert("Created!!")
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