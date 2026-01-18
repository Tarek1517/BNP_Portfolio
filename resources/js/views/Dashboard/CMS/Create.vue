<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios";

import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";

const { loading, error, sendRequest } = useAxios();
import { useRouter } from "vue-router";
const router = useRouter();


const heroImg = ref(null);
const form = ref({
    title: null,
    sub_title: null,
    image: null,
    button_link: null,
    short_description: null,
    order_number: null,
    status: 0,
});

const image = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    heroImg.value = URL.createObjectURL(file);
};

// Save Product
const onSubmit = async () => {
    const response = await sendRequest({
        method: "post",
        url: "v1/hero-section",
        data: form.value,
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
    if (response?.data) {
        toast.success("Hero Section Added Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/home-slider");
    }
};
</script>
<template>
    <GuestLayout>
        <div class="p-4 sm:p-6 bg-white shadow-md max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-xl sm:text-2xl font-semibold text-primary text-center">Add Hero Section</h2>
                <p class="text-gray-500 text-sm text-center mt-1">Create a new homepage hero section</p>
            </div>
            
            <!-- Form -->
            <div class="flex flex-wrap -mx-2">
                <!-- Title -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Title</label>
                        <input type="text" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200" 
                               v-model="form.title" 
                               placeholder="Enter hero title" />
                    </div>
                </div>
                
                <!-- Sub Title -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Sub Title</label>
                        <input type="text" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200" 
                               v-model="form.sub_title" 
                               placeholder="Enter sub title" />
                    </div>
                </div>
                
                <!-- Button Link -->
                <div class="w-full mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="number" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Button Link</label>
                        <input type="text" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200" 
                               v-model="form.button_link" 
                               placeholder="https://example.com" />
                    </div>
                </div>
                
                <!-- Order Level -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="number" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Order Level</label>
                        <input type="number" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200" 
                               v-model="form.order_level" 
                               placeholder="0" />
                    </div>
                </div>
                
                <!-- Hero Image Upload -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="number" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Hero Image</label>
                        <label class="border border-primary border-dashed p-4 rounded-2xl flex items-center justify-center w-full h-44 cursor-pointer hover:bg-gray-50 transition-colors">
                            <div class="w-full h-full flex items-center justify-center">
                                <img v-if="heroImg" 
                                     :src="heroImg" 
                                     class="w-full h-full rounded-md object-cover" />
                                <div v-if="!heroImg" 
                                     class="flex flex-col items-center justify-center gap-3">
                                    <Icon name="tabler:cloud-upload" 
                                          class="text-primary text-2xl sm:text-3xl opacity-85" />
                                    <span class="text-primary text-sm font-normal opacity-85 text-center px-2">
                                        Upload Hero Image
                                    </span>
                                    <span class="text-gray-500 text-xs mt-1">
                                        Recommended: 1200x600px
                                    </span>
                                </div>
                            </div>
                            <input id="category-icon" 
                                   @change="image" 
                                   type="file" 
                                   hidden 
                                   accept="image/*" />
                        </label>
                    </div>
                </div>
                
                <!-- Short Description -->
                <div class="w-full mb-4 sm:mb-5 px-2">
                    <label for="short_description" class="text-sm mb-1 sm:mb-2 block font-medium text-gray-700">Short Description</label>
                    <textarea v-model="form.short_description" 
                              class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 min-h-[100px]"
                              placeholder="Enter a brief description for the hero section"></textarea>
                </div>
                
                <!-- Submit Button -->
                <div class="w-full mt-4 sm:mt-5 px-2">
                    <button class="w-full px-4 sm:px-6 py-3.5 bg-primary hover:bg-primary/90 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center gap-2" 
                            @click="onSubmit">
                        <Icon name="mdi:content-save" class="text-lg" />
                        Save Hero Section
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>


