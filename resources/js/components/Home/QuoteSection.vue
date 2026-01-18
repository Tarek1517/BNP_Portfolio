<template>
    <section
        class="bg-gradient-to-b from-white to-gray-50 py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 2xl:py-24 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden -z-10">
            <div
                class="absolute top-10 sm:top-20 left-4 sm:left-10 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-primary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl">
            </div>
            <div
                class="absolute bottom-10 sm:bottom-20 right-4 sm:right-10 w-32 h-32 sm:w-48 sm:h-48 md:w-60 md:h-60 bg-secondary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl">
            </div>
        </div>

        <Container>
            <!-- Header Section -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-14 xl:mb-16 relative">
                <span
                    class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
                    অনুপ্রেরণা
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4">
                    উক্তি ও বাণী
                </h2>
                <p
                    class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0">
                    জনগণের জন্য প্রতিশ্রুতিবদ্ধ, উন্নয়নের পথে অগ্রযাত্রা
                </p>
            </div>

            <div v-if="quoteElements?.length"
                class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 md:gap-10 lg:gap-14 xl:gap-16 items-center">
                <!-- Left Side: Profile Image -->
                <div class="relative group order-2 lg:order-1">
                    <div
                        class="relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg sm:shadow-xl lg:shadow-2xl">
                        <img :src="quoteElements[0].image" :alt="quoteElements[0].title"
                            class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />

                        <!-- Image Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl sm:rounded-2xl">
                        </div>

                        <!-- Signature Overlay -->
                        <div
                            class="absolute bottom-4 sm:bottom-6 md:bottom-8 right-4 sm:right-6 md:right-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="text-white font-bold text-base sm:text-lg md:text-xl lg:text-2xl font-cursive">
                                - {{ quoteElements[0].title }}
                            </div>
                        </div>
                    </div>

                    <!-- Image Label -->
                    <div class="mt-4 sm:mt-5 md:mt-6 text-center lg:text-left">
                        <p class="text-base sm:text-lg md:text-xl font-semibold text-gray-900">{{ quoteElements[0].title
                        }}</p>
                        <p class="text-xs sm:text-sm text-gray-500">{{ quoteElements[0].sub_title }}</p>
                    </div>
                </div>

                <!-- Right Side: Quotes -->
                <div class="space-y-4 sm:space-y-5 md:space-y-6 lg:space-y-8 order-1 lg:order-2">
                    <!-- Dynamic Quotes -->
                    <div v-for="(item, index) in quoteElements[0].key_features" :key="index"
                        class="group bg-white p-4 sm:p-5 md:p-6 lg:p-7 xl:p-8 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div class="flex items-start gap-3 sm:gap-4 md:gap-5">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-gradient-to-br from-primary to-secondary rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <Icon name="bx:bxs-quote-alt-left"
                                        class="text-lg sm:text-xl md:text-2xl text-white" />
                                </div>
                                <div
                                    class="absolute -top-1.5 -right-1.5 sm:-top-2 sm:-right-2 w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 bg-secondary rounded-full animate-pulse">
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <blockquote
                                    class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-800 italic leading-relaxed mb-2 sm:mb-3 md:mb-4">
                                    "{{ item.quote }}"
                                </blockquote>
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-0">
                                    <div class="text-xs sm:text-sm text-gray-500">
                                        <Icon name="mdi:calendar" class="inline mr-1 w-3 h-3 sm:w-4 sm:h-4" />
                                        {{ item.year }}
                                    </div>
                                    <span
                                        class="text-xs bg-primary/10 text-primary px-2 sm:px-3 py-1 rounded-full w-fit">{{
                                            item.tag }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
const quoteElements = ref(null);

const fetchQuotes = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-quotes",
        });
        quoteElements.value = response?.data?.data || [];
    } catch (err) {
        console.error("Error fetching counters:", err);
    }
};
onMounted(() => {
    fetchQuotes();
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

.font-cursive {
    font-family: 'Dancing Script', cursive, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Responsive adjustments */
@media (max-width: 380px) {
    .font-cursive {
        font-size: 0.875rem;
    }
}

/* Better text handling */
.min-w-0 {
    min-width: 0;
}

.w-fit {
    width: fit-content;
}

/* Optimize for mobile */
@media (max-width: 640px) {
    .transition-transform {
        transition-duration: 400ms;
    }

    .group:hover .group-hover\:scale-105 {
        transform: scale(1.03);
    }
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {

    .transition-all,
    .transition-transform,
    .transition-opacity,
    .group-hover\:scale-105,
    .group-hover\:scale-110 {
        transition: none !important;
        transform: none !important;
    }
}

/* Better line heights for mobile */
@media (max-width: 640px) {
    .leading-relaxed {
        line-height: 1.5;
    }
}
</style>