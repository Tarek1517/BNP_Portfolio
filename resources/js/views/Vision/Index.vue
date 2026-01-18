<template>
    <AppLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-primary/30 via-white to-secondary/30 py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 2xl:py-24 overflow-hidden"
        >
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden -z-10">
                <div
                    class="absolute top-10 sm:top-20 left-4 sm:left-10 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-primary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl"
                ></div>
                <div
                    class="absolute bottom-10 sm:bottom-20 right-4 sm:right-10 w-28 h-28 sm:w-36 sm:h-36 md:w-48 md:h-48 lg:w-60 lg:h-60 bg-secondary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl"
                ></div>
            </div>

            <Container>
                <div class="text-center">
                    <span
                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                    >
                        <Icon
                            name="mdi:hand-heart"
                            class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4"
                        />
                        আমাদের কর্মপরিকল্পনা
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug"
                    >
                        পরিবর্তন তৈরি
                    </h1>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0"
                    >
                        সমাজের উন্নয়ন ও মানুষের কল্যাণে আমাদের বিভিন্ন
                        কার্যক্রম ও সেবা সমূহ
                    </p>
                </div>
            </Container>
        </section>

        <!-- Dynamic Vision Sections -->
        <section
            v-for="(item, index) in visionContent"
            :key="item.id || index"
            class="py-8 sm:py-10 md:py-12 lg:py-14 xl:py-16"
            :class="{ 'bg-gray-50': index % 2 != 0 }"
        >
            <Container>
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 md:gap-10 lg:gap-12 items-center"
                >
                    <!-- Image Column -->
                    <div
                        class="order-1"
                        :class="index % 2 == 0 ? 'lg:order-1' : 'lg:order-2'"
                    >
                        <img
                            :src="item.image"
                            :alt="item.title"
                            class="w-full rounded-lg sm:rounded-xl shadow-md object-cover"
                            loading="lazy"
                        />
                    </div>

                    <!-- Content Column -->
                    <div
                        class="order-2"
                        :class="index % 2 == 0 ? 'lg:order-2' : 'lg:order-1'"
                    >
                        <h2
                            class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-3 sm:mb-4"
                        >
                            {{ item.title }}
                        </h2>
                        <p
                            class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-5 md:mb-6 whitespace-pre-line"
                        >
                            {{ item.description }}
                        </p>

                        <!-- Key Features List -->
                        <ul
                            v-if="item.key_features && item.key_features.length"
                            class="space-y-2 sm:space-y-3 mb-4 sm:mb-5 md:mb-6"
                        >
                            <li
                                v-for="(feature, fIndex) in item.key_features"
                                :key="fIndex"
                                class="flex items-start gap-2"
                            >
                                <template v-if="feature.name">
                                    <Icon
                                        name="mdi:check-circle"
                                        class="text-primary mt-0.5 sm:mt-1 w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0"
                                    />
                                    <span class="text-sm sm:text-base">
                                        {{ feature.name }}
                                    </span>
                                </template>
                            </li>
                        </ul>
                    </div>
                </div>
            </Container>
        </section>
    </AppLayout>
</template>

<script setup>
import Container from "@/components/Container.vue";
import ServiceCard from "@/components/ServiceCard.vue";
import Icon from "@/components/Icon.vue";
import AppLayout from "@/components/AppLayout.vue";
import useAxios from "@/composables/useAxios.js";
import { ref, onMounted, computed } from "vue";

const { error, loading, sendRequest } = useAxios();
const visionContent = ref([]);

const fetchVisionContent = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-vision-content",
        });
        visionContent.value = response?.data?.data || [];
    } catch (err) {
        console.error("Error fetching vision content:", err);
    }
};

onMounted(() => {
    fetchVisionContent();
});
</script>

<style scoped>
/* Responsive text optimization */
@media (max-width: 380px) {
    .text-xl {
        font-size: 1.25rem;
    }

    .text-sm {
        font-size: 0.75rem;
    }
}

/* Better line heights for mobile */
@media (max-width: 640px) {
    .leading-tight {
        line-height: 1.25;
    }

    .leading-snug {
        line-height: 1.375;
    }
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .animate-pulse {
        animation: none !important;
    }
}

/* Optimize image loading */
img {
    transition: opacity 0.3s ease;
}

/* Ensure images don't overflow on mobile */
img {
    max-width: 100%;
    height: auto;
}

/* Better spacing for list items on mobile */
@media (max-width: 640px) {
    .space-y-2 > * + * {
        margin-top: 0.5rem;
    }
}

/* Improved readability on mobile */
@media (max-width: 640px) {
    .text-gray-600 {
        line-height: 1.5;
    }
}
</style>
