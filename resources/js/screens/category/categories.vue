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
            Order
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
        <tr v-for="category in categories" :key="category.id">
          <td class="text-center">
            <div v-if="category.image">
                <img :src="url+'/categories/'+ category.image" alt="" style="width:100px; height:100px;">
            </div>
            <div v-else>
                <img src="https://i0.wp.com/logotaglines.com/wp-content/uploads/2021/02/tesla_logo_tagline-slogan-customer-care.png?fit=2500%2C2500&ssl=1" alt="" style="width:100px; height:100px;">
            </div>
          </td>
          <td class="text-center">{{ category.name }}</td>
          <td class="text-center">{{ category.order }}</td>
          <td class="text-center">
            <v-btn class="mx-2" fab dark large color="cyan"  v-on:click="$router.push({name: 'editCategory', params: {category}})">
                <font-awesome-icon style="color:white;" icon="pen" />
            </v-btn>
          </td>
          <td class="text-center">
            <v-btn class="mx-2" fab dark large color="red" v-on:click="deleteCategory(category)">
                <font-awesome-icon icon="trash" />
            </v-btn>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>

export default {
  data() {
    return {
      categories: [],
      url : window.location.origin
    }
  },
  methods: {
    getCategories() {
      axios.get('http://localhost:8000/api/categories').then(res => {
        if (res.status == 200) {
          this.categories = res.data.categories
        }
      });
    },
    deleteCategory(category){
      axios.delete('http://localhost:8000/api/deleted/category/' + category.id).then(res => {
        if (res.status == 200) {
            console.log(res);
            alert(res.data.msg)
            this.categories = this.getCategories();
        }
      });
    }
  },
  mounted() {
    this.getCategories();
  }
}
</script>

<style>

</style>
