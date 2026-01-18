<script setup>
import Container from "@/components/Container.vue";
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios.js";

const { loading, error, sendRequest } = useAxios();

const allSettings = ref([]);

const fetchSettings = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-all-settings",
        });
        allSettings.value = response?.data || [];
    } catch (error) {
        console.error("Error fetching Packages:", error);
    }
};

onMounted(() => {
    fetchSettings();
});
</script>

<template>
    <footer>
        <section class="h-auto bg-primary/10">
            <Container>
                <div class="flex flex-wrap py-8 justify-between">
                    <div class="w-full lg:w-1/4">
                        <div class="flex flex-col lg:flex-col items-start lg:text-left">
                            <!-- Logo Section -->
                            <div class="w-full h-auto my-3">
                                <!-- Left: Name and Title -->
                                <RouterLink to="/" class="flex flex-col group items-start text-left">
                                    <h1
                                        class="text-2xl lg:text-3xl font-bold text-primary group-hover:text-secondary transition-colors duration-300">
                                        তানভীর আহমেদ
                                    </h1>
                                    <p class="text-black/70 text-sm font-medium mt-1 tracking-wide">
                                        রাজনৈতিক নেতা ও জনসেবক
                                    </p>
                                </RouterLink>
                            </div>

                            <p class="text-sm text-gray-700">
                                জনগণের কল্যাণে কাজ করা আমাদের মূল লক্ষ্য। আমরা
                                বিশ্বাস করি স্বচ্ছতা, জবাবদিহিতা এবং সবার জন্য
                                সমান সুযোগই একটি উন্নত সমাজ গড়ার মূল ভিত্তি।
                                আপনার অংশগ্রহণ ও সহযোগিতা আমাদের এই যাত্রাকে আরও
                                শক্তিশালী করবে।
                            </p>
                        </div>
                    </div>

                    <div class="w-1/2 lg:w-1/4 lg:px-10" v-for="column in allSettings?.footer_columns" :key="column.id">
                        <div class="flex flex-col py-4">
                            <h4 class="text-black text-xl font-bold">
                                {{ column?.title }}
                            </h4>
                            <ul v-for="page in column?.pages || []" :key="page?.slug"
                                class="leading-loose pt-4 text-sm lg:text-base font-normal">
                                <li>
                                    <a v-if="page?.slug && page?.title" :href="`/${page.slug}`"
                                        class="hover:text-primary cursor-pointer">
                                        {{ page.title }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/4">
                        <div class="flex flex-col py-4">
                            <div class="flex flex-row lg:flex-col space-x-4 lg:space-x-0 lg:space-y-6 gap-10 lg:gap-0">
                                <!-- যোগাযোগের ঠিকানা Section -->
                                <div class="flex flex-col items-start">
                                    <h4 class="text-black text-xl font-bold">
                                        যোগাযোগের ঠিকানা
                                    </h4>
                                    <ul class="leading-loose pt-4 text-sm lg:text-base font-normal">
                                        <li class="lg:w-52">
                                            {{ allSettings.address }}
                                        </li>
                                    </ul>
                                </div>

                                <!-- আমাদের সাথে যোগাযোগ Section -->
                                <div class="flex flex-col items-start pr-10 lg:pr-0">
                                    <h4 class="text-black text-xl font-bold">
                                        আমাদের সাথে যোগাযোগ
                                    </h4>
                                    <ul class="leading-loose pt-4 text-sm lg:text-base font-normal">
                                        <li class="flex items-center gap-2">
                                            <Icon name="material-symbols:add-call-sharp" size="20"
                                                class="text-primary text-xl" />
                                            <span>{{
                                                allSettings.phone_number
                                                }}</span>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <Icon name="logos:whatsapp-icon" size="20" class="text-green-600 text-xl" />
                                            <span>{{
                                                allSettings.whatsapp_number
                                                }}</span>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <Icon name="material-symbols-light:mark-email-read-outline" size="20"
                                                class="text-secondary text-xl" />
                                            <span>{{ allSettings.email }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap lg:justify-end py-7 border-t border-gray-300 text-sm">
                    <div class="text-gray-500">
                        <p>
                            ©
                            <span class="hover:text-primary transition-colors duration-200">
                                তানভীর আহমেদ রবিন - বাংলাদেশ জাতীয়তাবাদী দল
                                (বিএনপি)
                            </span>
                            , রাজনৈতিক নেতা ও জনসেবক
                        </p>
                    </div>
                </div>
            </Container>
        </section>
    </footer>
</template>

<style scoped></style>
