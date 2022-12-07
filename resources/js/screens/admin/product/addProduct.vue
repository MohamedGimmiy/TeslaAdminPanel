<template>
    <v-container>
        <v-row>
            <v-col offset-md="1" cols="10" class="mt-4">

                <v-form ref="form">
                    <v-text-field v-model="name" :counter="35" name="name" label="Name" required dark></v-text-field>

                    <v-textarea v-model="description" dark name="description" label="Enter Description..."></v-textarea>

                    <v-text-field v-model="price" name="price" label="Price" required dark></v-text-field>
                    <v-select :items="categories" v-model="category" return-object label="Category" item-text="name" dark outlined></v-select>
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
            description: '',
            categories: [],
            category: ''

        };
    },
    methods: {
        submitForm() {
            const form = require('form-data');
            const forms = new FormData();
            forms.append("name", this.name);
            forms.append("price", this.price);
            forms.append("image", this.image);
            forms.append("category_id", this.category.id);
            forms.append("description", this.description);

            axios.post('api/add/product',
                forms).then(res => {
                    if (res.status == 200) {
                        this.$router.push('products');
                    }
                })
        },
        getCategories() {
            axios.get('api/categories').then(res => {
                if (res.status == 200) {
                    let catArray = [];

                    res.data.categories.map(category => {
                        catArray.push({ name: category.name, id: category.id });
                    });

                    this.categories = catArray;
                }
            })
        }


    },
    mounted() {
        this.getCategories();
    }
}
</script>

<style>

</style>
