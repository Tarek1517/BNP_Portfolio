<template>
    <section class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 2xl:py-24 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-white to-secondary/5 -z-10"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-4 sm:top-8 md:top-10 left-4 sm:left-8 md:left-10 w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 bg-primary/10 rounded-full blur-xl sm:blur-2xl lg:blur-3xl -z-10"></div>
        <div class="absolute bottom-4 sm:bottom-8 md:bottom-10 right-4 sm:right-8 md:right-10 w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-40 lg:h-40 bg-secondary/10 rounded-full blur-xl sm:blur-2xl lg:blur-3xl -z-10"></div>

        <Container>
            <div class="relative bg-gradient-to-r from-primary to-secondary rounded-xl sm:rounded-2xl lg:rounded-3xl overflow-hidden shadow-lg sm:shadow-xl lg:shadow-2xl">
                <!-- Background Pattern Overlay -->
                <div class="absolute inset-0 bg-white/5 opacity-10"></div>
                
                <!-- Content -->
                <div class="relative z-10 p-5 sm:p-6 md:p-8 lg:p-10 xl:p-12 text-center lg:text-left">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12 items-center">
                        <!-- Left: Text Content -->
                        <div>
                            <span class="inline-flex items-center gap-1.5 sm:gap-2 bg-white/20 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
                                <Icon name="mdi:handshake" class="animate-pulse w-3 h-3 sm:w-4 sm:h-4" />
                                একসাথে এগিয়ে যাই
                            </span>
                            
                            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-3 sm:mb-4 leading-tight sm:leading-snug">
                                উন্নত বাংলাদেশ গড়ার স্বপ্ন
                            </h2>
                            
                            <p class="text-white/90 text-sm sm:text-base md:text-lg leading-relaxed mb-5 sm:mb-6 lg:mb-0">
                                আপনার মতামত ও অংশগ্রহণই আমাদের শক্তি। চলুন একসাথে গড়ে তুলি একটি সমৃদ্ধ, আধুনিক ও ন্যায়ভিত্তিক বাংলাদেশ।
                            </p>
                        </div>

                        <!-- Right: Buttons -->
                        <div class="flex flex-col sm:flex-row lg:flex-col gap-3 sm:gap-4 justify-center lg:justify-end">
                            <!-- Contact Button -->
                            <router-link
                                to="/contact"
                                class="group bg-white text-primary hover:bg-gray-50 font-semibold py-3 sm:py-3.5 md:py-4 px-6 sm:px-7 md:px-8 rounded-full hover:shadow-lg sm:hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 flex items-center justify-center gap-2 sm:gap-3 text-sm sm:text-base"
                            >
                                <span>যোগাযোগ করুন</span>
                                <Icon name="mdi:message-text" class="group-hover:scale-110 transition-transform duration-300 w-4 h-4 sm:w-5 sm:h-5" />
                            </router-link>

                            <!-- More Button -->
                            <router-link
                                to="/about"
                                class="group bg-transparent border-2 border-white text-white hover:bg-white/10 font-semibold py-3 sm:py-3.5 md:py-4 px-6 sm:px-7 md:px-8 rounded-full transition-all duration-300 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 flex items-center justify-center gap-2 sm:gap-3 text-sm sm:text-base"
                            >
                                <span>আরও জানুন</span>
                                <Icon name="mdi:arrow-right" class="group-hover:translate-x-0.5 sm:group-hover:translate-x-1 transition-transform duration-300 w-4 h-4 sm:w-5 sm:h-5" />
                            </router-link>
                        </div>
                    </div>
                </div>

                <!-- Floating Decorative Elements -->
                <div class="absolute -top-3 sm:-top-4 md:-top-5 lg:-top-6 -left-3 sm:-left-4 md:-left-5 lg:-left-6 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 bg-white/10 rounded-full blur-lg sm:blur-xl"></div>
                <div class="absolute -bottom-4 sm:-bottom-5 md:-bottom-6 lg:-bottom-8 -right-4 sm:-right-5 md:-right-6 lg:-right-8 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-32 lg:h-32 bg-white/10 rounded-full blur-lg sm:blur-xl"></div>
            </div>
        </Container>
    </section>
</template>

<script setup>
import Container from "@/components/Container.vue";
import Icon from "@/components/Icon.vue";
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

/* Responsive text optimization */
.leading-tight {
    line-height: 1.25;
}

.sm\:leading-snug {
    line-height: 1.375;
}

@media (max-width: 380px) {
    .text-xl {
        font-size: 1.25rem;
    }
    
    .text-sm {
        font-size: 0.75rem;
    }
}

/* Better button spacing on small screens */
@media (max-width: 640px) {
    .gap-3 > * {
        width: 100%;
        max-width: 280px;
        margin-left: auto;
        margin-right: auto;
    }
}

/* Optimize animations for mobile */
@media (max-width: 640px) {
    .transition-transform {
        transition-duration: 250ms;
    }
    
    .transform.hover\:-translate-y-0\.5 {
        transition-duration: 200ms;
    }
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .animate-pulse,
    .transition-all,
    .transition-transform,
    .group-hover\:scale-110,
    .group-hover\:translate-x-1,
    .transform {
        animation: none !important;
        transition: none !important;
        transform: none !important;
    }
}

/* Ensure buttons are properly aligned */
@media (min-width: 641px) and (max-width: 1024px) {
    .sm\:flex-row {
        justify-content: center;
    }
}
</style>