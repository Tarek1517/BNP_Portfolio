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

const getQuote = async () => {
    const response = await sendRequest({
        url: `/v1/quote/${route?.params?.id}`,
        method: "get",
    });
    if (response) {
        form.value = response.data?.data;
        form.value.key_features = response.data?.data?.key_features?.length
            ? response.data?.data?.key_features
            : [{ quote: null, year: null, tag: null }];
        heroImg.value = response.data?.data?.image;
         form.value.image = null;
    }
};

const heroImg = ref(null);
const form = ref({
    title: null,
    sub_title: null,
    order_number: null,
    image: null,
    status: 0,
    key_features: [
        {
            quote: null,
            year: null,
            tag: null,
        },
    ],
});

// Save Product
const onSubmit = async (id) => {
    const response = await sendRequest({
        method: "post",
        url: `/v1/quote/${id}`,
        data: form.value,
        params: {
            _method: "PUT",
        },
    });
    if (response?.data) {
        toast.success("Quote Updated Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/quote");
    }
};

const addItem = () => {
    form.value.key_features.push({ quote: null, year: null, tag: null });
};
const removeItem = (index) => {
    if (form.value.key_features.length > 1) {
        form.value.key_features.splice(index, 1);
    }
};


const image = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.value.image = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            heroImg.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

onMounted(() => {
    getQuote();
});
</script>
<template>
    <GuestLayout>
        <div class="p-4 sm:p-6 bg-white shadow-md max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-xl sm:text-2xl font-semibold text-primary text-center">
                    Update Quote
                </h2>
                <p class="text-gray-500 text-sm text-center mt-1">
                    Update a Quote
                </p>
            </div>

            <!-- Form -->
            <div class="flex flex-wrap -mx-2">

                <!-- Title -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Title</label>
                        <input type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.title" placeholder="Enter Quote title" />
                    </div>
                </div>

                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Sub Title</label>
                        <input type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.sub_title" placeholder="Enter Quote sub title" />
                    </div>
                </div>
                <!-- Order Number -->
                <div class="w-full mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="order_number" class="text-sm mb-1 sm:mb-2 font-medium text-gray-700">Order
                            Number</label>
                        <input type="number"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.order_number" placeholder="Enter display order" />
                    </div>
                </div>
                <div class="w-full mb-3 sm:mb-5 px-2">
                    <label for="key-features" class="text-xs mb-1 block">Key Features</label>
                    <div class="flex items-end flex-wrap -mt-4">
                        <div v-for="(item, index) in form.key_features" class="w-4/5 pr-4 mt-4">
                            <div class="flex items-center mb-2">
                                <input type="text" class="border border-gray-300 mr-2 p-2 w-1/2 text-sm rounded-lg"
                                    placeholder="Enter Year" v-model="item.year" />
                                <div class="relative w-1/2">
                                    <input type="text" class="border border-gray-300 p-2 w-full text-sm rounded-lg"
                                        placeholder="Enter Tag" v-model="item.tag" />
                                    <button @click="removeItem(index)"
                                        class="absolute right-1 top-1 bg-slate-100 rounded w-8 h-8 flex items-center justify-center shadow"
                                        v-if="form.key_features.length > 1">
                                        <Icon name="material-symbols:close-rounded" class="text-common text-xl" />
                                    </button>
                                </div>
                            </div>
                            <textarea class="border border-gray-300 p-2 w-full text-sm rounded-lg"
                                placeholder="Enter Quote" v-model="item.quote" rows="3"></textarea>
                        </div>
                        <button class="w-1/5 text-xs bg-primary rounded-lg py-3 px-4 text-nowrap text-white"
                            @click="addItem">
                            Add More
                        </button>
                    </div>
                </div>
                <!-- Hero Image Upload -->
                <div class="w-full mb-4 px-2">
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Hero Image</label>
                        <label
                            class="border-2 border-dashed border-primary/40 hover:border-primary p-4 rounded-xl flex items-center justify-center w-full h-auto cursor-pointer transition-all hover:bg-primary/5">
                            <div class="text-center">
                                <img v-if="heroImg" :src="heroImg" class="w-full h-full rounded-lg object-cover" />
                                <div v-if="!heroImg" class="flex flex-col items-center">
                                    <Icon name="tabler:cloud-upload" class="text-primary text-2xl sm:text-3xl mb-2" />
                                    <span class="text-primary text-sm font-medium">
                                        Upload Hero Image
                                    </span>
                                    <span class="text-gray-400 text-xs mt-1">
                                        Recommended: 1200×600px
                                    </span>
                                </div>
                            </div>
                            <input id="category-icon" @change="image" type="file" hidden accept="image/*" />
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="w-full mt-4 sm:mt-5 px-2">
                    <button
                        class="w-full px-4 sm:px-6 py-3.5 bg-primary hover:bg-primary/90 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center gap-2"
                        @click="onSubmit(route?.params?.id)" :disabled="loading">
                        <Icon name="mdi:content-save" class="text-lg" />
                        {{ loading ? "Saving..." : "update Quote" }}
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
