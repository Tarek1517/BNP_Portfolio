<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios.js";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Icon from "@/components/Icon.vue";

const { loading, error, sendRequest } = useAxios();

const heroContent = ref(null);
const getHeroContent = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/hero-section",
    });

    if (response) {
        heroContent.value = response.data;
    }
};

const handelDelete = async (id) => {
    const response = await sendRequest({
        method: "delete",
        url: `/v1/hero-section/${id}`,
    });
    if (response) {
        await getHeroContent();
        toast.success("Hero Section Deleted Successfully", {
            autoClose: 500,
            theme: "dark",
        });
    }
};

const handeleinActive = async (id) => {
    const response = await sendRequest({
        method: "get",
        url: `/v1/inactive-status/${id}`,
    });
    if (response) {
        await getHeroContent();
        toast.success("Status Update Successfully", {
            autoClose: 500,
            theme: "dark",
        });
    }
};

const handeleActive = async (id) => {
    const response = await sendRequest({
        method: "get",
        url: `/v1/active-status/${id}`,
    });
    if (response) {
        await getHeroContent();
        toast.success("Status Update Successfully", {
            autoClose: 500,
            theme: "dark",
        });
    }
};

onMounted(() => {
    getHeroContent();
});
</script>
<template>
    <GuestLayout>
        <section class="p-4 sm:p-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Hero Sections</h2>
                    <p class="text-gray-500 text-sm mt-1">Manage homepage hero content</p>
                </div>
                <RouterLink to="/admin/create-heroSection" class="w-full sm:w-auto">
                    <button
                        class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 px-4 py-3 sm:px-4 sm:py-2.5 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 w-full sm:w-auto">
                        <Icon
                            name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
                            class="text-lg"
                        />
                        Add New Hero Section
                    </button>
                </RouterLink>
            </div>
            
            <!-- Mobile Cards View -->
            <div class="block sm:hidden space-y-4">
                <div v-for="heroSection in heroContent?.data" :key="heroSection.id" 
                     class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
                    <div class="flex items-start gap-4 mb-4">
                        <img class="w-16 h-16 object-cover rounded-lg" :src="heroSection?.image" :alt="heroSection?.title">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-sm truncate">{{ heroSection?.title }}</h3>
                                    <p class="text-gray-600 text-xs mt-1 truncate">{{ heroSection?.sub_title }}</p>
                                </div>
                                <div>
                                    <span v-if="heroSection?.status == 1" 
                                          class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                        Active
                                    </span>
                                    <span v-else 
                                          class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">
                                        Inactive
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="inline-block px-2 py-1 bg-primary/10 text-primary text-xs rounded">
                                    Order: {{ heroSection?.order_level }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-4">
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ heroSection?.short_description }}
                        </p>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                        <!-- Status Toggle -->
                        <button v-if="heroSection?.status == 1"
                                @click="handeleinActive(heroSection?.id)"
                                class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-orange-600 bg-orange-50 text-orange-700 hover:bg-orange-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="flowbite:thumbs-down-solid" class="text-lg" />
                            <span>Deactivate</span>
                        </button>
                        <button v-else
                                @click="handeleActive(heroSection?.id)"
                                class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="flowbite:thumbs-up-solid" class="text-lg" />
                            <span>Activate</span>
                        </button>
                        
                        <RouterLink :to="`/admin/edit-heroSection/${heroSection?.id}`" 
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="material-symbols:edit-square-outline-rounded" class="text-lg" />
                            <span>Edit</span>
                        </RouterLink>
                        
                        <button @click="handelDelete(heroSection?.id)" 
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="material-symbols-light:delete-outline-sharp" class="text-lg" />
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Desktop Table View -->
            <div class="hidden sm:block bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 font-medium">Image</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Title</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Subtitle</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Description</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Order</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Status</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="heroSection in heroContent?.data" :key="heroSection.id" 
                                class="hover:bg-gray-50/50 transition-colors">
                                <!-- Image -->
                                <td class="px-6 py-4">
                                    <img class="w-12 h-12 rounded-lg object-cover border border-gray-200" 
                                         :src="heroSection?.image" :alt="heroSection?.title">
                                </td>
                                
                                <!-- Title -->
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900 max-w-[150px] truncate">{{ heroSection?.title }}</div>
                                </td>
                                
                                <!-- Subtitle -->
                                <td class="px-6 py-4">
                                    <div class="text-gray-600 max-w-[150px] truncate">{{ heroSection?.sub_title }}</div>
                                </td>
                                
                                <!-- Description -->
                                <td class="px-6 py-4 max-w-[250px]">
                                    <div class="text-gray-600 text-sm line-clamp-2">
                                        {{ heroSection?.short_description }}
                                    </div>
                                </td>
                                
                                <!-- Order Level -->
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center justify-center w-8 h-8 bg-primary/10 text-primary font-medium rounded-lg">
                                        {{ heroSection?.order_level }}
                                    </span>
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <div v-if="heroSection?.status == 1">
                                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                            Active
                                        </span>
                                    </div>
                                    <div v-else>
                                        <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">
                                            Inactive
                                        </span>
                                    </div>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- Status Toggle -->
                                        <div v-if="heroSection?.status == 1">
                                            <button @click="handeleinActive(heroSection?.id)"
                                                    class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-orange-600 bg-orange-50 text-orange-700 hover:bg-orange-600 hover:text-white transition-colors text-sm"
                                                    title="Deactivate">
                                                <Icon name="flowbite:thumbs-down-solid" />
                                            </button>
                                        </div>
                                        <div v-else>
                                            <button @click="handeleActive(heroSection?.id)"
                                                    class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm"
                                                    title="Activate">
                                                <Icon name="flowbite:thumbs-up-solid" />
                                            </button>
                                        </div>
                                        
                                        <!-- Edit -->
                                        <RouterLink :to="`/admin/edit-heroSection/${heroSection?.id}`" 
                                            class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm">
                                            <Icon name="material-symbols:edit-square-outline-rounded" />
                                            <span>Edit</span>
                                        </RouterLink>
                                        
                                        <!-- Delete -->
                                        <button @click="handelDelete(heroSection?.id)" 
                                            class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm">
                                            <Icon name="material-symbols-light:delete-outline-sharp" />
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

