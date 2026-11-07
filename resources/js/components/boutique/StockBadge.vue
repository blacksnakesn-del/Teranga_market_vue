<script setup>
import { computed } from 'vue';


const props = defineProps({
    stock: {
        type: Number,
        required: true,
    }
})

const stockClass = computed(() => {
    if(props.stock === 0) return ' empty';
    if(props.stock <= 5) return 'Low';
    return 'Available';
})

const stockLabel = computed(() => {
    if(props.stock === 0) return 'Rupture';
    if(props.stock <= 5) return 'Faible Stock';
    return 'Disponible';
})
 
</script>

<template>

    <span class="stock" :class="stockClass">
        <span aria-hidden="true"></span>
        {{ stockLabel }}
    </span>
  
</template>

