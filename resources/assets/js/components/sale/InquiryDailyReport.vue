<template>
    <div class="text-center border border-light p-5">
        <h1>Daily report</h1>
        <table border='1'>
            <tr>
                <th>Sale ID</th>
                <th>Item ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Price</th>
                <th>sub total</th>
                <th>sub discount</th>
                <th></th>
            </tr>
            <tr v-for="sale in sales" >
                
                <td v-text="sale.sale_id"></td>
                <td v-text="sale.id"></td>
                <td v-text="sale.name"></td>
                <td v-text="sale.amount"></td>
                <td v-text="sale.price"></td>
                <td v-text="sale.sub_total"></td>
                <td v-text="sale.sub_discount"></td>
            </tr>
        </table>
    </div>
</template>

<script>
    import Sales from '../../components/api/sale-product.js';
    export default{
        data() {
           return {
                sale:{},
                temp: 0,
                sales:{}
            }
        },
        created(){
            Sales.getDailyReport()
            .then(sales => {
                this.sales = sales
            })
            .catch(error => console.log(error))
        },
    }
</script>