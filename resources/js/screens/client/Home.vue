<template>
    <div>
        <v-container fluid class="promo">
            <v-main>
                <div class="text-center" style="margin-top: 13%;">
                    <h1 class="display-2">
                        Go Electric
                    </h1>
                    <h1 class="display-1">Save The Planet</h1>
                </div>
            </v-main>
        </v-container>
        <v-container style="background-color: black;" fill-width fluid>
            <v-layout row>
                <v-flex x12 class="text-xs-center display-1 white--text font-weight-black ma-10">
                    Specifications
                </v-flex>
            </v-layout>
            <v-row style="margin-top: 60px;">
                <v-col cols="6">
                    <v-row>
                        <v-col cols="2"></v-col>
                        <v-col cols="10">
                            <v-img width="100%" src="/assets/M3-Homepage-Desktop-LHD.jpg"></v-img>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="6" class="white--text" style="align-self: center;">
                    <div class="ml-4" style="width:36%">
                        <span style="font-size:23px; display: block;" class="mb-2">
                            Wirless Gaming
                        </span>
                        <span>
                            Lorem iong FASD ASFF dook LIOKJL askd UP to 150$ as I protected Lorem iong FASD ASFF dook
                            LIOKJL askd UP to 150$ as I protected Lorem iong FASD ASFF dook LIOKJL askd UP to 150$ as I
                            protected
                        </span>
                    </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="6" class="white--text" style="align-self: center;">
                    <v-row justify="end">
                        <div class="mb-2 mr-10" style="width:36%;">
                            <span style="font-size: 23px; display: block;" class="mb-2">
                                Stay Connected
                            </span>
                            <span>
                                Lorem iong FASD ASFF dook LIOKJL askd UP to 150$ as I protected Lorem iong FASD ASFF
                                dook LIOKJL askd UP to 150$ as I protected Lorem iong FASD ASFF dook LIOKJL askd UP to
                                150$ as I protected
                            </span>
                        </div>
                    </v-row>
                </v-col>
                <v-col cols="6">
                    <v-row>
                        <v-col cols="10">
                            <v-img width="100%" src="/assets/M3-Homepage-Desktop-LHD.jpg"></v-img>
                        </v-col>
                        <v-col cols="2"></v-col>
                    </v-row>
                </v-col>
            </v-row>
            <v-row style="margin-top: 60px;">
                <v-col cols="6">
                    <v-row>
                        <v-col cols="2"></v-col>
                        <v-col cols="10">
                            <v-img width="100%" src="/assets/M3-Homepage-Desktop-LHD.jpg"></v-img>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="6" class="white--text" style="align-self: center;">
                    <div class="ml-4" style="width:36%">
                        <span style="font-size:23px; display: block;" class="mb-2">
                            Wirless Gaming
                        </span>
                        <span>
                            Lorem iong FASD ASFF dook LIOKJL askd UP to 150$ as I protected Lorem iong FASD ASFF dook
                            LIOKJL askd UP to 150$ as I protected Lorem iong FASD ASFF dook LIOKJL askd UP to 150$ as I
                            protected
                        </span>
                    </div>
                </v-col>
            </v-row>
        </v-container>
        <v-img style="width:100%;" src="/assets/M3-Homepage-Desktop-LHD.jpg"></v-img>
        <div style="background-color:black;margin-top:-10px;">
            <div fluid class="background" style="display: table;">
                <div style="display:table-cell; vertical-align: bottom; padding-bottom: 50px;">
                    <v-row>
                        <v-col>
                            <h1 class="white--text font-weight-light text-center">
                                1020p
                            </h1>
                            <p class="white--text text-center">Peak Power</p>
                        </v-col>
                        <v-col>
                            <h1 class="white--text font-weight-light text-center">
                                9.9s
                            </h1>
                            <p class="white--text text-center">1/4 mile</p>
                        </v-col>
                        <v-col>
                            <h1 class="white--text font-weight-light text-center ">
                                2.5s
                            </h1>
                            <p class="white--text text-center">0-60 mph*</p>
                        </v-col>
                    </v-row>
                </div>
            </div>
        </div>
        <div style="background-color: black;margin-top: -10px;">
            <div class="text-left pt-3">
                <v-row>
                    <img style="height: 600px;" src="/assets/Chill_banner_web.avif" />
                    <v-layout align-center>
                        <h1 class="white--text">Tesla Model X</h1>
                        <v-btn style="border-radius: 18px;" class="ml-3">Order Now</v-btn>
                    </v-layout>
                </v-row>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>
    .promo{
        background-image: url('/assets/tesla-specs.jpeg');
        background-size: cover;
        width: 100%;
        height: 100vh;
    }
    .background{
        background: url('/assets/tesla-specs.jpeg');
        background-size: cover;
        width: 100%;
        height: 70vh;
    }
</style>
