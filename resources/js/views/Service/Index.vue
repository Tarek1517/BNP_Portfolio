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
                        জনসেবা কার্যক্রম
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug"
                    >
                        আমাদের সেবাসমূহ
                    </h1>
                    <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0">
                        সমাজের উন্নয়ন ও মানুষের কল্যাণে আমাদের বিভিন্ন
                        কার্যক্রম ও সেবা সমূহ
                    </p>
                </div>
            </Container>
        </section>

        <!-- Services Grid Section -->
        <section class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 bg-white">
            <Container>
                <!-- Filter/Category Section -->
                <div class="mb-8 sm:mb-10 md:mb-12 lg:mb-14 xl:mb-16">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 mb-6 sm:mb-8"
                    >
                        <div class="flex-1 min-w-0">
                            <h2
                                class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900"
                            >
                                সকল সেবা সমূহ
                            </h2>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 mt-1 sm:mt-2">
                                {{ allServices?.data?.length || 0 }}টি সেবা
                                পাওয়া যাচ্ছে
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Loading State -->
                <div
                    v-if="loading"
                    class="flex justify-center items-center py-16 sm:py-20"
                >
                    <div class="text-center">
                        <Icon
                            name="mdi:loading"
                            class="text-3xl sm:text-4xl text-primary animate-spin mx-auto mb-3 sm:mb-4"
                        />
                        <p class="text-sm sm:text-base text-gray-600">সেবাগুলো লোড হচ্ছে...</p>
                    </div>
                </div>

                <!-- Error State -->
                <div v-else-if="error" class="text-center py-16 sm:py-20">
                    <Icon
                        name="mdi:alert-circle"
                        class="text-3xl sm:text-4xl text-red-500 mx-auto mb-3 sm:mb-4"
                    />
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-1.5 sm:mb-2">
                        সেবাগুলো লোড করতে সমস্যা হয়েছে
                    </h3>
                    <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">{{ error }}</p>
                    <button
                        @click="fetchServices"
                        class="px-4 sm:px-6 py-2.5 sm:py-3 bg-primary text-white text-sm sm:text-base rounded-lg font-medium hover:bg-primary-dark transition-colors active:scale-95"
                    >
                        আবার চেষ্টা করুন
                    </button>
                </div>

                <!-- Services Grid -->
                <div
                    v-else-if="allServices?.data?.length > 0"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 lg:gap-8"
                >
                    <ServiceCard
                        v-for="service in allServices.data"
                        :key="service.id"
                        :service="service"
                        class="transform hover:-translate-y-1 sm:hover:-translate-y-2 transition-transform duration-300"
                    />
                </div>

                <!-- Empty State -->
                <div v-else class="text-center py-16 sm:py-20">
                    <Icon
                        name="mdi:folder-open"
                        class="text-3xl sm:text-4xl text-gray-400 mx-auto mb-3 sm:mb-4"
                    />
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-1.5 sm:mb-2">
                        কোনো সেবা পাওয়া যায়নি
                    </h3>
                    <p class="text-sm sm:text-base text-gray-600">
                        দুঃখিত, এখনো কোনো সেবা যুক্ত করা হয়নি।
                    </p>
                </div>

                <!-- Pagination (if your API supports it) -->
                <div
                    v-if="allServices?.meta?.last_page > 1"
                    class="mt-8 sm:mt-10 md:mt-12 lg:mt-14 xl:mt-16"
                >
                    <div class="flex items-center justify-center gap-1.5 sm:gap-2">
                        <button
                            class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 flex items-center justify-center border border-gray-300 rounded-lg hover:border-primary hover:text-primary disabled:opacity-50 disabled:cursor-not-allowed text-sm sm:text-base"
                        >
                            <Icon name="mdi:chevron-left" class="w-4 h-4 sm:w-5 sm:h-5" />
                        </button>

                        <button
                            v-for="page in allServices.meta.last_page"
                            :key="page"
                            class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 flex items-center justify-center border rounded-lg font-medium text-xs sm:text-sm md:text-base"
                            :class="
                                page == allServices.meta.current_page
                                    ? 'border-primary bg-primary text-white'
                                    : 'border-gray-300 hover:border-primary hover:text-primary'
                            "
                        >
                            {{ page }}
                        </button>

                        <button
                            class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 flex items-center justify-center border border-gray-300 rounded-lg hover:border-primary hover:text-primary disabled:opacity-50 disabled:cursor-not-allowed text-sm sm:text-base"
                        >
                            <Icon name="mdi:chevron-right" class="w-4 h-4 sm:w-5 sm:h-5" />
                        </button>
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
import { onMounted, ref } from "vue";
import useAxios from "@/composables/useAxios.js";

const { error, loading, sendRequest } = useAxios();
const allServices = ref([]);

const fetchServices = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-services",
        });
        allServices.value = response?.data || [];
    } catch (err) {
        console.error("Error fetching Services:", err);
        error.value = err.message || "সেবাগুলো লোড করতে ব্যর্থ হয়েছে";
    }
};

onMounted(() => {
    fetchServices();
});
</script>

<style scoped>
/* Responsive text optimization */
@media (max-width: 380px) {
    .text-2xl {
        font-size: 1.5rem;
    }
    
    .text-lg {
        font-size: 1rem;
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

/* Optimize animations for mobile */
@media (max-width: 640px) {
    .transition-transform {
        transition-duration: 250ms;
    }
    
    .hover\:-translate-y-1 {
        transition-duration: 200ms;
    }
}

/* Active state for buttons */
.active\:scale-95:active {
    transform: scale(0.95);
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .animate-pulse,
    .transition-transform,
    .transition-colors,
    .transform {
        animation: none !important;
        transition: none !important;
        transform: none !important;
    }
}

/* Prevent text overflow */
.min-w-0 {
    min-width: 0;
}

/* Responsive spacing adjustments */
@media (max-width: 640px) {
    .gap-4 > * {
        margin-bottom: 1rem;
    }
    
    .gap-4 > *:last-child {
        margin-bottom: 0;
    }
}
</style>