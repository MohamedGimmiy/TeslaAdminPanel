<template>
    <v-container>
        <v-row>
            <v-col offset-md="1" cols="10" class="mt-4">

                <v-form ref="form">
                    <v-text-field :counter="35" label="Name" required dark></v-text-field>

                    <v-text-field label="Order" required dark></v-text-field>

                    <v-row class="mb-2">
                        <font-awesome-icon icon="camera" class="white--text mt-4 ml-2" style="font-size: 30px; margin-right: -20px;"></font-awesome-icon>
                        <v-file-input label="Image" truncate-length="15" dark></v-file-input>
                    </v-row>

                    <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">
                        Submit
                    </v-btn>

                </v-form>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        valid: true,
        name: '',
        nameRules: [
            v => !!v || 'Name is required',
            v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        select: null,
        items: [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4',
        ],
        checkbox: false,
    }),

    methods: {
        validate() {
            this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        },
        resetValidation() {
            this.$refs.form.resetValidation()
        },
    },
}
</script>

<style>

</style>
