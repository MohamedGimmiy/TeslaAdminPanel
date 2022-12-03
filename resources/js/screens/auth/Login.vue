<template>
  <div class="pa-0" style="max-height: 100vh; overflow: hidden; background-color: white; height: 100vh;">
    <v-img src="/assets/tesla-specs.jpeg" height="350px" width="100vw"></v-img>
    <v-card class="mx-auto elevation-5 text-center pa-5" max-width="350" style="border-radius: 20px;position:relative;top:-50px">
        <v-card-subtitle class="title black--text pa-1">
            Login Now
        </v-card-subtitle>
        <v-card-subtitle class="pa-1">

        </v-card-subtitle>
        <v-text-field hide-details color="black" label="UserName">

        </v-text-field>
        <v-text-field hide-details color="black" label="Password" type="password">

        </v-text-field>
        <v-card-actions>
            <v-btn color="dark" dark block rounded class="mt-4">Login</v-btn>
        </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
