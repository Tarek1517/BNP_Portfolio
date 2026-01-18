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

const request = ref(null);
// const getRequest = async () => {
//     const response = await sendRequest({
//        method:'get',
//        url:'/v1/get-all-inquires'
//     });
//     if(response){
//         request.value = response?.data
//     }
// }



onMounted(() => {
    getData();
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
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-primary/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300">
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
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-secondary/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center group-hover:bg-secondary/20 transition-colors duration-300">
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
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-blue-400/30 transition-all duration-300 group">
                    <div class="p-5">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                <Icon name="mdi:calendar-today" class="w-5 h-5 text-blue-600" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ data?.todayActivities || 0 }}</h3>
                                <p class="text-gray-500 text-sm">Today's Activities</p>
                            </div>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <Icon name="mdi:update" class="w-3 h-3 text-blue-500 mr-1" />
                            <span>Recent portfolio updates</span>
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
                        <div v-if="data?.recentActivities?.length" v-for="activity in data.recentActivities.slice(0, 3)" :key="activity.id" 
                             class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                <Icon :name="activity.icon || 'mdi:update'" class="w-4 h-4 text-primary" />
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-800">{{ activity.description }}</p>
                                <p class="text-xs text-gray-500">{{ activity.time }}</p>
                            </div>
                        </div>
                        <div v-else class="text-center py-4 text-gray-500 text-sm">
                            No recent activities
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
