<template>
    <h1>Profile</h1>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    mounted() {
        this.getData()
    },
    methods: {
        getData() {
            axios.get('api/posts')
                .then( res => {
                    console.log(res);
                })
        }
    }
});
</script>

<style lang="less" scoped>

</style>
