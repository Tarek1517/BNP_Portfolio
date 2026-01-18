<template>
    <AppLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-primary/30 via-white to-secondary/30 py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 2xl:py-24 overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden -z-10">
                <div
                    class="absolute top-10 sm:top-20 left-4 sm:left-10 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-primary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl">
                </div>
                <div
                    class="absolute bottom-10 sm:bottom-20 right-4 sm:right-10 w-28 h-28 sm:w-36 sm:h-36 md:w-48 md:h-48 lg:w-60 lg:h-60 bg-secondary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl">
                </div>
            </div>

            <Container>
                <div class="text-center">
                    <span
                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
                        <Icon name="mdi:message-text" class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4" />
                        আপনার মতামত গুরুত্বপূর্ণ
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug">
                        আমাদের সাথে যোগাযোগ করুন
                    </h1>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0">
                        আপনার মতামত, পরামর্শ ও প্রয়োজনীয় তথ্য আমাদের কাছে
                        পৌঁছান। আমরা দ্রুত আপনার সাথে যোগাযোগ করব।
                    </p>
                </div>
            </Container>
        </section>

        <!-- Contact Content -->
        <section class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 bg-white">
            <Container>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 md:gap-12 lg:gap-14 xl:gap-16">
                    <!-- Contact Information -->
                    <div class="space-y-6 sm:space-y-7 md:space-y-8">
                        <div>
                            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-4 sm:mb-5 md:mb-6">
                                যোগাযোগের তথ্য
                            </h2>
                            <p class="text-sm sm:text-base text-gray-600">
                                আপনার যেকোনো প্রশ্ন, পরামর্শ বা সমস্যার জন্য
                                আমরা সর্বদা প্রস্তুত। নিচের মাধ্যমগুলোতে আমাদের
                                সাথে সরাসরি যোগাযোগ করতে পারেন।
                            </p>
                        </div>

                        <!-- Contact Cards -->
                        <div class="space-y-4 sm:space-y-5 md:space-y-6">
                            <!-- Address Card -->
                            <div
                                class="group bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div
                                        class="w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 bg-primary/10 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                                        <Icon name="mdi:map-marker"
                                            class="text-primary text-lg sm:text-xl md:text-2xl" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1.5 sm:mb-2">
                                            কার্যালয়ের ঠিকানা
                                        </h3>
                                        <p class="text-sm sm:text-base text-gray-600">
                                            {{ data?.address }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone Card -->
                            <div
                                class="group bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-secondary/20">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div
                                        class="w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 bg-secondary/10 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                                        <Icon name="mdi:phone" class="text-secondary text-lg sm:text-xl md:text-2xl" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1.5 sm:mb-2">
                                            ফোন নম্বর
                                        </h3>
                                        <div class="space-y-1.5 sm:space-y-2">
                                            <p
                                                class="text-sm sm:text-base text-gray-600 flex items-center gap-1.5 sm:gap-2">
                                                <Icon name="mdi:phone-outline"
                                                    class="text-gray-400 w-4 h-4 sm:w-5 sm:h-5" />
                                                <span class="font-medium">সাধারণ যোগাযোগ:</span>
                                                {{ data?.phone_number }}
                                            </p>
                                            <p
                                                class="text-sm sm:text-base text-gray-600 flex items-center gap-1.5 sm:gap-2">
                                                <Icon name="logos:whatsapp-icon"
                                                    class="text-green-500 w-4 h-4 sm:w-5 sm:h-5" />
                                                <span class="font-medium">হোয়াটসঅ্যাপ:</span>
                                                {{ data?.whatsapp_number }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Email & Social Card -->
                            <div
                                class="group bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div
                                        class="w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                                        <Icon name="mdi:email" class="text-primary text-lg sm:text-xl md:text-2xl" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1.5 sm:mb-2">
                                            ইমেল ও সামাজিক মাধ্যম
                                        </h3>
                                        <div class="space-y-2 sm:space-y-3">
                                            <p
                                                class="text-sm sm:text-base text-gray-600 flex items-center gap-1.5 sm:gap-2">
                                                <Icon name="mdi:email-outline"
                                                    class="text-gray-400 w-4 h-4 sm:w-5 sm:h-5" />
                                                <span class="font-medium">ইমেইল:</span>
                                                {{ data?.email }}
                                            </p>

                                            <div class="pt-2 sm:pt-3">
                                                <p class="text-xs sm:text-sm text-gray-500 mb-1.5 sm:mb-2">
                                                    সামাজিক মাধ্যম:
                                                </p>
                                                <div class="flex gap-2 sm:gap-3">
                                                    <a :href="data?.facebook_link"
                                                        class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center hover:bg-blue-200 transition-colors flex-shrink-0">
                                                        <Icon name="mingcute:facebook-fill"
                                                            class="w-4 h-4 sm:w-5 sm:h-5" />
                                                    </a>
                                                    <a :href="data?.twitter_link"
                                                        class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center hover:bg-blue-100 transition-colors flex-shrink-0">
                                                        <Icon name="hugeicons:new-twitter-ellipse"
                                                            class="w-4 h-4 sm:w-5 sm:h-5" />
                                                    </a>
                                                    <a :href="data?.instagram_link"
                                                        class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center hover:bg-pink-200 transition-colors flex-shrink-0">
                                                        <Icon name="line-md:instagram" class="w-4 h-4 sm:w-5 sm:h-5" />
                                                    </a>
                                                    <a :href="data?.youtube_link"
                                                        class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-red-100 text-red-600 rounded-full flex items-center justify-center hover:bg-red-200 transition-colors flex-shrink-0">
                                                        <Icon name="mynaui:brand-youtube"
                                                            class="w-4 h-4 sm:w-5 sm:h-5" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Office Hours -->
                            <div
                                class="group bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg hover:shadow-xl lg:hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-secondary/20">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div
                                        class="w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 bg-gradient-to-br from-secondary/10 to-primary/10 rounded-lg sm:rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                                        <Icon name="mdi:clock-time-four"
                                            class="text-secondary text-lg sm:text-xl md:text-2xl" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1.5 sm:mb-2">
                                            কার্যালয় সময়
                                        </h3>
                                        <div class="space-y-1.5 sm:space-y-2">
                                            {{ data?.meeting_time }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div
                        class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-5 md:p-6 lg:p-8 xl:p-10 border border-gray-100">
                        <div class="mb-6 sm:mb-7 md:mb-8">
                            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">
                                বার্তা পাঠান
                            </h2>
                            <p class="text-sm sm:text-base text-gray-600">
                                আপনার বার্তা, পরামর্শ বা অভিযোগ নিচের ফর্মে লিখে
                                আমাদের কাছে পাঠান।
                            </p>
                        </div>

                        <form @submit.prevent="submitForm" class="space-y-4 sm:space-y-5 md:space-y-6">
                            <!-- Name Field -->
                            <div>
                                <label for="name"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                    আপনার নাম
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" v-model="form.name" required
                                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors text-sm sm:text-base"
                                    placeholder="আপনার পুরো নাম লিখুন" />
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                    ইমেইল ঠিকানা
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" v-model="form.email" required
                                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors text-sm sm:text-base"
                                    placeholder="example@email.com" />
                            </div>

                            <!-- Phone Field -->
                            <div>
                                <label for="phone"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                    ফোন নম্বর
                                </label>
                                <input type="tel" id="phone" v-model="form.phone"
                                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors text-sm sm:text-base"
                                    placeholder="+৮৮০ ১XXXXXXXXX" />
                            </div>

                            <!-- Subject Field -->
                            <div>
                                <label for="subject"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                    বিষয় <span class="text-red-500">*</span>
                                </label>
                                <select id="subject" v-model="form.subject" required
                                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors text-sm sm:text-base">
                                    <option value="" disabled selected>
                                        বিষয় নির্বাচন করুন
                                    </option>
                                    <option value="support">
                                        সমর্থন ও সহযোগিতা
                                    </option>
                                    <option value="suggestion">পরামর্শ</option>
                                    <option value="complaint">অভিযোগ</option>
                                    <option value="meeting">
                                        সাক্ষাতের আবেদন
                                    </option>
                                    <option value="volunteer">
                                        স্বেচ্ছাসেবী হওয়ার ইচ্ছা
                                    </option>
                                    <option value="other">অন্যান্য</option>
                                </select>
                            </div>

                            <!-- Message Field -->
                            <div>
                                <label for="message"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                    আপনার বার্তা
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea id="message" v-model="form.message" required rows="4 sm:5 md:6"
                                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors resize-none text-sm sm:text-base"
                                    placeholder="আপনার বিস্তারিত বার্তা এখানে লিখুন..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" :disabled="loading"
                                    class="w-full bg-gradient-to-r from-primary to-secondary text-white font-semibold py-3 sm:py-4 px-4 sm:px-8 rounded-lg hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 disabled:opacity-70 disabled:cursor-not-allowed text-sm sm:text-base">
                                    <span v-if="!loading">বার্তা পাঠান</span>
                                    <span v-else class="flex items-center justify-center gap-1.5 sm:gap-2">
                                        <Icon name="mdi:loading" class="animate-spin w-4 h-4 sm:w-5 sm:h-5" />
                                        পাঠানো হচ্ছে...
                                    </span>
                                </button>
                            </div>
                        </form>

                        <!-- Privacy Note -->
                        <div class="mt-6 sm:mt-7 md:mt-8 pt-6 sm:pt-7 md:pt-8 border-t border-gray-200">
                            <p class="text-xs sm:text-sm text-gray-500 text-center">
                                আপনার তথ্য গোপনীয়তা নীতির আওতায় সুরক্ষিত
                                থাকবে।
                                <a href="/privacy" class="text-primary hover:underline">গোপনীয়তা নীতি পড়ুন</a>
                            </p>
                        </div>
                    </div>
                </div>
            </Container>
        </section>

        <!-- Map Section -->
        <section class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 bg-gray-50">
            <Container>
                <div class="text-center mb-8 sm:mb-9 md:mb-10">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">
                        আমাদের অবস্থান
                    </h2>
                    <p
                        class="text-sm sm:text-base text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl mx-auto px-4 sm:px-0">
                        সরাসরি আমাদের কার্যালয়ে আসতে চাইলে নিচের মানচিত্রে
                        অবস্থান দেখুন
                    </p>
                </div>

                <div
                    class="bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl overflow-hidden border border-gray-200">
                    <!-- Google Maps Embed -->
                    <div class="h-64 sm:h-72 md:h-80 lg:h-96 w-full">
                        <iframe v-if="data?.google_map_link" :src="data?.google_map_link" width="100%" height="100%"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                        </iframe>
                        <div v-else
                            class="h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <div class="text-center px-4">
                                <Icon name="mdi:map-marker"
                                    class="text-4xl sm:text-5xl md:text-6xl text-primary mb-3 sm:mb-4 mx-auto" />
                                <p class="text-gray-700 font-medium text-sm sm:text-base">
                                    মানচিত্র লোড হচ্ছে...
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Map Instructions -->
                    <div class="p-4 sm:p-5 md:p-6 bg-white border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4">
                            <div class="text-sm sm:text-base text-gray-600 text-center sm:text-left">
                                <p class="font-medium">কার্যালয়ের ঠিকানা:</p>
                                <p class="text-xs sm:text-sm md:text-base">
                                    {{ data?.address }}
                                </p>
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
import { inject, ref } from "vue";
const data = inject("data");
import useAxios from "@/composables/useAxios.js";

const { loading, error, sendRequest } = useAxios();
import { toast } from "vue3-toastify";

const form = ref({
    name: "",
    email: "",
    phone: "",
    subject: "",
    message: "",
});

const submitForm = async () => {
    try {
        // Validate form
        if (
            !form.value.name ||
            !form.value.email ||
            !form.value.subject ||
            !form.value.message
        ) {
            toast.error("সকল প্রয়োজনীয় তথ্য প্রদান করুন");
            return;
        }

        // Send form data
        const response = await sendRequest({
            method: "post",
            url: "/frontend/v1/store-mail",
            data: form.value,
        });

        if (response) {
            toast.success(
                "আপনার বার্তা সফলভাবে পাঠানো হয়েছে! আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।"
            );

            // Reset form
            form.value = {
                name: "",
                email: "",
                phone: "",
                subject: "",
                message: "",
            };
        }
    } catch (err) {
        console.error("Error submitting form:", err);
        toast.error(
            "বার্তা পাঠানোতে সমস্যা হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।"
        );
    }
};
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

.animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

/* Custom scrollbar for textarea */
textarea::-webkit-scrollbar {
    width: 6px;
}

textarea::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

textarea::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

textarea::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
