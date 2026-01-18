<script setup>
import { ref, onMounted } from 'vue';
import useAxios from '@/composables/useAxios.js'
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Icon from "@/components/Icon.vue";

const { loading, error, sendRequest } = useAxios();

const services = ref(null);
const getServices = async () => {
	const response = await sendRequest({
		method: 'get',
		url: '/v1/service',
	});

	if (response) {
		services.value = response.data;
	}
}

const handelDelete = async (id) => {
	const response = await sendRequest({
		method: 'delete',
		url: `/v1/service/${id}`,
	});
	if (response) {
		await getServices();
		toast.success('Service Deleted Successfully', { autoClose: 500, 'theme': 'dark' })
	}
}

onMounted(() => {
	getServices();
})
</script>
<template>
    <GuestLayout>
        <section class="p-4 sm:p-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Services</h2>
                    <p class="text-gray-500 text-sm mt-1">Manage your portfolio services</p>
                </div>
                <RouterLink to="/admin/create-service" class="w-full sm:w-auto">
                    <button
                        class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 px-4 py-3 sm:px-4 sm:py-2.5 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 w-full sm:w-auto">
                        <Icon name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
                            class="text-lg"/>
                        Add New Service
                    </button>
                </RouterLink>
            </div>
            
            <!-- Mobile Cards View -->
            <div class="block sm:hidden space-y-4">
                <div v-for="service in services?.data" :key="service.id" 
                     class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
                    <div class="flex items-start gap-4 mb-4">
                        <img class="w-16 h-16 object-cover rounded-lg" :src="service?.image" :alt="service?.name">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-900 text-sm truncate">{{ service?.title }}</h3>
                            <p class="text-gray-600 text-xs mt-1 truncate">{{ service?.name }}</p>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="px-2 py-1 bg-gray-100 rounded text-xs text-gray-600">
                                    {{ service.service_cat?.name }}
                                </div>
                                <div class="px-2 py-1 bg-primary/10 text-primary rounded text-xs">
                                    Order: {{ service?.order_level }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                                <Icon :name="service?.icon" class="text-primary text-lg" />
                            </div>
                            <div class="text-sm text-gray-600 line-clamp-2">
                                {{ service?.short_description }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                        <RouterLink :to="`/admin/edit-service/${service?.id}`" 
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="material-symbols:edit-square-outline-rounded" class="text-lg" />
                            <span>Edit</span>
                        </RouterLink>
                        <button @click="handelDelete(service?.id)" 
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
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Icon
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Sub Title
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Short Description
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Order
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="service in services?.data" :key="service.id" 
                                class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <img class="w-12 h-12 rounded-lg object-cover border border-gray-200" 
                                         :src="service?.image" :alt="service?.name">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ service?.title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                        <Icon :name="service?.icon" class="text-primary text-xl" />
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-700">{{ service?.name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ service.service_cat?.name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="text-gray-600 line-clamp-2 text-sm">
                                        {{ service?.short_description }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center justify-center w-8 h-8 bg-primary/10 text-primary font-medium rounded-lg">
                                        {{ service?.order_level }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <RouterLink :to="`/admin/edit-service/${service?.id}`" 
                                            class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm">
                                            <Icon name="material-symbols:edit-square-outline-rounded" class="text-lg" />
                                            <span>Edit</span>
                                        </RouterLink>
                                        <button @click="handelDelete(service?.id)" 
                                            class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm">
                                            <Icon name="material-symbols-light:delete-outline-sharp" class="text-lg" />
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

<style scoped>

</style>
