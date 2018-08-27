<template>
    <div>
    <!-- Default form contact -->
    <form class="text-center border border-light p-5">

        <!-- Name -->
        <select v-model="stock.product_id" class="browser-default custom-select mb-4">
            <option  v-for="product in products" :value="''+product.id">{{product.name}}</option>
        </select>

        <!-- Available Amount -->
        <input type="text"  class="form-control mb-4" placeholder="Available" value="0" readonly="readonly">

        <!-- Add to stock amount -->
        <input v-model="stock.amount" type="number" min="0" max="100000000" class="form-control mb-4" placeholder="Amount" value="0">


        <!-- Expirey Date -->
        <input v-model="stock.expire_date" type="date"  class="form-control mb-4">


        <!-- Send button -->
        <button class="btn btn-info btn-block" @click="save" type="button">Add to Stock</button>

    </form>
    <!-- Default form contact -->
    </div>
</template>


<script>
    import Product from '../../components/api/product.js';
     export default{
        data() {
           return {
                products:  [],
                stock: {
                    product_id: '',
                    expire_date:  new Date(),
                    amount: 10, 
                },
            }
        },
          created(){
            Product.getUserInfo()
            .then(products => {
                this.products = products
            })
            .catch(error => console.log(error))
        },
        methods: {
            save(){
                axios.post('../stocks', this.$data.stock)
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