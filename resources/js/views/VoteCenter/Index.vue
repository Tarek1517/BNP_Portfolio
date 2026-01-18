<template>
    <AppLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-primary/30 via-white to-secondary/30 py-16 lg:py-24 overflow-hidden"
        >
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden -z-10">
                <div
                    class="absolute top-20 left-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl"
                ></div>
                <div
                    class="absolute bottom-20 right-10 w-60 h-60 bg-secondary/10 rounded-full blur-3xl"
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
                        ভোটার সেবা
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug"
                    >
                        ভোট কেন্দ্র খুঁজুন
                    </h1>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0"
                    >
                        আপনার ভোট কেন্দ্র ও নির্বাচনী এলাকা সহজেই খুঁজে নিন
                    </p>
                </div>
            </Container>
        </section>

        <!-- Search Section -->
        <section class="w-full max-w-6xl mx-auto py-12 lg:py-16">
            <Container>
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center"
                >
                    <!-- Right - Search Form -->
                    <div>
                        <div
                            class="bg-white rounded-xl shadow-lg p-4 lg:p-8 border border-gray-100"
                        >
                            <h2
                                class="text-xl lg:text-3xl font-bold text-gray-900 mb-2"
                            >
                                আপনার ভোট কেন্দ্র খুঁজুন
                            </h2>
                            <p
                                class="text-sm sm:text-base md:text-lg text-gray-600 mb-6"
                            >
                                নাম / এনআইডি / মোবাইল নম্বর দিয়ে খুঁজুন
                            </p>

                            <!-- Single Search Input -->
                            <form
                                @submit.prevent="searchVoterInfo"
                                class="space-y-4"
                            >
                                <div class="relative">
                                    <div
                                        class="absolute left-4 top-1/2 transform -translate-y-1/2"
                                    >
                                        <Icon
                                            name="mdi:magnify"
                                            class="text-gray-400 text-xl"
                                        />
                                    </div>
                                    <input
                                        type="text"
                                        v-model="searchQuery"
                                        placeholder="আপনার নাম, এনআইডি বা মোবাইল নম্বর লিখুন"
                                        class="w-full pl-12 pr-4 py-2 lg:py-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all text-lg"
                                    />
                                </div>

                                <!-- Submit Button -->
                                <button
                                    type="submit"
                                    class="w-full bg-gradient-to-r from-primary to-secondary text-white px-4 py-2 lg:py-4 lg:px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-3 text-lg"
                                >
                                    <Icon
                                        name="mdi:search-web"
                                        class="text-xl"
                                    />
                                    <span>খুঁজুন</span>
                                </button>
                            </form>

                            <!-- Help Text -->
                            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-start gap-3">
                                    <Icon
                                        name="mdi:information"
                                        class="text-primary mt-0.5"
                                    />
                                    <div>
                                        <p class="text-xs lg:text-sm text-gray-600">
                                            <strong>টিপস:</strong> আপনি আপনার
                                            নাম, ১০/১৭ ডিজিটের এনআইডি নম্বর অথবা
                                            মোবাইল নম্বর দিয়ে অনুসন্ধান করতে
                                            পারেন। তথ্য সঠিকভাবে লিখুন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Left - Image -->
                    <div>
                        <div
                            class="relative rounded-xl overflow-hidden shadow-xl border-4 border-white"
                        >
                            <img
                                src="@/assets/images/profile.jpeg"
                                alt="ভোট কেন্দ্র খুঁজুন"
                                class="w-full h-auto object-cover transform transition-transform duration-300 hover:scale-105"
                            />
                            <!-- Image Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"
                            ></div>

                            <!-- Image Badge -->
                            <div
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-lg"
                            >
                                <div class="flex items-center gap-2">
                                    <Icon
                                        name="mdi:vote"
                                        class="text-primary"
                                    />
                                    <span class="text-sm lg:text-lg font-semibold text-gray-900"
                                        >ভোটার হেল্পলাইন</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Container>
        </section>
    </AppLayout>
</template>

<script setup>
import Container from "@/components/Container.vue";
import Icon from "@/components/Icon.vue";
import AppLayout from "@/components/AppLayout.vue";
import { ref } from "vue";

const searchQuery = ref("");

const searchVoterInfo = () => {
    if (!searchQuery.value.trim()) {
        alert("দয়া করে অনুসন্ধানের জন্য কিছু লিখুন");
        return;
    }

    console.log("Searching for:", searchQuery.value);
    // Here you would make an API call to search for voter information
    // For now, just show an alert
    alert(`"${searchQuery.value}" অনুসন্ধান করা হচ্ছে...`);
};
</script>
