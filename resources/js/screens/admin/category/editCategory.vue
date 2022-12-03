<template>
    <v-container>
        <v-row>
            <v-col offset-md="1" cols="10" class="mt-4">

                <v-form ref="form">
                    <v-text-field v-model="name" :counter="35" label="Name" required dark></v-text-field>

                    <v-text-field v-model="order" label="Order" required dark></v-text-field>

                    <v-row class="mb-2">
                        <font-awesome-icon icon="camera" class="white--text mt-4 ml-2"
                            style="font-size: 30px; margin-right: -20px;"></font-awesome-icon>
                        <v-file-input v-model="image" label="Image" truncate-length="15" dark></v-file-input>
                    </v-row>

                    <v-btn v-on:click="submitForm()" color="success" class="mr-4">
                        Submit
                    </v-btn>

                </v-form>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: ['category'],
    data: function () {
        return {
            name: this.category.name,
            order: this.category.order,
            image: []
        }
    },
    methods: {
        submitForm() {
            axios.put('http://localhost:8000/api/update/category/' + this.category.id, {
                name :this.name,
                order:this.order,
                image: this.image
            }).then(res => {
                if (res.data.status == 'success' || res.status == 200) {
                    alert(JSON.stringify(res.data));
                    this.$router.push('categories');
                }
            })
        }
    }
}
</script>

<style>

</style>
