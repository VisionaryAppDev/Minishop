

<template>
   <div class="text-center border border-light p-5">
      <div class="form-inline row" v-for="product in products" v-if="product.available > -1">
         <div class="col-12">
            <h4 v-text="product.name"></h4>
         </div>
         <div>
            <input :v-model="'hello'+product.id" type="checkbox" class="col-1" :value="product.id" checked="false">
            <textarea :value="product.description" readonly cols="130" class="bg-transparent col-10" rows="2"></textarea>
            <div class="form-inline align-right ">
               <h5>price: </h5>
               <h5  v-text="product.price" :name="'price'+product.id">10$</h5>
               <input :v-model="'amount'+product.id" :name="'amount'+product.id" :max="product.available" v-on:change="amountChanged(product.id, product.price, 'total'+product.id)" type="number" min="0" max="100000000" class="form-control mb-4 ml-5 mr-5" placeholder="Amount" value="0">
               <div>
                  Discount: <input  :model="product.discount" type="text" min="0"  class="form-control mb-4 ml-5 mr-5" value="0">
                  Available: <input v-model="product.available" type="number" readonly min="0"  class="form-control mb-4 ml-5">
                  Total: <input :name="'total'+product.id" type="text" readonly min="0" class="form-control mb-4 ml-5" value="0">
               </div>
            </div>
         </div>
      </div>
      <div>
         Discount: <input type="text" min="0" max="100000000" class="form-control mb-4 ml-5 mr-5" placeholder="Amount" value="0">
         Total Discount: <input type="text" min="0" max="100000000" class="form-control mb-4 ml-5 mr-5" placeholder="Amount" value="0">
         Total: <input type="text" readonly min="0" max="100000000" class="form-control mb-4 ml-5" placeholder="Amount" value="0">
         <button class="btn btn-info btn-block" @click='save'>Sale</button>
      </div>
   </div>
</template>
<script>
   import Product from '../../components/api/product.js';
   export default{
       data() {
          return {
              product: {
                  name: "",
                  id: "",
                  discount: 0,
                  amount: 0,
              },
              products: {
                  available: "",
                  discount: 0,
                  amount: 0,
              },
           }
       },
        created(){
            alert("This one not working as expected!")
           Product.getUserInfo()
           .then(products => {
               this.products = products
           })
           .catch(error => console.log(error))
       },
       methods: {
           save(){
               axios.post('/update/password', this.$data.products)
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
           },
            amountChanged: function(productID, price, total){
               var amount = document.querySelector("input[name=amount"+productID+"]").value;
               document.querySelector("input[name="+total+"]").value = amount * price;
           }
        },
   }
        
</script>

