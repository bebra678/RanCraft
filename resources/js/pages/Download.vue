<template>
    <h1>Download</h1>
    <p>Counter: {{ counter }}</p>
    <button class="btn btn-success" @click="increment">Increment</button>
</template>

<script lang="ts">
import {defineComponent, computed} from "vue";
import { useStore } from "vuex";

export default defineComponent({
    components: {},
    setup() {
        const store = useStore();
        const counter = computed(() => {
            return store.state.count;
        });

        const increment = () => {
          store.commit('increment');
        };

        return {
            counter,
            increment
        };
    }
});
</script>

<style lang="less" scoped>

</style>
