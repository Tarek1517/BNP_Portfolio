<script setup>
// import {useAuthStore} from "@/stores/useAuthStore.js";
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios.js";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
const { loadng, error, sendRequest } = useAxios();
import { useAuthStore } from "@/stores/useAuthStore";
const auth = useAuthStore();
const data = ref(null);

const getData = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/dashboard",
    });

    if (response) {
        data.value = response?.data?.data;
    }
};



const complaints = ref(null);
const getComplaints = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/complaint",
    });

    if (response) {
        complaints.value = response.data;
    }
};

const handleDelete = async (id) => {
    if (confirm("Are you sure you want to delete this complaint?")) {
        const response = await sendRequest({
            method: "delete",
            url: `/v1/complaint/${id}`,
        });
        if (response) {
            await getComplaints();
            toast.success("Complaint Deleted Successfully", {
                autoClose: 500,
                theme: "dark",
            });
        }
    }
};
onMounted(() => {
    getData();
    getComplaints();
});
</script>
<template>
    <GuestLayout>
        <div class="p-6">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                        <Icon name="mdi:view-dashboard" class="w-5 h-5 text-primary" />
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Portfolio Dashboard</h1>
                        <p class="text-gray-500 text-sm">Welcome to your creative portfolio</p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Total Projects -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-primary/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300">
                                <Icon name="material-symbols:design-services" class="w-5 h-5 text-primary" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.totalServices || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Total Projects</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:trending-up" class="w-3 h-3 text-green-500 mr-1" />
                            <span>Showcasing my creative work</span>
                        </div>
                    </div>
                </div>

                <!-- Active Clients -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-secondary/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center group-hover:bg-secondary/20 transition-colors duration-300">
                                <Icon name="carbon:customer" class="w-5 h-5 text-secondary" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.totalCategory || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Total Categories</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:heart" class="w-3 h-3 text-red-500 mr-1" />
                            <span>Total Categories</span>
                        </div>
                    </div>
                </div>

                <!-- Today's Activities -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-blue-400/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                <Icon name="mdi:calendar-today" class="w-5 h-5 text-blue-600" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.todayComplaint || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Today's Complaint</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:update" class="w-3 h-3 text-blue-500 mr-1" />
                            <span>Todays Complaint</span>
                        </div>
                    </div>
                </div>

                <!-- Today's Activities -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-blue-400/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                <Icon name="mdi:calendar-today" class="w-5 h-5 text-blue-600" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.totalComplaint || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Total Complaint</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:update" class="w-3 h-3 text-blue-500 mr-1" />
                            <span>Total Complaint</span>
                        </div>
                    </div>
                </div>

                <!-- Today's Activities -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-blue-400/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                <Icon name="mdi:calendar-today" class="w-5 h-5 text-blue-600" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.totalMail || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Total Mail</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:update" class="w-3 h-3 text-blue-500 mr-1" />
                            <span>Total Mail</span>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-blue-400/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                <Icon name="mdi:calendar-today" class="w-5 h-5 text-blue-600" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.todaysMail || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Today's Mail</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:update" class="w-3 h-3 text-blue-500 mr-1" />
                            <span>Today's Mail</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="mt-8">
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Recent Activities</h2>
                        <span class="text-xs text-primary bg-primary/10 px-2 py-1 rounded-full">Latest</span>
                    </div>
                    <div class="space-y-3">

                        <!-- Mobile Cards View -->
                        <div class="block sm:hidden space-y-4">
                            <div v-for="item in complaints?.data" :key="item.id"
                                class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
                                <div class="space-y-3 mb-4">
                                    <!-- Sender Info -->
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                                            <Icon name="mdi:account" class="text-primary text-lg" />
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-semibold text-gray-900 text-sm truncate">
                                                {{ item?.name }}
                                            </h3>
                                            <p class="text-gray-600 text-xs truncate">
                                                {{ item?.phone }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Subject Info -->
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        <p class="font-medium text-sm text-gray-800">
                                            {{ item?.subject }}
                                        </p>
                                        <span
                                            class="inline-block mt-1 px-2 py-0.5 bg-gray-200 text-gray-700 text-xs rounded">
                                            {{ item?.type }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                                    <RouterLink :to="`/admin/complaint-details/${item?.id}`"
                                        class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm font-medium">
                                        <Icon name="material-symbols:eye-tracking-sharp" class="text-lg" />
                                        <span>Details</span>
                                    </RouterLink>
                                    <button @click="handleDelete(item?.id)"
                                        class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm font-medium">
                                        <Icon name="material-symbols-light:delete-outline-sharp" class="text-lg" />
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Desktop Table View -->
                        <div
                            class="hidden sm:block bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-700">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-3.5 font-medium">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3.5 font-medium">
                                                Contact
                                            </th>
                                            <th scope="col" class="px-6 py-3.5 font-medium">
                                                Type
                                            </th>
                                            <th scope="col" class="px-6 py-3.5 font-medium">
                                                Subject
                                            </th>
                                            <th scope="col" class="px-6 py-3.5 font-medium">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        <tr v-for="item in complaints?.data" :key="item.id"
                                            class="hover:bg-gray-50/50 transition-colors">
                                            <!-- Name -->
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                                        <Icon name="mdi:account" class="text-primary text-sm" />
                                                    </div>
                                                    <div class="font-medium text-gray-900">
                                                        {{ item?.name }}
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Contact -->
                                            <td class="px-6 py-4">
                                                <div class="flex flex-col">
                                                    <span class="text-gray-900">{{
                                                        item?.phone
                                                    }}</span>
                                                    <span class="text-gray-500 text-xs">{{
                                                        item?.email
                                                    }}</span>
                                                </div>
                                            </td>

                                            <!-- Type -->
                                            <td class="px-6 py-4">
                                                <span
                                                    class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded-full truncate">
                                                    {{ item?.type }}
                                                </span>
                                            </td>

                                            <!-- Subject -->
                                            <td class="px-6 py-4 max-w-[250px]">
                                                <div class="truncate font-medium text-gray-800">
                                                    {{ item?.subject }}
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <RouterLink :to="`/admin/complaint-details/${item?.id}`"
                                                        class="flex items-center gap-2 px-3 py-2 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm">
                                                        <Icon name="material-symbols:eye-tracking-sharp"
                                                            class="text-lg" />
                                                        <span>Details</span>
                                                    </RouterLink>
                                                    <button @click="handleDelete(item?.id)"
                                                        class="flex items-center gap-2 px-3 py-2 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm">
                                                        <Icon name="material-symbols-light:delete-outline-sharp"
                                                            class="text-lg" />
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
