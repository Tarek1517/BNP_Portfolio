<template>
    <GuestLayout>
        <div class="p-6 bg-white shadow-xl rounded-xl max-w-4xl mx-auto">
            <h3 class="mb-8 text-2xl font-bold text-primary text-center uppercase border-b pb-4">
                Add New Service
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Service Title -->
                    <div>
                        <label for="title" class="text-sm font-medium text-gray-700 mb-2 block">
                            Service Title <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                            v-model="form.title"
                            placeholder="Enter service title"
                        />
                    </div>

                    <!-- Service Sub-title -->
                    <div>
                        <label for="name" class="text-sm font-medium text-gray-700 mb-2 block">
                            Service Sub-title
                        </label>
                        <input 
                            type="text" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                            v-model="form.name"
                            placeholder="Enter service sub-title"
                        />
                    </div>

                    <!-- Category Selection -->
                    <div>
                        <label for="category" class="text-sm font-medium text-gray-700 mb-2 block">
                            Service Category <span class="text-red-500">*</span>
                        </label>
                        <Select
                            v-if="categories"
                            label="name"
                            :options="categories"
                            :reduce="(item) => item.id"
                            v-model="form.service_category_id"
                            placeholder="Select Category"
                            class="w-full"
                        />
                    </div>

                    <!-- Order Level -->
                    <div>
                        <label for="order_level" class="text-sm font-medium text-gray-700 mb-2 block">
                            Order Level
                        </label>
                        <input 
                            type="number" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors"
                            v-model="form.order_level"
                            placeholder="Enter order number"
                            min="0"
                        />
                    </div>

                    <!-- Category Icon -->
                    <div>
                        <label for="icon" class="text-sm font-medium text-gray-700 mb-2 block">
                            Category Icon (SVG/HTML)
                        </label>
                        <textarea 
                            v-model="form.icon"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors h-32 resize-none"
                            placeholder="Paste SVG or icon HTML code here..."
                        ></textarea>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Service Image -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Service Image <span class="text-red-500">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 hover:border-primary transition-colors">
                            <label for="category-icon" class="cursor-pointer">
                                <div v-if="serviceImg" class="relative">
                                    <img :src="serviceImg" class="w-full h-48 object-cover rounded-lg" />
                                    <div class="absolute inset-0 bg-black/0 hover:bg-black/20 transition-colors rounded-lg flex items-center justify-center opacity-0 hover:opacity-100">
                                        <span class="text-white font-medium bg-black/50 px-4 py-2 rounded">Change Image</span>
                                    </div>
                                </div>
                                <div v-else class="text-center py-8">
                                    <Icon name="mdi:cloud-upload" class="text-4xl text-gray-400 mx-auto mb-3" />
                                    <p class="text-gray-600 font-medium">Upload Service Image</p>
                                    <p class="text-xs text-gray-400 mt-1">Click to browse or drag & drop</p>
                                </div>
                                <input id="category-icon" @change="image" type="file" hidden accept="image/*" />
                            </label>
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Gallery Images
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4">
                            <!-- Image Preview Grid -->
                            <div v-if="form.images.length > 0" class="mb-4">
                                <div class="grid grid-cols-4 gap-2">
                                    <div
                                        v-for="(image, index) in form.images"
                                        :key="index"
                                        class="relative aspect-square rounded-lg overflow-hidden border border-gray-200 group"
                                    >
                                        <img :src="image.url" class="w-full h-full object-cover" />
                                        <button
                                            @click="removeMedia(index)"
                                            class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity"
                                            type="button"
                                        >
                                            <Icon name="mdi:close" />
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Button -->
                            <label for="mu-file-input" class="cursor-pointer">
                                <div class="flex flex-col items-center justify-center py-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-primary transition-colors">
                                    <Icon name="mdi:image-plus" class="text-3xl text-gray-400 mb-2" />
                                    <p class="text-gray-600 font-medium">Add Gallery Images</p>
                                    <p class="text-xs text-gray-400 mt-1">Multiple images allowed</p>
                                </div>
                                <input
                                    @change="handleFileChange"
                                    id="mu-file-input"
                                    type="file"
                                    accept="image/*"
                                    multiple
                                    hidden
                                />
                            </label>
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="text-sm font-medium text-gray-700 mb-2 block">
                            Short Description
                        </label>
                        <textarea
                            v-model="form.short_description"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors h-32 resize-none"
                            placeholder="Brief description of the service..."
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Full Width Sections -->
            <div class="mt-8 space-y-6">
                <!-- Description -->
                <div>
                    <label class="text-sm font-medium text-gray-700 mb-2 block">
                        Detailed Description
                    </label>
                    <div class="editor_data bg-gray-100">
                        <SummernoteEditor v-model="form.description" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-6">
                    <button
                        @click="onSubmit"
                        class="bg-gradient-to-r from-primary to-secondary text-white font-semibold py-3 px-8 rounded-lg hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 transform hover:-translate-y-0.5"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Save Service</span>
                        <span v-else class="flex items-center gap-2">
                            <Icon name="mdi:loading" class="animate-spin" />
                            Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios";
import { useRouter } from "vue-router";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import SummernoteEditor from "vue3-summernote-editor";

const { loading, error, sendRequest } = useAxios();
const router = useRouter();

const categories = ref(null);
const getCategory = async () => {
    const response = await sendRequest({
        url: "/all-category-list",
        method: "get",
    });
    if (response) {
        categories.value = response.data;
    }
};

const serviceImg = ref(null);
const form = ref({
    service_category_id: null,
    name: null,
    title: null,
    image: null,
    images: [],
    icon: null,
    short_description: null,
    description: null,
    order_level: null,
    status: 1,
});

const image = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    serviceImg.value = URL.createObjectURL(file);
};

// handle multiple image upload
const handleFileChange = (event) => {
  for (let i = 0; i < event.target.files.length; i++) {
    form.value.images.push({
      url: URL.createObjectURL(event.target.files[i]),
      file: event.target.files[i],
    });
  }
};

const removeMedia = (index) => {
  let removedImage = form.value.images[index];
  if (removedImage.url.startsWith("blob:")) {
    URL.revokeObjectURL(removedImage.url);
  }
  form.value.images.splice(index, 1);
};

// Save Product
const onSubmit = async () => {
    const response = await sendRequest({
        method: "post",
        url: "/v1/service",
        data: form.value,
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
    if (response?.data) {
        toast.success("Service Added Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/service");
    }
};

onMounted(() => {
    getCategory();
});
</script>

<style scoped>
/* Custom scrollbar for textareas */
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

/* File upload hover effects */
.file-upload-container label:hover .border-dashed {
    border-color: #3b82f6;
}

.file-upload-container label:hover .text-gray-400 {
    color: #3b82f6;
}
</style>