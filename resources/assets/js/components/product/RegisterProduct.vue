<template>
    <div>
    <!-- Default form contact -->
    <form class="text-center border border-light p-5">

        <p class="h4 mb-4">Contact us</p>

        <!-- Name -->
        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name" v-model="product.name">

       

        <!-- Description -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="article-ckeditor" rows="3" placeholder="Description" v-model="product.description"></textarea>
        </div>

       <!-- Price -->
        <input type="number" min="0.01" step="0.01" max="100000000"  class="form-control mb-4" placeholder="Price" v-model="product.price">


         <div class="form-group">
            <input type="file"  enctype="multipart/form-data" ref="files" v-on:change="handleFileUpload()"/>
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="button" @click="save">Add New Product</button>
    </form>
    <!-- Default form contact -->
    </div>
</template>



<script>
    export default{
        data() {
           return {
                product:{
                    name: 'product 1',
                    description: 'desc',
                    price: 11,
                    files: [],
                }
            }
        },
        methods: {
           handleFileUpload(){
               this.files = this.$refs.files.files;
            },
            save(){
                let formData = new FormData();
                
                for ( var key in this.$data.product ) {
                    formData.append(key, this.$data.product[key]);
                }

                for( var i = 0; this.files != undefined && i < this.files.length; i++ ){
                    formData.append('files[]', this.files[i]);
                }


                axios.post('../products', formData, {headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }) .then((response) =>{
                        console.log(response)
                        alert("Created!")
                    })
                    .catch((error) => {
                       if(error.response.status == 403)
                           alert("No permission!!!! redirect to login...");
                        else
                           alert("Invalid data or data duplication!!...")
                        console.log(error)
                    })


                // axios.post('../product', this.$data.product)
                //     .then((response) =>{
                //         alert("Created!!")
                //         console.log(response)
                //     })
                //     .catch((error) => {
                //         if(error.response.status == 403)
                //             alert("No permission!!!! redirect to login...");
                //         else
                //             alert("Invalid data or data duplication!!...")
                //         console.log(error)
                //     })
                }
            }
        } 
</script>