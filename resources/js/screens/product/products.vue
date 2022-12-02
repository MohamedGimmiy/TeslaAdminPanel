<template>
  <v-simple-table dark>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-center">
            Image
          </th>
          <th class="text-center">
            Name
          </th>
          <th class="text-center">
            Description
          </th>
          <th class="text-center">
            Price
          </th>
          <th class="text-center">
            Edit
          </th>
          <th class="text-center">
            Delete
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td class="text-center">
            <div v-if="product.image">
                <img :src="url+'/products/'+ product.image" alt="" style="width:100px; height:100px;">
            </div>
            <div v-else>
                <img src="https://i0.wp.com/logotaglines.com/wp-content/uploads/2021/02/tesla_logo_tagline-slogan-customer-care.png?fit=2500%2C2500&ssl=1" alt="" style="width:100px; height:100px;">
            </div>
          </td>
          <td class="text-center">{{ product.name }}</td>
          <td class="text-center">{{ product.description }}</td>
          <td class="text-center">{{ product.price }}</td>
          <td class="text-center">
            <v-btn class="mx-2" fab dark large color="cyan"  v-on:click="$router.push({name: 'editProduct', params: {product}})">
                <font-awesome-icon style="color:white;" icon="pen" />
            </v-btn>
          </td>
          <td class="text-center">
            <v-btn class="mx-2" fab dark large color="red" v-on:click="deleteProduct(product)">
                <font-awesome-icon icon="trash" />
            </v-btn>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table></template>

<script>
export default {
    data() {
        return {
            products:[],
            url: window.location.origin
        }
    },
    methods: {
        getProducts(){
            axios.get('http://localhost:8000/api/products').then(res=> {
                if(res.status == 200){
                    this.products = res.data.products;
                }
            })
        },
        deleteProduct(product){
            axios.delete('http://localhost:8000/api/deleted/product/' + product.id).then(res => {
        if (res.status == 200) {
            console.log(res);
            this.getProducts();
            alert(res.data.message)
        }
      });
        }
    },
    mounted() {
    this.getProducts();
  }
}
</script>

<style>

</style>
