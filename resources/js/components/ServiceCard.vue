<template>
    <div
        class="group relative bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/30 h-full"
    >
        <!-- Background Pattern -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-white via-gray-50/50 to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"
        ></div>

        <!-- Image Container -->
        <div class="relative h-48 xs:h-56 sm:h-60 md:h-64 lg:h-72 overflow-hidden">
            <img
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                :src="service?.image"
                :alt="service?.name"
                loading="lazy"
            />

            <!-- Gradient Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
            ></div>

            <!-- Category Badge -->
            <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                <span
                    class="inline-flex items-center gap-1 px-2.5 sm:px-3 py-0.5 sm:py-1 rounded-full bg-white/95 backdrop-blur-sm text-xs font-semibold text-primary shadow-sm"
                >
                    <Icon name="mdi:circle-small" class="text-primary w-3 h-3 sm:w-4 sm:h-4" />
                    {{ service?.service_cat?.title }}
                </span>
            </div>

            <!-- Hover Overlay -->
            <div
                class="absolute inset-0 bg-primary/0 group-hover:bg-primary/10 transition-colors duration-300"
            ></div>
        </div>

        <!-- Content Container -->
        <div class="p-4 sm:p-5 md:p-6">
            <!-- Service Title -->
            <RouterLink :to="`/service-details/${service?.slug}`">
                <h3
                    class="text-base sm:text-lg md:text-xl font-bold text-gray-900 mb-2 sm:mb-3 group-hover:text-primary transition-colors duration-300 line-clamp-2 leading-snug"
                >
                    {{ service?.title }}
                </h3>
            </RouterLink>

            <!-- Short Description -->
            <p class="text-gray-600 text-xs sm:text-sm mb-4 sm:mb-5 line-clamp-3 leading-relaxed">
                {{ service?.short_description }}
            </p>

            <!-- Stats (if any) -->
            <div v-if="service?.stats" class="grid grid-cols-2 gap-2 sm:gap-3 mb-4 sm:mb-5">
                <div class="text-center p-2 sm:p-3">
                    <div class="text-lg sm:text-xl md:text-2xl font-bold text-primary">
                        {{ service.stats.count }}+
                    </div>
                    <div class="text-xs sm:text-sm text-gray-500">প্রকল্প</div>
                </div>
                <div class="text-center p-2 sm:p-3">
                    <div class="text-lg sm:text-xl md:text-2xl font-bold text-secondary">
                        {{ service.stats.impact }}+
                    </div>
                    <div class="text-xs sm:text-sm text-gray-500">সুবিধাভোগী</div>
                </div>
            </div>

            <!-- CTA Button -->
            <div
                class="mt-auto pt-3 sm:pt-4 border-t border-gray-100 group-hover:border-primary/20 transition-colors duration-300"
            >
                <RouterLink
                    :to="`/service-details/${service?.slug}`"
                    class="inline-flex items-center justify-between w-full text-primary hover:text-white group/btn"
                >
                    <span class="text-xs sm:text-sm font-semibold">বিস্তারিত দেখুন</span>
                    <span
                        class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-primary/10 group-hover/btn:bg-primary flex items-center justify-center transition-all duration-300"
                    >
                        <Icon
                            name="mdi:arrow-right"
                            class="text-primary group-hover/btn:text-white transform group-hover/btn:translate-x-0.5 sm:group-hover/btn:translate-x-1 transition-transform duration-300 w-4 h-4 sm:w-5 sm:h-5"
                        />
                    </span>
                </RouterLink>
            </div>
        </div>

        <!-- Decorative Corner -->
        <div class="absolute top-0 right-0 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 overflow-hidden">
            <div
                class="absolute top-0 right-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-gradient-to-br from-primary to-secondary transform rotate-45 -translate-y-3 sm:-translate-y-3.5 md:-translate-y-4 translate-x-3 sm:translate-x-3.5 md:translate-x-4 group-hover:scale-125 transition-transform duration-300"
            ></div>
        </div>

        <!-- Hover Border Animation -->
        <div
            class="absolute inset-0 border-2 border-transparent group-hover:border-primary/20 rounded-xl sm:rounded-2xl transition-colors duration-300 pointer-events-none"
        ></div>
    </div>
</template>

<script setup>
import { inject } from "vue";
const data = inject("data");
const props = defineProps({
    service: Object,
});
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Extra small devices (phones under 380px) */
@media (max-width: 380px) {
    .h-48 {
        height: 10rem;
    }
    
    .xs\:h-56 {
        height: 11rem;
    }
}

/* Optimize transitions for mobile */
@media (max-width: 640px) {
    .transition-transform {
        transition-duration: 400ms;
    }
    
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.05);
    }
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .transition-all,
    .transition-transform,
    .transition-colors,
    .transition-opacity,
    .group-hover\:translate-x-1,
    .group-hover\:scale-110,
    .group-hover\:scale-125 {
        transition: none !important;
        transform: none !important;
    }
}

/* Better text rendering on small screens */
@media (max-width: 640px) {
    .leading-snug {
        line-height: 1.25;
    }
    
    .leading-relaxed {
        line-height: 1.4;
    }
}
</style>