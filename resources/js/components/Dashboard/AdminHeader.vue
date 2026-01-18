<script setup>
import { useAuthStore } from "@/stores/useAuthStore.js";
import useAxios from "@/composables/useAxios.js";
const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
</script>

<template>
    <div
        class="fixed top-0 right-0 left-44 p-4 shadow-lg z-10 flex justify-end items-center bg-white/95 backdrop-blur-sm border-b border-gray-100 pr-6">
        <div class="flex items-center space-x-6 relative group">
            <div class="flex flex-col items-end">
                <span class="flex items-center gap-2 font-semibold text-gray-900 text-sm">
                    <Icon name="ri:admin-fill" class="text-primary-500 w-4 h-4" />
                    {{ authStore.admin?.user?.name }}
                </span>
                <span
                    class="text-xs text-gray-500 font-medium bg-gray-100 px-2 py-0.5 rounded-full mt-0.5">Administrator</span>
            </div>

            <!-- User Avatar/Circle -->
            <div
                class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-100 to-primary-50 border-2 border-white shadow-sm flex items-center justify-center cursor-pointer">
                <span class="text-primary-700 font-semibold text-sm">
                    {{ authStore.admin?.user?.name?.charAt(0) || 'A' }}
                </span>
            </div>

            <!-- Dropdown Menu -->
            <div
                class="absolute top-full right-0 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-out transform group-hover:translate-y-0 translate-y-2 z-50">
                <!-- Transparent Bridge -->
                <div class="h-3 w-full"></div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="p-4 border-b border-gray-100">
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center">
                                <span class="text-primary-700 font-semibold text-lg">
                                    {{ authStore.admin?.user?.name?.charAt(0) || 'A' }}
                                </span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">{{ authStore.admin?.user?.name }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ authStore.admin?.user?.email ||
                                    'admin@example.com' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-2">
                        <button @click="authStore?.adminLogout"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-50 w-full transition-all duration-150 group/logout">
                            <div
                                class="w-9 h-9 rounded-lg bg-red-100 flex items-center justify-center group-hover/logout:bg-red-200 transition-colors shadow-sm">
                                <Icon name="codicon:sign-out" size="14" class="text-red-600" />
                            </div>
                            <div class="text-left flex-1">
                                <p class="font-medium text-sm text-gray-900">Log Out</p>
                                <p class="text-xs text-gray-500 mt-0.5">Sign out from admin panel</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dropdown Indicator -->
            <div class="text-gray-400 group-hover:text-gray-600 transition-colors cursor-pointer">
                <Icon name="mdi:chevron-down" size="20" />
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Smooth transitions */
* {
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}

/* Custom shadow for better depth */
.shadow-lg {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08), 0 1px 2px rgba(0, 0, 0, 0.05);
}
</style>
