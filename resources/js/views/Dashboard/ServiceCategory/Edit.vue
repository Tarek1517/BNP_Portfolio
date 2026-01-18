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

const getCategory = async () => {
    const response = await sendRequest({
        url: `/v1/service-category/${route?.params?.id}`,
        method: "get",
    });
    if (response) {
        form.value = response.data?.data;
        categoryImg.value = response.data?.data?.image;
        form.value.image = null;
    }
};

const form = ref({
    name: null,
    title: null,
    icon: null,
    image: null,
    short_description: null,
    description: null,
    order_level: null,
    status: 1,
});

const categoryImg = ref(null);
const image = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    categoryImg.value = URL.createObjectURL(file);
};

// Save Product
const onSubmit = async (id) => {
    const response = await sendRequest({
        method: "post",
        url: `/v1/service-category/${id}`,
        data: form.value,
        params: {
            _method: "PUT",
        },
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
    if (response?.data) {
        toast.success("Category Updated Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/service-category");
    }
};

onMounted(() => {
    getCategory();
});
</script>
<template>
    <GuestLayout>
        <div class="p-4 sm:p-6 bg-white shadow-md max-w-3xl mx-auto">
            <div class="flex flex-wrap -mx-2">
                <!-- Category Name -->
                <div class="w-full sm:w-1/2 mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm mb-2">Category Name</label>
                        <input type="text" class="input w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200" 
                               v-model="form.name" />
                    </div>
                </div>
                
                <!-- Category Title -->
                <div class="w-full sm:w-1/2 mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-sm mb-2">Category Title</label>
                        <input type="text" class="input w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200" 
                               v-model="form.title" />
                    </div>
                </div>
                
                <!-- Order Level -->
                <div class="w-full sm:w-1/2 mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="number" class="text-sm mb-2">Order Level</label>
                        <input
                            type="number"
                            class="input w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.order_level"
                        />
                    </div>
                </div>
                
                <!-- Category Icon -->
                <div class="w-full sm:w-1/2 mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="number" class="text-sm mb-2">Category Icon</label>
                        <textarea
                            v-model="form.icon"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 min-h-[80px] sm:min-h-[80px]"
                        ></textarea>
                    </div>
                </div>
                
                <!-- Category Image -->
                <div class="w-full sm:w-1/2 mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label for="number" class="text-sm mb-2">Category Image</label>
                        <label
                            class="border border-primary border-dashed p-3 sm:p-4 rounded-2xl flex items-center justify-center w-full h-44 cursor-pointer hover:bg-gray-50 transition-colors"
                        >
                            <div class="w-full h-full">
                                <img
                                    v-if="categoryImg"
                                    :src="categoryImg"
                                    class="w-full h-full rounded-md object-cover"
                                />
                                <div
                                    v-if="!categoryImg"
                                    class="flex flex-col items-center justify-center gap-2 h-full"
                                >
                                    <Icon
                                        name="tabler:cloud-upload"
                                        class="text-primary text-2xl sm:text-3xl opacity-85"
                                    />
                                    <span
                                        class="text-primary text-sm font-normal opacity-85 text-center px-2"
                                        >Upload Category Image</span
                                    >
                                </div>
                            </div>
                            <input
                                id="category-icon"
                                @change="image"
                                type="file"
                                hidden
                            />
                        </label>
                    </div>
                </div>
                
                <!-- Placeholder for layout balance on desktop -->
                <div class="hidden sm:block sm:w-1/2 mb-5 px-2"></div>
                
                <!-- Short Description -->
                <div class="w-full mb-5 px-2">
                    <label for="short_description" class="text-sm mb-2 block">Short Description</label>
                    <textarea
                        v-model="form.short_description"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 min-h-[100px]"
                    ></textarea>
                </div>
                
                <!-- Description (Summernote Editor) -->
                <div class="w-full px-2 mb-5">
                    <label for="description" class="text-sm mb-2 block">Description</label>
                    <div class="editor_data border border-gray-300 rounded-lg overflow-hidden">
                        <SummernoteEditor v-model="form.description" />
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="w-full mt-5 px-2">
                    <button
                        class="w-full sm:w-auto px-6 py-3.5 bg-primary hover:bg-primary/90 text-sm font-medium text-white rounded-lg transition-colors duration-200"
                        @click="onSubmit(route?.params?.id)"
                    >
                        Update Category
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Responsive adjustments */
@media (max-width: 640px) {
    .flex-wrap {
        margin-left: -0.5rem;
        margin-right: -0.5rem;
    }
    
    .px-2 {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
    
    .input, textarea {
        font-size: 16px; /* Prevents zoom on iOS */
    }
}

/* Tablet adjustments */
@media (min-width: 641px) and (max-width: 768px) {
    .input, textarea {
        padding: 0.75rem 1rem;
    }
}

/* Ensure proper touch targets on mobile */
button, label[for^="category"], .input, textarea {
    min-height: 44px;
}

/* Make sure file input label is touch-friendly */
label[for^="category"] {
    cursor: pointer;
    user-select: none;
}

/* Improve focus states for accessibility */
.input:focus, textarea:focus {
    box-shadow: 0 0 0 3px rgba(var(--primary-rgb, 59, 130, 246), 0.1);
}

/* Summernote editor responsive fix */
.editor_data {
    min-height: 300px;
}

@media (max-width: 640px) {
    .editor_data {
        min-height: 250px;
    }
}
</style>
