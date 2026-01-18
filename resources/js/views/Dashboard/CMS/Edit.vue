<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios";
import { useRouter, useRoute } from "vue-router";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import SummernoteEditor from "vue3-summernote-editor";

const { loading, error, sendRequest } = useAxios();
// const authStore = useAuthStore();
const router = useRouter();
const route = useRoute();

const getHeroSections = async () => {
    const response = await sendRequest({
        url: `/v1/hero-section/${route?.params?.id}`,
        method: "get",
    });
    if (response) {
        form.value = response.data?.data;
        heroImg.value = response.data?.data?.image;
        form.value.image = null;
    }
};

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
const onSubmit = async (id) => {
    const response = await sendRequest({
        method: "post",
        url: `/v1/hero-section/${id}`,
        data: form.value,
        params: {
            _method: "PUT",
        },
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
    if (response?.data) {
        toast.success("Section Updated Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/home-slider");
    }
};

onMounted(() => {
    getHeroSections();
});
</script>
<template>
    <GuestLayout>
        <div class="p-4 sm:p-6 bg-white shadow-md rounded-xl max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-6 text-center">
                <h2 class="text-xl sm:text-2xl font-semibold text-primary">Update Hero Section</h2>
                <p class="text-gray-500 text-sm mt-1">Edit your homepage hero content</p>
            </div>
            
            <!-- Form -->
            <div class="flex flex-wrap -mx-2">
                <!-- Title -->
                <div class="w-full sm:w-1/2 mb-4 px-2">
                    <div class="flex flex-col">
                        <label for="title" class="text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" 
                               v-model="form.title" 
                               placeholder="Enter hero title" />
                    </div>
                </div>
                
                <!-- Sub Title -->
                <div class="w-full sm:w-1/2 mb-4 px-2">
                    <div class="flex flex-col">
                        <label for="title" class="text-sm font-medium text-gray-700 mb-1">Sub Title</label>
                        <input type="text" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" 
                               v-model="form.sub_title" 
                               placeholder="Enter sub title" />
                    </div>
                </div>
                
                <!-- Button Link -->
                <div class="w-full mb-4 px-2">
                    <div class="flex flex-col">
                        <label for="button_link" class="text-sm font-medium text-gray-700 mb-1">Button Link</label>
                        <input type="text" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" 
                               v-model="form.button_link" 
                               placeholder="https://example.com" />
                    </div>
                </div>
                
                <!-- Order Level -->
                <div class="w-full sm:w-1/2 mb-4 px-2">
                    <div class="flex flex-col">
                        <label for="order_level" class="text-sm font-medium text-gray-700 mb-1">Order Level</label>
                        <input type="number" 
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" 
                               v-model="form.order_level" 
                               placeholder="0" />
                    </div>
                </div>
                
                <!-- Hero Image Upload -->
                <div class="w-full sm:w-1/2 mb-4 px-2">
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Hero Image</label>
                        <label class="border-2 border-dashed border-primary/40 hover:border-primary p-4 rounded-xl flex items-center justify-center w-full h-44 cursor-pointer transition-all hover:bg-primary/5">
                            <div class="text-center">
                                <img v-if="heroImg" 
                                     :src="heroImg" 
                                     class="w-full h-full rounded-lg object-cover" />
                                <div v-if="!heroImg" class="flex flex-col items-center">
                                    <Icon name="tabler:cloud-upload" 
                                          class="text-primary text-2xl sm:text-3xl mb-2" />
                                    <span class="text-primary text-sm font-medium">
                                        Upload Hero Image
                                    </span>
                                    <span class="text-gray-400 text-xs mt-1">
                                        Recommended: 1200×600px
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
                <div class="w-full mb-4 px-2">
                    <label for="short_description" class="text-sm font-medium text-gray-700 mb-1 block">Short Description</label>
                    <textarea v-model="form.short_description" 
                              class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all min-h-[100px]"
                              placeholder="Enter a brief description for the hero section"></textarea>
                </div>
                
                <!-- Submit Button -->
                <div class="w-full mt-6 px-2">
                    <button class="w-full sm:w-auto px-6 py-3.5 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg shadow hover:shadow-lg transition-all flex items-center justify-center gap-2" 
                            @click="onSubmit(route?.params?.id)">
                        <Icon name="mdi:content-save" class="text-lg" />
                        Update Hero Section
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
