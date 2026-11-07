<script setup>

const props = defineProps({
    categories: {
        type:Array,
        required:true,
    }
})

</script>

<template>
  <div class="categories">
    <a
      v-for="categorie in categories" :key="categorie.id"
      class="category"
      href="categories/cereales.html"
      :style="{'--category-color': categorie.color }"
    >
      <img alt="" height="48" :src="categorie.image" width="56" />
      <span> {{ categorie.name }} </span>
    </a>
  </div>
</template>