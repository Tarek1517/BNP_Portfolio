<template>
    <section class="bg-gradient-to-b from-gray-50 to-white py-12 lg:py-20">
        <Container>
            <div class="text-center mb-12 lg:mb-16">
                <span class="inline-block bg-primary/10 text-primary px-4 py-2 rounded-full text-xs lg:text-sm font-semibold mb-4">
                    আমাদের দর্শন
                </span>
                <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-4">
                    আমাদের উদ্দেশ্য ও লক্ষ্য
                </h2>
                <p class="text-baselg:text-lg text-gray-600 max-w-3xl mx-auto">
                    জনগণের সেবায় নিবেদিত প্রাণ, উন্নয়ন ও সমৃদ্ধির পথে অগ্রযাত্রা
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <!-- Left Side: YouTube Video -->
                <div class="relative group">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <iframe
                            v-if="dynamicVideoLink"
                            :src="dynamicVideoLink"
                            title="রাজনৈতিক বক্তব্য"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                            class="w-full h-64 lg:h-96 rounded-2xl transform group-hover:scale-105 transition-transform duration-500"
                        ></iframe>
                       
                        
                    </div>
                    
                    <!-- Video Label -->
                    <div class="mt-4 text-center">
                        <p class="text-xs lg:text-sm text-gray-500">সাম্প্রতিক জনসভা</p>
                        <p class="text-base lg:text-lg font-semibold text-gray-900">রাজনৈতিক বক্তব্য</p>
                    </div>
                </div>

                <!-- Right Side: Features -->
                <div class="space-y-8">
                    <!-- Mission -->
                    <div class="group bg-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div class="flex items-start gap-5">
                            <div class="relative">
                                <div class="bg-gradient-to-br from-primary to-secondary p-3 lg:p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                    <Icon name="mdi:flag" class="text-xl lg:text-3xl text-white" />
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-secondary rounded-full animate-pulse"></div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-xl lg:text-2xl font-bold text-gray-900">
                                        আমাদের মিশন
                                    </h3>
                                    <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">লক্ষ্য ১</span>
                                </div>
                                <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                                    সমাজের প্রতিটি স্তরে ন্যায়বিচার প্রতিষ্ঠা, উন্নয়নকে সকলের দোরগোড়ায় পৌঁছে দেওয়া এবং একটি দুর্নীতিমুক্ত, স্বচ্ছ ও উন্নত বাংলাদেশ গড়ে তোলা।
                                </p>
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <ul class="space-y-2">
                                        <li class="flex items-center gap-2 text-xs lg:text-sm text-gray-500">
                                            <Icon name="mdi:check-circle" class="text-primary" />
                                            <span>সকলের জন্য শিক্ষা</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-xs lg:text-sm text-gray-500">
                                            <Icon name="mdi:check-circle" class="text-primary" />
                                            <span>মানসম্মত স্বাস্থ্যসেবা</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-xs lg:text-sm text-gray-500">
                                            <Icon name="mdi:check-circle" class="text-primary" />
                                            <span>কৃষকের অধিকার রক্ষা</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="group bg-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-secondary/20">
                        <div class="flex items-start gap-5">
                            <div class="relative">
                                <div class="bg-gradient-to-br from-secondary to-primary p-3 lg:p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                    <Icon name="mdi:eye" class="text-xl lg:text-3xl text-white" />
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-primary rounded-full animate-pulse" style="animation-delay: 0.5s"></div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-xl lg:text-2xl font-bold text-gray-900">
                                        আমাদের ভিশন
                                    </h3>
                                    <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">লক্ষ্য ২</span>
                                </div>
                                <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                                    একটি ডিজিটাল, আধুনিক ও সমৃদ্ধ বাংলাদেশ যেখানে প্রতিটি নাগরিকের মৌলিক চাহিদা পূরণ হবে।
                                </p>
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-4">
                                        <span class="text-xs font-semibold text-gray-500">২০২৩-২০৩০:</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                                            <div class="bg-secondary h-2 rounded-full w-3/4"></div>
                                        </div>
                                        <span class="text-sm font-bold text-secondary">৭৫%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Goals -->
                    <div class="group bg-white p-6 lg:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div class="flex items-start gap-5">
                            <div class="relative">
                                <div class="bg-gradient-to-br from-primary via-secondary to-primary p-3 lg:p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                    <Icon name="mdi:target" class="text-xl lg:text-3xl text-white" />
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-secondary rounded-full animate-pulse" style="animation-delay: 1s"></div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-xl lg:text-2xl font-bold text-gray-900">
                                        আমাদের লক্ষ্যসমূহ
                                    </h3>
                                    <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">লক্ষ্য ৩</span>
                                </div>
                                <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                                    সামাজিক ন্যায়বিচার প্রতিষ্ঠা, অর্থনৈতিক স্বনির্ভরতা অর্জন এবং রাজনৈতিক স্থিতিশীলতা বজায় রাখা।
                                </p>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-3 gap-3">
                                    <div class="bg-primary/5 p-3 rounded-lg text-center">
                                        <p class="text-lg lg:text-2xl font-bold text-primary">১০০+</p>
                                        <p class="text-xs text-gray-600">সামাজিক প্রকল্প</p>
                                    </div>
                                    <div class="bg-secondary/5 p-3 rounded-lg text-center">
                                        <p class="text-lg lg:text-2xl font-bold text-secondary">৫০+</p>
                                        <p class="text-xs text-gray-600">যুব উন্নয়ন কর্মসূচি</p>
                                    </div>
                                    <div class="bg-primary/5 p-3 rounded-lg text-center">
                                        <p class="text-lg lg:text-2xl font-bold text-primary">২৫+</p>
                                        <p class="text-xs text-gray-600">নির্বাচনী অঞ্চল</p>
                                    </div>
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
import { computed } from "vue";
import { inject } from "vue";

const data = inject("data");

const dynamicVideoLink = computed(() => {
    const videoLink = data?.value?.homePage_video_link || "";
    if (videoLink.includes("youtube.com/watch")) {
        return videoLink.replace("watch?v=", "embed/");
    }
    return videoLink;
});
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
</style>