<template>
    <v-container>
        <v-row>
            <v-col offset-md="1" cols="10" class="mt-4">

                <v-form ref="form">
                    <v-text-field v-model="name" :counter="35" name="name" label="Name" required dark></v-text-field>

                    <v-textarea v-model="description" dark name="description" label="Enter Description..."
                        ></v-textarea>

                    <v-text-field  v-model="price" name="price" label="Price" required dark></v-text-field>

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
    data: function () {
        return {
            name: '',
            price: null,
            image: [],
            description: ''

        };
    },
    methods: {
        submitForm(){
        const formData = new FormData();
            formData.append("name", this.name);
            formData.append("price", this.price);
            formData.append("image", this.image);
            formData.append("description", this.description);
            axios.post('http://localhost:8000/api/add/product', formData).then(res => {
                if (res.status == 200) {
                    this.$router.push('products');
                }
            })
    }}
}
</script>

<style>

</style>
