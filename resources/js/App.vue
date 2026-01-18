<template>
  <RouterView :key="routeKey" />
</template>

<script setup>
import AppLayout from "@/components/AppLayout.vue";
import { useAuthStore } from "./stores/useAuthStore.js";
import { computed, onMounted } from 'vue';
import { useRoute,RouterView } from 'vue-router';
const route = useRoute();
const routeKey = computed(() => route.path + '-' + JSON.stringify(route.query));

onMounted(() => {
	// const authStore = useAuthStore();
	// authStore.fetchUser();
})
</script>
