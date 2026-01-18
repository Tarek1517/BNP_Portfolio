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
                        জনগণের অভিযোগ
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug"
                    >
                        অভিযোগ দাখিল করুন
                    </h1>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0"
                    >
                        আপনার সমস্যা ও অভিযোগ আমাদের জানান। আমরা সমাধানে
                        প্রতিশ্রুতিবদ্ধ
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
                            <span
                                class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                            >
                                <Icon
                                    name="streamline:interface-download-laptop-arrow-computer-down-download-internet-laptop-network-server-upload"
                                    class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4"
                                />
                                জনগণের অভিযোগ
                            </span>
                            <h2
                                class="text-xl lg:text-3xl font-bold text-gray-900 mb-2"
                            >
                                আপনার সেবায় সর্বদা প্রস্তুত
                            </h2>
                            <p
                                class="text-xs sm:text-base md:text-lg text-gray-600 mb-6"
                            >
                                আপনার সেবায় সর্বদা প্রস্তুত হবে। আপনার সমস্যা ও
                                অভিযোগ আমাদের জানান। আমরা সমাধানে
                                প্রতিশ্রুতিবদ্ধ
                            </p>

                            <!-- Additional text section -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <h3
                                    class="text-base lg:text-xl font-bold text-gray-800 mb-4"
                                >
                                    কিভাবে অভিযোগ জানাবেন?
                                </h3>
                                <ul class="space-y-3 text-gray-700 mb-6">
                                    <li class="flex items-start">
                                        <svg
                                            class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="text-xs lg:text-base"
                                            >অনলাইনে ফর্ম পূরণ করুন - ২৪/৭ সেবা
                                            উপলব্ধ</span
                                        >
                                    </li>
                                    <li class="flex items-start">
                                        <svg
                                            class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="text-xs lg:text-base"
                                            >হটলাইন নম্বরে কল করুন - সকাল ৯টা
                                            থেকে রাত ১০টা</span
                                        >
                                    </li>
                                    <li class="flex items-start">
                                        <svg
                                            class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="text-xs lg:text-base"
                                            >সরাসরি অফিসে আসুন - নিকটস্থ সেবা
                                            কেন্দ্রে</span
                                        >
                                    </li>
                                </ul>

                                <div
                                    class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg mb-6"
                                >
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg
                                                class="h-5 w-5 text-blue-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p
                                                class="text-xs lg:text-sm text-blue-700"
                                            >
                                                <span class="font-semibold"
                                                    >দ্রষ্টব্য:</span
                                                >
                                                অভিযোগ জমা দেওয়ার সময় আপনার
                                                জাতীয় পরিচয়পত্র নম্বর এবং
                                                প্রাসঙ্গিক কাগজপত্র প্রস্তুত
                                                রাখুন। অভিযোগ নিষ্পত্তির জন্য
                                                সর্বোচ্চ ৭ কার্যদিবস সময় লাগতে
                                                পারে।
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <p
                                    class="text-gray-600 text-xs lg:text-sm italic"
                                >
                                    "আমরা বিশ্বাস করি স্বচ্ছতা ও জবাবদিহিতার
                                    মাধ্যমে উন্নত সেবা নিশ্চিত করা সম্ভব। আপনার
                                    প্রতিটি অভিযোগ আমরা গুরুত্বের সাথে বিবেচনা
                                    করি এবং দ্রুত সমাধানের চেষ্টা করি।"
                                </p>
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
                                    <span
                                        class="text-sm lg:text-lg font-semibold text-gray-900"
                                        >ভোটার হেল্পলাইন</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Container>
        </section>

        <!-- Complaint Form Section -->
        <section class="w-full max-w-6xl mx-auto py-12 lg:py-16">
            <Container>
                <!-- Two Column Form -->
                <div
                    class="bg-white rounded-2xl shadow-xl p-6 lg:p-8 border border-gray-100"
                >
                    <h2
                        class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6 text-center"
                    >
                        অভিযোগ ফর্ম
                    </h2>

                    <form @submit.prevent="submitComplaint" class="space-y-6">
                        <!-- Two Column Grid for Form -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Personal Information -->
                                <div class="space-y-4">
                                    <h3
                                        class="text-base lg:text-lg font-semibold text-gray-800 border-b pb-2"
                                    >
                                        ব্যক্তিগত তথ্য
                                    </h3>

                                    <!-- Name -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            আপনার পুরো নাম *
                                        </label>
                                        <input
                                            type="text"
                                            v-model="complaint.name"
                                            required
                                            placeholder="পুরো নাম লিখুন"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        />
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            মোবাইল নম্বর *
                                        </label>
                                        <input
                                            type="tel"
                                            v-model="complaint.phone"
                                            required
                                            placeholder="০১XXXXXXXXX"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        />
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            ইমেইল ঠিকানা
                                        </label>
                                        <input
                                            type="email"
                                            v-model="complaint.email"
                                            placeholder="your@email.com"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        />
                                    </div>
                                </div>

                                <!-- Complaint Type and Location -->
                                <div class="space-y-4">
                                    <h3
                                        class="text-base lg:text-lg font-semibold text-gray-800 border-b pb-2"
                                    >
                                        ঘটনার তথ্য
                                    </h3>

                                    <!-- Complaint Type -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            অভিযোগের ধরন *
                                        </label>
                                        <select
                                            v-model="complaint.type"
                                            required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        >
                                            <option value="" disabled selected>
                                                অভিযোগের ধরন নির্বাচন করুন
                                            </option>
                                            <option value="administration">
                                                প্রশাসনিক
                                            </option>
                                            <option value="corruption">
                                                দুর্নীতি
                                            </option>
                                            <option value="service">
                                                সেবা সংক্রান্ত
                                            </option>
                                            <option value="security">
                                                নিরাপত্তা
                                            </option>
                                            <option value="other">
                                                অন্যান্য
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Location -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            ঘটনার স্থান *
                                        </label>
                                        <input
                                            type="text"
                                            v-model="complaint.location"
                                            required
                                            placeholder="জেলা, উপজেলা, এলাকা"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <!-- Complaint Details -->
                                <div class="space-y-4">
                                    <h3
                                        class="text-base lg:text-lg font-semibold text-gray-800 border-b pb-2"
                                    >
                                        অভিযোগের বিবরণ
                                    </h3>

                                    <!-- Subject -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            বিষয় *
                                        </label>
                                        <input
                                            type="text"
                                            v-model="complaint.subject"
                                            required
                                            placeholder="সংক্ষিপ্ত বিষয় লিখুন"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        />
                                    </div>

                                    <!-- Description -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            বিস্তারিত বিবরণ *
                                        </label>
                                        <textarea
                                            v-model="complaint.description"
                                            required
                                            rows="5"
                                            placeholder="আপনার অভিযোগের বিস্তারিত বিবরণ লিখুন..."
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none"
                                        ></textarea>
                                    </div>

                                    <!-- File Upload -->
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-medium text-gray-700 mb-2"
                                        >
                                            প্রমাণ সংযুক্ত করুন (যদি থাকে)
                                        </label>
                                        <div
                                            class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-primary transition-colors"
                                        >
                                            <input
                                                type="file"
                                                ref="fileInput"
                                                @change="handleFileUpload"
                                                class="hidden"
                                                multiple
                                                accept="image/*,.pdf,.doc,.docx"
                                            />
                                            <button
                                                type="button"
                                                @click="$refs.fileInput.click()"
                                                class="text-primary hover:text-secondary font-medium"
                                            >
                                                <Icon
                                                    name="mdi:paperclip"
                                                    class="inline mr-2"
                                                />
                                                ফাইল আপলোড করুন
                                            </button>
                                            <p
                                                class="text-sm text-gray-500 mt-2"
                                            >
                                                ছবি, পিডিএফ বা ডকুমেন্ট
                                                (সর্বোচ্চ ৫MB)
                                            </p>
                                        </div>
                                        <div
                                            v-if="complaint.files.length > 0"
                                            class="mt-2"
                                        >
                                            <p class="text-sm text-gray-600">
                                                নির্বাচিত ফাইল:
                                                {{
                                                    complaint.files
                                                        .map((f) => f.name)
                                                        .join(", ")
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Privacy Consent -->
                                <div
                                    class="flex items-start space-x-3 p-4 bg-gray-50 rounded-lg"
                                >
                                    <input
                                        type="checkbox"
                                        v-model="complaint.consent"
                                        required
                                        class="mt-1 rounded text-primary focus:ring-primary"
                                    />
                                    <label
                                        class="text-xs lg:text-sm text-gray-600"
                                    >
                                        আমি স্বীকার করছি যে প্রদত্ত তথ্য সঠিক
                                        এবং অভিযোগ প্রক্রিয়াকরণের জন্য
                                        প্রয়োজনীয় তথ্য ব্যবহারের অনুমতি প্রদান
                                        করছি।
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4 border-t border-gray-200">
                            <button
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full lg:w-auto px-4 py-2 lg:px-8 lg:py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed mx-auto block"
                            >
                                <span v-if="isSubmitting">
                                    <Icon
                                        name="mdi:loading"
                                        class="animate-spin inline mr-2"
                                    />
                                    প্রেরণ করা হচ্ছে...
                                </span>
                                <span v-else>
                                    <Icon name="mdi:send" class="inline mr-2" />
                                    অভিযোগ দাখিল করুন
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </Container>
        </section>

        <!-- Information Section Below Form -->
        <section class="w-full max-w-6xl mx-auto pb-12 lg:pb-16">
            <Container>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Contact Info Card -->
                    <div
                        class="bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl p-6 border border-primary/20"
                    >
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                class="w-8 h-8 lg:w-12 lg:h-12 bg-primary/20 rounded-xl flex items-center justify-center"
                            >
                                <Icon
                                    name="mdi:phone"
                                    class="text-primary text-lg lg:text-xl"
                                />
                            </div>
                            <h3
                                class="text-lg lg:text-xl font-bold text-gray-900"
                            >
                                যোগাযোগ তথ্য
                            </h3>
                        </div>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <p class="text-sm text-gray-600">
                                    হটলাইন নম্বর
                                </p>
                                <p
                                    class="font-semibold text-gray-900 text-base lg:text-lg"
                                >
                                    ০৯৬৩৮-১০০১০০
                                </p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm text-gray-600">ইমেইল</p>
                                <p
                                    class="font-semibold text-gray-900 text-base lg:text-lg"
                                >
                                    complaint@bnp.org
                                </p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm text-gray-600">সময়</p>
                                <p
                                    class="font-semibold text-gray-900 text-base lg:text-lg"
                                >
                                    সকাল ৯টা - রাত ৯টা
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Guidelines Card -->
                    <div
                        class="bg-white rounded-2xl shadow-md p-6 border border-gray-100"
                    >
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                class="w-8 h-8 lg:w-12 lg:h-12 bg-secondary/20 rounded-xl flex items-center justify-center"
                            >
                                <Icon
                                    name="mdi:clipboard-check"
                                    class="text-secondary text-xl"
                                />
                            </div>
                            <h3
                                class="text-lg lg:text-xl font-bold text-gray-900"
                            >
                                নির্দেশিকা
                            </h3>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2">
                                <Icon
                                    name="mdi:check-circle"
                                    class="text-green-500 mt-0.5"
                                />
                                <span class="text-gray-600"
                                    >সমস্ত তথ্য সঠিক ও সম্পূর্ণ ভাবে প্রদান
                                    করুন</span
                                >
                            </li>
                            <li class="flex items-start gap-2">
                                <Icon
                                    name="mdi:check-circle"
                                    class="text-green-500 mt-0.5"
                                />
                                <span class="text-gray-600"
                                    >প্রয়োজনীয় প্রমাণ সংযুক্ত করুন</span
                                >
                            </li>
                            <li class="flex items-start gap-2">
                                <Icon
                                    name="mdi:check-circle"
                                    class="text-green-500 mt-0.5"
                                />
                                <span class="text-gray-600"
                                    >ভুল বা মিথ্যা তথ্য দেবেন না</span
                                >
                            </li>
                            <li class="flex items-start gap-2">
                                <Icon
                                    name="mdi:check-circle"
                                    class="text-green-500 mt-0.5"
                                />
                                <span class="text-gray-600"
                                    >অভিযোগ নম্বর সংরক্ষণ করুন</span
                                >
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
import Icon from "@/components/Icon.vue";
import AppLayout from "@/components/AppLayout.vue";
import { ref } from "vue";
import useAxios from "@/composables/useAxios.js";
import { toast } from "vue3-toastify";

const { loading, error, sendRequest } = useAxios();

const searchQuery = ref("");
const isSubmitting = ref(false);
const trackingNumber = ref("");

const complaint = ref({
    name: "",
    phone: "",
    email: "",
    type: "",
    location: "",
    subject: "",
    description: "",
    files: [],
    consent: false,
});

const handleFileUpload = (event) => {
    const files = Array.from(event.target.files);
    if (files.length > 0) {
        complaint.value.files = [files[0]];
    }
};

const submitComplaint = async () => {
    if (!complaint.value.consent) {
        toast.error("দয়া করে শর্তাবলী স্বীকার করুন");
        return;
    }

    isSubmitting.value = true;

    try {
        const formData = new FormData();
        formData.append("name", complaint.value.name);
        formData.append("phone", complaint.value.phone);
        formData.append("email", complaint.value.email || "");
        formData.append("type", complaint.value.type);
        formData.append("location", complaint.value.location);
        formData.append("subject", complaint.value.subject);
        formData.append("description", complaint.value.description);

        if (complaint.value.files.length > 0) {
            formData.append("file", complaint.value.files[0]);
        }

        const response = await sendRequest({
            method: "post",
            url: "/frontend/v1/store-complaint",
            data: formData,
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });

        if (response) {
            const tracking = response.data.tracking_number;
            toast.success(
                `আপনার অভিযোগ সফলভাবে জমা হয়েছে! ট্র্যাকিং নম্বর: ${tracking}`,
                {
                    autoClose: 5000,
                }
            );

            // Reset form
            complaint.value = {
                name: "",
                phone: "",
                email: "",
                type: "",
                location: "",
                subject: "",
                description: "",
                files: [],
                consent: false,
            };
        }
    } catch (err) {
        console.error("Error submitting complaint:", err);
        // Error handling is managed by useAxios usually (toast), but we can add fallback here
    } finally {
        isSubmitting.value = false;
    }
};

const checkStatus = () => {
    if (!trackingNumber.value.trim()) {
        toast.warning("দয়া করে আপনার অভিযোগ নম্বর লিখুন");
        return;
    }

    toast.info(
        `"${trackingNumber.value}" নম্বরের অভিযোগের অবস্থা পরীক্ষা করা হচ্ছে... feature coming soon.`
    );
};
</script>
