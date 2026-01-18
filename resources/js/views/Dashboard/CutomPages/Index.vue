<script setup>
import { onMounted, ref } from "vue";
import useAxios from "@/composables/useAxios";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";
const router = useRouter();
const route = useRoute();

const { loading, error, sendRequest } = useAxios();

const pages = ref(null);

const getPages = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/pages",
    });
    pages.value = response.data;
};

const onDelete = async (id) => {
    const response = await sendRequest({
        method: "delete",
        url: `/v1/pages/${id}`,
    });

    if (response) {
        getPages();
        toast.success("Page Deleted Succesfully");
        router.push("/admin/pages");
    }
};

onMounted(() => {
    getPages();
});
</script>
<template>
    <Loading :value="loading" />
    <GuestLayout>
        <section class="p-4 sm:p-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                        <Icon name="gis:globe-users" class="text-primary text-lg" />
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900">Pages</h3>
                        <p class="text-gray-500 text-sm">Manage your website pages</p>
                    </div>
                </div>
                <div>
                    <RouterLink
                        :to="{ path: '/admin/create-page' }"
                        class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 px-4 py-3 sm:px-4 sm:py-2.5 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 w-full sm:w-auto"
                    >
                        <Icon
                            name="material-symbols:add-box-outline"
                            class="text-lg"
                        />
                        <span>Add New Page</span>
                    </RouterLink>
                </div>
            </div>
            
            <!-- Mobile Cards View -->
            <div class="block sm:hidden space-y-4">
                <div v-for="page in pages?.data" :key="page.id" 
                     class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
                    <div class="space-y-3 mb-4">
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm">{{ page?.title }}</h3>
                            <p class="text-gray-500 text-xs mt-1">{{ page?.slug }}</p>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <Icon name="mdi:calendar" class="text-gray-400" />
                            <span>{{ page?.created_at }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                        <RouterLink
                            :to="`/admin/edit-page/${page?.id}`"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm font-medium"
                        >
                            <Icon name="material-symbols:edit-square-outline" />
                            <span>Edit</span>
                        </RouterLink>
                        <button
                            @click="onDelete(page?.id)"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm font-medium"
                        >
                            <Icon name="material-symbols:delete-outline" />
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
                                <th scope="col" class="px-6 py-3.5 font-medium">Name</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Slug</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Created At</th>
                                <th scope="col" class="px-6 py-3.5 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="page in pages?.data" :key="page.id" 
                                class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ page?.title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600 font-mono text-sm">{{ page?.slug }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-gray-500 text-sm">
                                        <Icon name="mdi:calendar" class="text-gray-400" />
                                        <span>{{ page?.created_at }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <RouterLink
                                            :to="`/admin/edit-page/${page?.id}`"
                                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm"
                                        >
                                            <Icon name="material-symbols:edit-square-outline" />
                                            <span>Edit</span>
                                        </RouterLink>
                                        <button
                                            @click="onDelete(page?.id)"
                                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm"
                                        >
                                            <Icon name="material-symbols:delete-outline" />
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
