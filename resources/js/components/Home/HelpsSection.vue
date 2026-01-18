<template>
    <section class="relative py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 2xl:py-24 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-white to-secondary/5 -z-10"></div>

        <!-- Decorative Elements -->
        <div
            class="absolute top-10 sm:top-20 left-4 sm:left-10 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-primary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl -z-10">
        </div>
        <div
            class="absolute bottom-10 sm:bottom-20 right-4 sm:right-10 w-32 h-32 sm:w-48 sm:h-48 md:w-60 md:h-60 bg-secondary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl -z-10">
        </div>

        <Container>
            <!-- Header Section -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-14 xl:mb-16 2xl:mb-16 relative">
                <div
                    class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
                    <Icon name="mdi:heart" class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4" />
                    জনসেবার প্রতিশ্রুতি
                </div>
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4">
                    আমরা কার সেবা করি?
                </h2>
                <p
                    class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0">
                    সমাজের প্রতিটি স্তরের মানুষের জন্য নিবেদিত, সবার উন্নয়নই আমাদের লক্ষ্য
                </p>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 lg:gap-7 xl:gap-8">
                <!-- Youth -->
                <div v-for="serveElement in serveElements" :key="serveElement.id"
                    class="group relative bg-white rounded-lg sm:rounded-xl md:rounded-2xl p-4 sm:p-5 md:p-6 lg:p-7 xl:p-8 shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-secondary/30 overflow-hidden">
                    <div
                        class="absolute -right-4 -top-4 sm:-right-6 sm:-top-6 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-secondary/5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="flex items-start gap-3 sm:gap-4 mb-4 sm:mb-5 md:mb-6">
                        <div class="relative shrink-0">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 bg-gradient-to-br from-secondary to-primary rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <Icon  :name="serveElement?.serve_icon" class="text-lg sm:text-xl md:text-2xl text-white" />
                            </div>
                            <div
                                class="absolute -top-0.5 -right-0.5 sm:-top-1 sm:-right-1 w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 bg-white rounded-full border-2 border-secondary">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-900 mb-1 sm:mb-2">
                                {{ serveElement.title }}</h3>
                            <p class="text-xs sm:text-sm text-secondary font-semibold">{{ serveElement.sub_title }}</p>
                        </div>
                    </div>
                    <ul class="space-y-2 sm:space-y-3">
                        <li v-for="item in serveElement.key_features" :key="item?.name"
                            class="flex items-start sm:items-center gap-2 text-gray-600">
                            <Icon name="mdi:check-circle"
                                class="text-secondary flex-shrink-0 w-4 h-4 sm:w-5 sm:h-5 mt-0.5 sm:mt-0" />
                            <span class="text-xs sm:text-sm">{{ item?.name }}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </Container>
    </section>
</template>

<script setup>
import Container from "@/components/Container.vue";
import Icon from "@/components/Icon.vue";
import { ref, onMounted, nextTick } from "vue";
import useAxios from "@/composables/useAxios.js";

const { error, loading, sendRequest } = useAxios();
const serveElements = ref(null);

const fetchServes = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-serves",
        });
        serveElements.value = response?.data?.data || [];
    } catch (err) {
        console.error("Error fetching counters:", err);
    }
};
onMounted(() => {
    fetchServes();
});
</script>

<style scoped>
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {

    0%,
    100% {
        opacity: 1;
    }

    50% {
        opacity: 0.5;
    }
}

/* Responsive text wrapping */
.min-w-0 {
    min-width: 0;
}

/* Better icon alignment on small screens */
@media (max-width: 640px) {
    .flex.items-start .mt-0\.5 {
        margin-top: 0.125rem;
    }
}

/* Tablet optimization */
@media (min-width: 641px) and (max-width: 1024px) {
    .grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* Large screen optimization */
@media (min-width: 1536px) {
    .grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
</style>