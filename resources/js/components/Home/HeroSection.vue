<template>
    <section class="relative flex items-center overflow-hidden bg-gradient-to-br from-gray-50 to-white py-8 sm:py-10 md:py-12 lg:py-16 xl:py-20">
        <Container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 md:gap-12 lg:gap-16 xl:gap-20 items-center">
                
                <!-- Left Content -->
                <div class="relative z-10 order-2 lg:order-1">
                    <!-- Animated Badge -->
                    <div class="animate-fade-in-down mb-4 sm:mb-5 md:mb-6">
                        <span class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold">
                            <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-primary rounded-full animate-pulse"></span>
                            {{ allData?.badge || 'রাজনৈতিক নেতা ও সমাজসেবী' }}
                        </span>
                    </div>

                    <!-- Animated Title -->
                    <div class="overflow-hidden mb-2 sm:mb-3">
                        <h1 class="text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight sm:leading-snug">
                            <span 
                                v-for="(word, index) in allData?.title?.split(' ')" 
                                :key="index"
                                class="inline-block animate-slide-up"
                                :style="`animation-delay: ${index * 0.1}s`"
                            >
                                {{ word }}&nbsp;
                            </span>
                        </h1>
                    </div>

                    <!-- Animated Subtitle -->
                    <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                        <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 mb-3 sm:mb-4 md:mb-6 lg:mb-8 leading-relaxed">
                            {{ allData?.sub_title }}
                        </p>
                    </div>

                    <!-- Animated Description -->
                    <div class="animate-fade-in-up" style="animation-delay: 0.6s">
                        <p class="text-sm sm:text-base md:text-lg text-gray-500 mb-6 sm:mb-8 md:mb-10 leading-relaxed">
                            {{ allData?.short_description }}
                        </p>
                    </div>

                    <!-- Animated Buttons -->
                    <div class="flex flex-wrap gap-3 sm:gap-4 animate-fade-in-up" style="animation-delay: 0.8s">
                        <a
                            :href="allData?.button_link"
                            class="group relative bg-gradient-to-r from-primary to-secondary text-white text-sm sm:text-base md:text-lg font-semibold py-2.5 sm:py-3 px-6 sm:px-8 rounded-full hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 transform hover:-translate-y-1 w-full sm:w-auto text-center"
                        >
                            <span class="relative z-10">
                                {{ allData?.button_text || 'যোগাযোগ করুন' }}
                            </span>
                            <div class="absolute inset-0 bg-white/10 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        
                        <a
                            href="#portfolio"
                            class="group border-2 border-primary text-primary hover:bg-primary hover:text-white text-sm sm:text-base md:text-lg font-semibold py-2.5 sm:py-3 px-6 sm:px-8 rounded-full transition-all duration-300 transform hover:-translate-y-1 w-full sm:w-auto text-center"
                        >
                            <span class="flex items-center justify-center sm:justify-start gap-2">
                                আমার কার্যক্রম
                                <Icon name="mdi:arrow-right" class="group-hover:translate-x-1 transition-transform duration-300" />
                            </span>
                        </a>
                    </div>

                    <!-- Social Links -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-6 mt-8 sm:mt-10 md:mt-12 animate-fade-in-up" style="animation-delay: 1s">
                        <span class="text-gray-500 font-medium text-sm sm:text-base">Follow on:</span>
                        <div class="flex gap-3 sm:gap-4">
                            <a href="#" class="text-gray-400 hover:text-primary hover:scale-110 transition-all duration-300">
                                <Icon name="mdi:facebook" class="w-5 h-5 sm:w-6 sm:h-6" />
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary hover:scale-110 transition-all duration-300">
                                <Icon name="mdi:twitter" class="w-5 h-5 sm:w-6 sm:h-6" />
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary hover:scale-110 transition-all duration-300">
                                <Icon name="mdi:instagram" class="w-5 h-5 sm:w-6 sm:h-6" />
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary hover:scale-110 transition-all duration-300">
                                <Icon name="mdi:youtube" class="w-5 h-5 sm:w-6 sm:h-6" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative order-1 lg:order-2 animate-float mb-6 sm:mb-8 md:mb-0">
                    <div class="relative z-0">
                        <!-- Main Image -->
                        <div class="relative z-10 rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl">
                            <img
                                :src="allData?.image"
                                :alt="allData?.title"
                                class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700"
                            />
                        </div>
                        
                        <!-- Decorative Elements - Behind the image -->
                        <div class="absolute -top-4 -left-4 sm:-top-6 sm:-left-6 w-24 h-24 sm:w-32 sm:h-32 bg-secondary/20 rounded-full blur-xl animate-pulse -z-10"></div>
                        <div class="absolute -bottom-6 -right-6 sm:-bottom-8 sm:-right-8 w-32 h-32 sm:w-40 sm:h-40 bg-primary/20 rounded-full blur-xl animate-pulse -z-10" style="animation-delay: 1s"></div>
                        
                        <!-- Floating Badge - Above the image -->
                        <div class="absolute -bottom-4 -right-4 sm:-bottom-6 sm:-right-6 bg-white rounded-xl sm:rounded-2xl p-3 sm:p-4 shadow-lg sm:shadow-xl animate-bounce-slow z-20">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center">
                                    <Icon name="mdi:star" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-white" />
                                </div>
                                <div>
                                    <p class="font-bold text-primary text-sm sm:text-base md:text-lg">১০+ বছর</p>
                                    <p class="text-xs sm:text-sm text-gray-600 whitespace-nowrap">জনসেবার অভিজ্ঞতা</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Container>

        <!-- Background Pattern -->
        <div class="absolute inset-0 overflow-hidden -z-10">
            <div class="absolute top-1/4 left-1/4 w-48 h-48 sm:w-64 sm:h-64 bg-primary/5 rounded-full blur-2xl sm:blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-56 h-56 sm:w-80 sm:h-80 bg-secondary/5 rounded-full blur-2xl sm:blur-3xl"></div>
        </div>
    </section>
</template>

<script setup>
import Container from "@/components/Container.vue";

const props = defineProps({
    allData: Object,
});
</script>

<style scoped>
@keyframes fade-in-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes bounce-slow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-fade-in-down {
    animation: fade-in-down 0.8s ease-out forwards;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}

.animate-slide-up {
    animation: slide-up 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-bounce-slow {
    animation: bounce-slow 3s ease-in-out infinite;
}

/* Extra small devices (phones) */
@media (max-width: 480px) {
    .animate-float {
        animation: float 8s ease-in-out infinite;
    }
}

/* Small devices (tablets) */
@media (min-width: 481px) and (max-width: 1024px) {
    .animate-float {
        animation: float 7s ease-in-out infinite;
    }
}
</style>