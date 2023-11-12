<script setup>
import {ref} from 'vue';
import HelloWorld from './components/HelloWorld.vue';


const currentValue= ref(150);

</script>

<template>
  <HelloWorld :maxValue='500' v-model="currentValue"/>
  <button class="button" type="button" @click="currentValue += 10"> augmenter</button>
 
</template>

<style scoped>

</style>
