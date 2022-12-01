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
            <img
              src="https://media.istockphoto.com/id/1140204814/photo/tesla-service-center-tesla-designs-and-manufactures-the-model-s-electric-sedan-iv.jpg?s=612x612&w=0&k=20&c=6msgkDdJoKQTMKRtGAbOBW6ecP3IfQi4oIeNmAqzbv4="
              style="width:100px; height:100px;" alt="">
          </td>
          <td class="text-center">{{ category.name }}</td>
          <td class="text-center">{{ category.order }}</td>
          <td class="text-center">
            <v-btn class="mx-2" fab dark large color="cyan">
                <font-awesome-icon style="color:white;" icon="pen" />
            </v-btn>
          </td>
          <td class="text-center">
            <v-btn class="mx-2" fab dark large color="red">
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
      categories: []
    }
  },
  methods: {
    getCategories() {
      axios.get('http://localhost:8000/api/categories').then(res => {
        if (res.status == 200) {
          this.categories = res.data.categories
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
