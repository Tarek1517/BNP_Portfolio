<script setup>
import { ref, onMounted } from 'vue';
import useAxios from '@/composables/useAxios.js'
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";

const { loading, error, sendRequest } = useAxios();

const categories = ref(null);
const getCategory = async () => {
	const response = await sendRequest({
		method: 'get',
		url: '/v1/service-category',
	});
	if (response) {
		categories.value = response.data;
	}
}

const onDelete = async (id) => {
	const response = await sendRequest({
		method: 'delete',
		url: `/v1/service-category/${id}`,
	});
	if (response) {
		await getCategory();
		toast.success('Service Category Deleted Successfully', { autoClose: 500, 'theme': 'dark' })
	}
}

onMounted(() => {
	getCategory();
})
</script>
<template>
	<GuestLayout>
		<section class="p-4 sm:p-6">
			<!-- Header -->
			<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-5 gap-3">
				<h2 class="text-xl font-semibold text-gray-900">Services Category</h2>
				<RouterLink to="/admin/create-category" class="w-full sm:w-auto">
					<button
						class="flex items-center justify-center gap-2 bg-primary px-4 py-3 sm:px-3 sm:py-2 text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors w-full sm:w-auto">
						<Icon name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
							class="text-sm"/>
						Add New Category
					</button>
				</RouterLink>
			</div>
			
			<!-- Mobile Cards View -->
			<div class="block sm:hidden space-y-4">
				<div v-for="category in categories?.data" :key="category.id" 
					class="bg-white rounded-lg border border-gray-200 shadow-sm p-4">
					<div class="flex items-start gap-3 mb-3">
						<img class="w-16 h-16 object-cover rounded-lg" :src="category?.image" :alt="category?.name">
						<div class="flex-1">
							<h3 class="font-semibold text-gray-900 text-sm">{{ category?.name }}</h3>
							<p class="text-gray-600 text-xs mt-1">{{ category?.title }}</p>
						</div>
					</div>
					
					<div class="grid grid-cols-2 gap-3 mb-4">
						<div class="space-y-1">
							<p class="text-xs text-gray-500">Icon</p>
							<div class="flex items-center">
								<Icon :name="category?.icon" class="text-xl text-primary" />
							</div>
						</div>
						<div class="space-y-1">
							<p class="text-xs text-gray-500">Order Level</p>
							<p class="text-sm font-medium">{{ category?.order_level }}</p>
						</div>
					</div>
					
					<div class="flex items-center gap-2 pt-3 border-t border-gray-100">
						<RouterLink :to="`/admin/edit-category/${category?.id}`" 
							class="flex-1 flex items-center justify-center gap-1 px-3 py-2 rounded-lg border border-green-600 bg-green-500/10 text-green-600 hover:bg-green-600 hover:text-white transition-colors text-sm">
							<Icon name="material-symbols:edit-square-outline-rounded" class="text-lg" />
							<span>Edit</span>
						</RouterLink>
						<button @click="onDelete(category?.id)" 
							class="flex-1 flex items-center justify-center gap-1 px-3 py-2 rounded-lg border border-red-600 bg-red-500/10 text-red-600 hover:bg-red-600 hover:text-white transition-colors text-sm">
							<Icon name="material-symbols-light:delete-outline-sharp" class="text-lg" />
							<span>Delete</span>
						</button>
					</div>
				</div>
			</div>
			
			<!-- Desktop Table View -->
			<div class="hidden sm:block relative overflow-x-auto shadow-md sm:rounded-lg border-t-2 border-primary">
				<table class="w-full text-sm text-left rtl:text-right text-gray-500">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50">
						<tr>
							<th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
								Category Image
							</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
								Category Name
							</th>
							<th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
								Category Title
							</th>
							<th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
								Icon
							</th>
							<th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
								Order Level
							</th>
							<th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="category in categories?.data" :key="category.id" class="bg-white border-b hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4 sm:px-6 sm:py-4">
								<img class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded-lg" :src="category?.image" :alt="category?.name">
							</td>
							<th scope="row" class="px-4 py-4 sm:px-6 sm:py-4 font-medium text-gray-900 whitespace-nowrap">
								{{ category?.name }}
							</th>
							<td class="px-4 py-4 sm:px-6 sm:py-4">
								{{ category?.title }}
							</td>
							<td class="px-4 py-4 sm:px-6 sm:py-4">
								<Icon :name="category?.icon" class="text-2xl sm:text-3xl text-primary" />
							</td>
							<td class="px-4 py-4 sm:px-6 sm:py-4">
								<span class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full text-sm font-medium">
									{{ category?.order_level }}
								</span>
							</td>
							<td class="px-4 py-4 sm:px-6 sm:py-4">
								<div class="flex items-center gap-2">
									<RouterLink :to="`/admin/edit-category/${category?.id}`" 
										class="flex items-center gap-1 px-3 py-2 rounded-lg border border-green-600 bg-green-500/10 text-green-600 hover:bg-green-600 hover:text-white transition-colors">
										<Icon name="material-symbols:edit-square-outline-rounded" class="text-lg" />
										<span class="text-xs font-normal">Edit</span>
									</RouterLink>
									<button @click="onDelete(category?.id)" 
										class="flex items-center gap-1 px-3 py-2 rounded-lg border border-red-600 bg-red-500/10 text-red-600 hover:bg-red-600 hover:text-white transition-colors">
										<Icon name="material-symbols-light:delete-outline-sharp" class="text-lg" />
										<span class="text-xs font-normal">Delete</span>
									</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
	</GuestLayout>
</template>

<style scoped>
/* Responsive table styles */
@media (max-width: 640px) {
	table {
		display: block;
		width: 100%;
		overflow-x: auto;
		-webkit-overflow-scrolling: touch;
	}
	
	th, td {
		white-space: nowrap;
		min-width: 100px;
	}
}

/* Responsive padding */
@media (max-width: 640px) {
	:deep(.GuestLayout > section) {
		padding-left: 1rem;
		padding-right: 1rem;
	}
}

/* Ensure images are responsive */
img {
	max-width: 100%;
	height: auto;
}
</style>
