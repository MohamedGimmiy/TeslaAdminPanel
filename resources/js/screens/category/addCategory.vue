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
                        <v-file-input  v-model="image" label="Image" truncate-length="15"
                            dark></v-file-input>
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
            order: null,
            image: []
        }
    },
    methods: {
        submitForm() {
            const formData = new FormData();
            formData.append("name", this.name);
            formData.append("order", this.order);
            formData.append("image", this.image);
            axios.post('http://localhost:8000/api/add/category', formData).then(res => {
                if (res.status == 200) {
                    this.$router.push('categories');
                }
            })
        }
    }

}
</script>

<style>

</style>
