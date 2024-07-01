<!-- src/App.vue -->
<template>
    <HeaderMenu />
    <slot />
</template>

<script setup lang="ts">
import HeaderMenu from '@/Components/HeaderMenu.vue'
</script>
