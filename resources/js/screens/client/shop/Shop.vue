<template>
    <div style="background:white;">
        <v-carousel hide-delimiters>
            <v-carousel-item src="/assets/Front-Shot-47.jpg">
                <v-row class="fill-height" align="center" justify="center">
                    <div class="display-2 white--text pl-5 pr-5 hidden-sm-only">
                        <strong></strong>
                    </div> <br>
                </v-row>
            </v-carousel-item>
            <v-carousel-item src="/assets/2021-Tesla-Model-S-Plaid-4.webp">
                <v-row class="fill-height" align="center" justify="center">
                    <div class="display-2 white--text pl-5 pr-5 hidden-sm-only">
                        <strong></strong>
                    </div> <br>
                </v-row>
            </v-carousel-item>
            <v-carousel-item src="/assets/tesla-model-x-wallpaper.jpg">
                <v-row class="fill-height" align="center" justify="center">
                    <div class="display-2 white--text pl-5 pr-5 hidden-sm-only">
                        <strong></strong>
                    </div> <br>
                </v-row>
            </v-carousel-item>
        </v-carousel>
        <div class="pl-4 pr-4 row mt-4">
            <div class="col-md-6 col-sm-6 col-xs-12" v-for="category in categories.slice(0, 2)" :key="category.id">
                <v-card>
                    <v-img :src="'/categories/' + category.image" class="white--text align-center" height="400px"
                        gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)">
                        <h1 class="text-center font-size">{{ category.name }}</h1>
                        <div class="text-center">
                            <v-btn href="" class="white--text" outlined>View Products</v-btn>
                        </div>
                    </v-img>
                </v-card>
            </div>

        </div>
        <div class="pl-4 pr-4 row">
            <div class="col-md-4 col-sm-4 col-xs-12" v-for="category in categories.slice(2, 5)" :key="category.id">
                <v-card>
                    <v-img :src="'/categories/' + category.image" class="white--text align-center" height="400px"
                        gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)">
                        <h1 class="text-center font-size">{{ category.name }}</h1>
                        <div class="text-center">
                            <v-btn href="" class="white--text" outlined>View Product</v-btn>
                        </div>
                    </v-img>
                </v-card>
            </div>
        </div>
        <v-container>
            <v-row no-gutters>
                <v-col :cols="12">
                    <v-card-text title outlined>
                        <v-card-title class="subheading">
                            Latest Products
                        </v-card-title>
                        <v-divider></v-divider>
                        <div class="row text-center">
                            <div class="col-md-2 col-sm-4 col-xs-12 text-center" v-for="product in products"
                                :key="product.id">
                                <v-hover v-slot:default="{ hover }" open-delay="240">
                                    <v-card :elevation="hover ? 16 : 2">
                                        <v-img :src="'/products/' + product.image" height="200px"
                                            class="white--text algin-end">
                                            <v-card-title>{{ product.name }}</v-card-title>
                                        </v-img>
                                        <v-card-text class="text-primary text-center">
                                            <div>{{ product.price }}</div>
                                            <div>{{ product.category.name }}</div>
                                        </v-card-text>
                                        <div class="text-center">
                                            <v-btn @click="() => {

                                                $router.push({ name: 'productDetails', query: { product } })

                                            }" class="ma-2" outlined color="info">View Product</v-btn>
                                        </div>
                                    </v-card>
                                </v-hover>
                            </div>
                        </div>
                    </v-card-text>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            categories: [],
            products: [],
        }
    },
    methods: {
        getCategories() {
            axios.get('api/categories').then(res => {
                if (res.status == 200) {
                    this.categories = res.data.categories;
                }
            })
        },
        getLatestProducts() {
            axios.get('api/lastestProducts').then(res => {
                if (res.status == 200) {
                    this.products = res.data.products
                }
            })
        }
    },
    mounted() {
        this.getCategories();
        this.getLatestProducts();
    }
}
</script>

<style>

</style>
