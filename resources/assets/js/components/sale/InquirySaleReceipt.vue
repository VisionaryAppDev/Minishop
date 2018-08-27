<template>
    <div class="text-center border border-light p-5">

        <h1>Sale Receipt</h1>
        Receipt ID<h3>  </h3>

        <table border='1'>
            <tr>
                <th>Item ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Price</th>
                <th>sub total</th>
                <th>sub discount</th>
                <th></th>
                <th></th>
            </tr>
        </table>
      <button @click="save"></button>
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
                  var currentUrl = window.location.pathname;  
                console.log(window.location.hostname )
                alert('')

                return
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