<template>
    <AppLayout>
        <!-- Loading State -->
        <div v-if="loading" class="flex justify-center items-center min-h-screen">
            <div class="text-center px-4">
                <Icon name="mdi:loading" class="text-3xl sm:text-4xl text-primary animate-spin mx-auto mb-3 sm:mb-4" />
                <p class="text-sm sm:text-base text-gray-600">সেবার বিস্তারিত লোড হচ্ছে...</p>
            </div>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="flex justify-center items-center min-h-screen">
            <div class="text-center max-w-xs sm:max-w-sm md:max-w-md mx-auto p-6 sm:p-8">
                <Icon name="mdi:alert-circle" class="text-3xl sm:text-4xl text-red-500 mx-auto mb-3 sm:mb-4" />
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-1.5 sm:mb-2">সেবার বিস্তারিত লোড করতে সমস্যা হয়েছে</h3>
                <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">{{ error }}</p>
                <button @click="fetchService" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-primary text-white text-sm sm:text-base rounded-lg font-medium hover:bg-primary-dark transition-colors active:scale-95">
                    আবার চেষ্টা করুন
                </button>
            </div>
        </div>

        <!-- Service Details -->
        <div v-else-if="serviceData" class="bg-white">
            <!-- Gallery Modal -->
            <div v-if="showGalleryModal" class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-3 sm:p-4" @click.self="closeGallery">
                <div class="relative w-full max-w-2xl sm:max-w-3xl md:max-w-4xl">
                    <button @click="closeGallery" class="absolute -top-10 sm:-top-12 right-0 text-white hover:text-gray-300 z-10">
                        <Icon name="mdi:close" class="text-2xl sm:text-3xl" />
                    </button>
                    
                    <!-- Main Image -->
                    <div class="mb-3 sm:mb-4">
                        <img 
                            :src="currentGalleryImage" 
                            :alt="`${serviceData.title} - Image ${currentGalleryIndex + 1}`"
                            class="w-full h-auto max-h-[60vh] sm:max-h-[65vh] md:max-h-[70vh] object-contain rounded-lg"
                            loading="lazy"
                        />
                    </div>
                    
                    <!-- Navigation -->
                    <div class="flex justify-between items-center px-2 sm:px-0">
                        <button 
                            @click="prevGalleryImage" 
                            class="text-white hover:text-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            :disabled="currentGalleryIndex == 0"
                        >
                            <Icon name="mdi:chevron-left" class="text-2xl sm:text-3xl" />
                        </button>
                        
                        <div class="text-white text-center">
                            <span class="text-sm sm:text-base md:text-lg">{{ currentGalleryIndex + 1 }} / {{ allGalleryImages.length }}</span>
                            <p class="text-xs sm:text-sm text-gray-300 mt-0.5 sm:mt-1 line-clamp-1">{{ serviceData.title }}</p>
                        </div>
                        
                        <button 
                            @click="nextGalleryImage" 
                            class="text-white hover:text-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            :disabled="currentGalleryIndex == allGalleryImages.length - 1"
                        >
                            <Icon name="mdi:chevron-right" class="text-2xl sm:text-3xl" />
                        </button>
                    </div>
                    
                    <!-- Thumbnails -->
                    <div v-if="allGalleryImages.length > 1" class="flex gap-1.5 sm:gap-2 mt-3 sm:mt-4 overflow-x-auto py-2 justify-center">
                        <div 
                            v-for="(image, index) in allGalleryImages" 
                            :key="index"
                            class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 lg:w-20 lg:h-20 cursor-pointer border-2 rounded overflow-hidden"
                            :class="currentGalleryIndex == index ? 'border-primary' : 'border-transparent'"
                            @click="currentGalleryIndex = index"
                        >
                            <img 
                                :src="getImageUrl(image)" 
                                :alt="`Thumbnail ${index + 1}`"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Section -->
            <section class="relative bg-gradient-to-br from-primary/10 via-white to-secondary/10 py-8 sm:py-10 md:py-12 lg:py-14 xl:py-16">
                <Container>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 md:gap-10 lg:gap-12 items-center">
                        <!-- Left: Service Info -->
                        <div class="order-2 lg:order-1">
                            <div class="mb-3 sm:mb-4">
                                <span v-if="serviceData.service_cat" class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold">
                                    <Icon :name="serviceData.service_cat.icon || 'mdi:tag'" class="text-primary w-3 h-3 sm:w-4 sm:h-4" />
                                    {{ serviceData.service_cat.title }}
                                </span>
                            </div>
                            
                            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 sm:mb-4 leading-tight sm:leading-snug">
                                {{ serviceData.title }}
                            </h1>
                            
                            <div v-if="serviceData.short_description" class="text-sm sm:text-base md:text-lg text-gray-600 mb-4 sm:mb-5 md:mb-6 leading-relaxed">
                                {{ extractQuote(serviceData.short_description) }}
                            </div>
                            
                            <!-- Meta Information -->
                            <div class="flex flex-wrap gap-3 sm:gap-4 mb-4 sm:mb-5 md:mb-6">
                                <div v-if="serviceData.created_at" class="flex items-center gap-1.5 sm:gap-2 text-sm sm:text-base text-gray-600">
                                    <Icon name="mdi:calendar" class="text-primary w-4 h-4 sm:w-5 sm:h-5" />
                                    <span>শুরু: {{ formatDate(serviceData.created_at) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Service Image -->
                        <div class="relative order-1 lg:order-2 mb-6 sm:mb-8 lg:mb-0">
                            <div class="rounded-xl sm:rounded-2xl overflow-hidden shadow-lg sm:shadow-xl lg:shadow-2xl">
                                <img 
                                    :src="serviceData.image" 
                                    :alt="serviceData.title"
                                    class="w-full h-auto object-cover"
                                    loading="lazy"
                                />
                            </div>
                        </div>
                    </div>
                </Container>
            </section>

            <!-- Content Section -->
            <section class="py-8 sm:py-10 md:py-12 lg:py-14 xl:py-16">
                <Container>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 md:gap-10 lg:gap-12">
                        <!-- Main Content -->
                        <div class="lg:col-span-2">
                            <!-- Gallery Images -->
                            <div v-if="serviceData.images && serviceData.images.length > 0" class="mb-8 sm:mb-10">
                                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 flex items-center gap-1.5 sm:gap-2">
                                    <Icon name="mdi:image-multiple" class="text-primary w-5 h-5 sm:w-6 sm:h-6" />
                                    গ্যালারি
                                </h2>
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-3 md:gap-4">
                                    <div 
                                        v-for="(image, index) in serviceData.images" 
                                        :key="image.id"
                                        class="relative group rounded-lg sm:rounded-xl overflow-hidden border border-gray-200 cursor-pointer"
                                        @click="openGallery(index + 1)"
                                    >
                                        <img 
                                            :src="image.image_url || image.url" 
                                            :alt="`${serviceData.title} - Image ${index + 1}`"
                                            class="w-full h-20 sm:h-24 md:h-28 lg:h-32 object-cover group-hover:scale-105 sm:group-hover:scale-110 transition-transform duration-300"
                                            loading="lazy"
                                        />
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div v-if="serviceData.description" class="prose max-w-none">
                                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-900 mb-4 sm:mb-6">বিস্তারিত বিবরণ</h2>
                                <div class="text-sm sm:text-base text-gray-700 leading-relaxed" v-html="serviceData.description"></div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-4 sm:space-y-5 md:space-y-6">
                            <!-- Service Category -->
                            <div class="bg-white rounded-lg sm:rounded-xl shadow-md sm:shadow-lg p-4 sm:p-5 md:p-6 border border-gray-100">
                                <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4 flex items-center gap-1.5 sm:gap-2">
                                    <Icon name="mdi:tag" class="text-primary w-4 h-4 sm:w-5 sm:h-5" />
                                    সেবা ক্যাটাগরি
                                </h3>
                                <div class="flex items-center gap-2.5 sm:gap-3">
                                    <div class="w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                        <Icon :name="serviceData.service_cat?.icon || 'mdi:star'" class="text-primary text-lg sm:text-xl" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 text-sm sm:text-base">{{ serviceData.service_cat?.title }}</h4>
                                        <p class="text-xs sm:text-sm text-gray-600 line-clamp-2">{{ serviceData.service_cat?.short_description }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Share Section -->
                            <div class="bg-white rounded-lg sm:rounded-xl shadow-md sm:shadow-lg p-4 sm:p-5 md:p-6 border border-gray-100">
                                <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4 flex items-center gap-1.5 sm:gap-2">
                                    <Icon name="mdi:share-variant" class="text-primary w-4 h-4 sm:w-5 sm:h-5" />
                                    শেয়ার করুন
                                </h3>
                                <div class="flex gap-2 sm:gap-3 justify-center sm:justify-start">
                                    <a :href="`https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`" target="_blank" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center hover:bg-blue-200 transition-colors active:scale-95">
                                        <Icon name="mingcute:facebook-fill" class="w-4 h-4 sm:w-5 sm:h-5" />
                                    </a>
                                    <a :href="`https://twitter.com/intent/tweet?url=${currentUrl}&text=${serviceData.title}`" target="_blank" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center hover:bg-blue-100 transition-colors active:scale-95">
                                        <Icon name="hugeicons:new-twitter-ellipse" class="w-4 h-4 sm:w-5 sm:h-5" />
                                    </a>
                                    <a :href="`whatsapp://send?text=${serviceData.title} ${currentUrl}`" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center hover:bg-green-200 transition-colors active:scale-95">
                                        <Icon name="logos:whatsapp-icon" class="w-4 h-4 sm:w-5 sm:h-5" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </Container>
            </section>
        </div>
    </AppLayout>
</template>

<script setup>
import Container from "@/components/Container.vue";
import Icon from "@/components/Icon.vue";
import ServiceCard from "@/components/ServiceCard.vue";
import AppLayout from "@/components/AppLayout.vue";
import { ref, onMounted, computed } from "vue";
import { useRoute } from "vue-router";
import useAxios from "@/composables/useAxios.js";

const route = useRoute();
const { error, loading, sendRequest } = useAxios();
const serviceData = ref(null);
const slug = route.params.slug;

// Gallery states
const showGalleryModal = ref(false);
const currentGalleryIndex = ref(0);

// Related services
const relatedServices = ref([]);

const fetchService = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: `frontend/v1/get-service-data/${slug}`,
        });
        serviceData.value = response?.data?.data || null;
        
    } catch (err) {
        console.error("Error fetching service:", err);
        error.value = err.message || "সেবার তথ্য লোড করতে ব্যর্থ হয়েছে";
    }
};

// Gallery functions
const allGalleryImages = computed(() => {
    if (!serviceData.value) return [];
    const mainImage = serviceData.value.image;
    const galleryImages = serviceData.value.images || [];
    return [mainImage, ...galleryImages.map(img => img.image_url || img.url)];
});

const currentGalleryImage = computed(() => {
    return allGalleryImages.value[currentGalleryIndex.value];
});

const openGallery = (index) => {
    currentGalleryIndex.value = index;
    showGalleryModal.value = true;
    document.body.style.overflow = 'hidden';
};

const closeGallery = () => {
    showGalleryModal.value = false;
    document.body.style.overflow = 'auto';
};

const prevGalleryImage = () => {
    if (currentGalleryIndex.value > 0) {
        currentGalleryIndex.value--;
    }
};

const nextGalleryImage = () => {
    if (currentGalleryIndex.value < allGalleryImages.value.length - 1) {
        currentGalleryIndex.value++;
    }
};

// Utility functions
const extractQuote = (text) => {
    if (!text) return '';
    const match = text.match(/^"([^"]+)"/);
    return match ? match[1] : text.split('—')[0]?.trim() || text;
};

const extractAuthor = (text) => {
    if (!text) return 'তানভীর আহমেদ রবিন';
    const parts = text.split('—');
    return parts.length > 1 ? parts[1].split('ত্রয়োদশ')[0]?.trim() || 'তানভীর আহমেদ রবিন' : 'তানভীর আহমেদ রবিন';
};

const extractAuthorTitle = (text) => {
    if (!text) return 'বিএনপি মনোনীত প্রার্থী';
    if (text.includes('ত্রয়োদশ জাতীয় সংসদ নির্বাচন')) {
        return 'ত্রয়োদশ জাতীয় সংসদ নির্বাচন, বিএনপি মনোনীত প্রার্থী';
    }
    if (text.includes('সদস্য সচিব')) {
        return 'সদস্য সচিব, ঢাকা মহানগর দক্ষিণ বিএনপি';
    }
    return 'বিএনপি মনোনীত প্রার্থী';
};

const formatDate = (dateString) => {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleDateString('bn-BD', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

const getImageUrl = (image) => {
    return typeof image == 'string' ? image : (image?.image_url || image?.url || '');
};

// Current URL for sharing
const currentUrl = computed(() => {
    return window.location.href;
});

onMounted(() => {
    fetchService();
});
</script>

<style scoped>
/* Responsive text optimization */
@media (max-width: 380px) {
    .text-xl {
        font-size: 1.25rem;
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
    
    .leading-relaxed {
        line-height: 1.4;
    }
}

/* Optimize animations for mobile */
@media (max-width: 640px) {
    .transition-transform {
        transition-duration: 250ms;
    }
    
    .group-hover\:scale-105 {
        transition-duration: 200ms;
    }
}

/* Active state for buttons */
.active\:scale-95:active {
    transform: scale(0.95);
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .animate-spin,
    .transition-transform,
    .transition-colors,
    .group-hover\:scale-105,
    .group-hover\:scale-110,
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

.line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
}

.line-clamp-2 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

/* Responsive gallery modal */
@media (max-width: 640px) {
    .max-h-\[60vh\] {
        max-height: 60vh;
    }
}

@media (min-width: 641px) and (max-width: 1024px) {
    .max-h-\[65vh\] {
        max-height: 65vh;
    }
}

/* Better gallery thumbnail scrolling on mobile */
@media (max-width: 640px) {
    .overflow-x-auto {
        -webkit-overflow-scrolling: touch;
    }
    
    .overflow-x-auto::-webkit-scrollbar {
        display: none;
    }
    
    .overflow-x-auto {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
}

/* Prose content responsive */
.prose :deep(p) {
    margin-bottom: 1rem;
}

.prose :deep(h1),
.prose :deep(h2),
.prose :deep(h3) {
    margin-top: 1.5rem;
    margin-bottom: 1rem;
}

.prose :deep(ul),
.prose :deep(ol) {
    padding-left: 1.5rem;
    margin-bottom: 1rem;
}

.prose :deep(li) {
    margin-bottom: 0.5rem;
}

.prose :deep(img) {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
}

/* Responsive prose content */
@media (max-width: 640px) {
    .prose :deep(p) {
        font-size: 0.875rem;
        line-height: 1.5;
    }
    
    .prose :deep(h2) {
        font-size: 1.25rem;
    }
    
    .prose :deep(h3) {
        font-size: 1.125rem;
    }
}
</style>