<template>
    <section class="bg-gradient-to-b from-gray-50 to-white py-8 sm:py-10 md:py-12 lg:py-16 xl:py-20 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden -z-10">
            <div class="absolute top-10 sm:top-20 left-4 sm:left-10 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-primary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl"></div>
            <div class="absolute bottom-10 sm:bottom-20 right-4 sm:right-10 w-32 h-32 sm:w-48 sm:h-48 md:w-60 md:h-60 bg-secondary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl"></div>
        </div>

        <Container>
            <!-- Header Section -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-14 xl:mb-16 relative">
                <span class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
                    <Icon name="mdi:hand-heart" class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4" />
                    কার্যক্রম সমূহ
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4">
                    আমাদের কার্যক্রম সমূহ
                </h2>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0">
                    জনগণের সেবায় নিবেদিত আমাদের বিভিন্ন সামাজিক ও উন্নয়নমূলক কার্যক্রম
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 lg:gap-8">
                <ServiceCard
                    v-for="service in data?.home_sevices"
                    :key="service.id"
                    :service="service"
                    class="transform hover:-translate-y-1 sm:hover:-translate-y-2 transition-transform duration-300"
                />
            </div>

            <!-- Call to Action -->
            <div class="mt-8 sm:mt-10 md:mt-12 lg:mt-14 xl:mt-16 text-center">
                <a
                    href="/services"
                    class="inline-flex items-center justify-center gap-1.5 sm:gap-2 bg-gradient-to-r from-primary to-secondary text-white font-semibold py-2.5 sm:py-3 px-6 sm:px-8 rounded-full hover:shadow-lg sm:hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 text-sm sm:text-base"
                >
                    <span>সমস্ত কার্যক্রম দেখুন</span>
                    <Icon name="mdi:arrow-right" class="group-hover:translate-x-0.5 sm:group-hover:translate-x-1 transition-transform duration-300 w-4 h-4 sm:w-5 sm:h-5" />
                </a>
            </div>
        </Container>
    </section>
</template>

<script setup>
import Container from "@/components/Container.vue";
import ServiceCard from "@/components/ServiceCard.vue";
import Icon from "@/components/Icon.vue";
import { computed } from "vue";
import { inject } from "vue";

const data = inject("data");
</script>

<style scoped>
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* Responsive hover effects */
@media (max-width: 640px) {
    .transform.hover\:-translate-y-1 {
        transition-duration: 200ms;
    }
}

/* Optimize animations for mobile */
@media (prefers-reduced-motion: reduce) {
    .transform,
    .transition-transform,
    .group-hover\:translate-x-1 {
        transition: none !important;
        transform: none !important;
    }
}
</style>