<template>
    <div class="h-full bg-white border-r border-gray-200">
        <!-- Header -->
        <div class="py-6 px-4 border-b border-gray-100">
            <RouterLink to="/" class="group">
                <h1
                    class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300"
                >
                    অ্যাডমিন
                </h1>
                <p class="text-xs text-gray-500 mt-1">Dashboard</p>
            </RouterLink>
        </div>

        <!-- Navigation -->
        <div>
            <ul class="flex flex-col space-y-1">
                <!-- Dashboard -->
                <li>
                    <RouterLink
                        to="/admin/dashboard"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="ic:twotone-dashboard-customize"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Dashboard</p>
                    </RouterLink>
                </li>

                <!-- Service Category -->
                <li>
                    <RouterLink
                        to="/admin/service-category"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="bx:bxs-category"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Category</p>
                    </RouterLink>
                </li>

                <!-- Services -->
                <li>
                    <RouterLink
                        to="/admin/service"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols:design-services"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Services</p>
                    </RouterLink>
                </li>

                <!-- CMS Dropdown -->
                <li>
                    <!-- CMS Dropdown Toggle -->
                    <div
                        class="flex items-center justify-between gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200 cursor-pointer"
                        @click="toggleCmsLinks"
                    >
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                            >
                                <Icon
                                    name="carbon:ibm-data-product-exchange"
                                    size="12"
                                    class="text-primary"
                                />
                            </div>
                            <span class="font-medium text-sm">CMS</span>
                        </div>
                        <Icon
                            name="ic:twotone-keyboard-arrow-right"
                            size="20"
                            class="transition-transform duration-200"
                            :class="{ 'rotate-90': isCmsLinks }"
                        />
                    </div>

                    <!-- Dropdown Menu -->
                    <div
                        class="overflow-hidden transition-all duration-200"
                        :style="{ height: isCmsLinks ? 'auto' : '0px' }"
                    >
                        <ul class="pl-5 pr-3 py-2 space-y-2">
                            <li>
                                <RouterLink
                                    to="/admin/home-slider"
                                    class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-primary/5 transition-colors text-sm"
                                    active-class="text-primary font-medium"
                                >
                                    <div
                                        class="w-1.5 h-1.5 bg-gray-400 rounded-full"
                                    ></div>
                                    Hero Section
                                </RouterLink>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <RouterLink
                        to="/admin/counter"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols:counter-0"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Counter</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink
                        to="/admin/policy"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols:policy"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Policy</p>
                    </RouterLink>
                </li>

                <li>
                    <RouterLink
                        to="/admin/serve"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols:person-rounded"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Who We Serve</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink
                        to="/admin/quote"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="pixel:quote-right-solid"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Quotes</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink
                        to="/admin/vision"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="hugeicons:ai-vision-recognition"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Vision</p>
                    </RouterLink>
                </li>

                <li>
                    <RouterLink
                        to="/admin/about"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="streamline-logos:about-me-logo-block"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">About</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink
                        to="/admin/complaints"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="streamline-freehand:customer-action-complaint"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Complaints</p>
                    </RouterLink>
                </li>

                <!-- Clients Mail -->
                <li>
                    <RouterLink
                        to="/admin/Customer-mail"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols:attach-email"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Client Mails</p>
                    </RouterLink>
                </li>

                <!-- Custom Pages -->
                <li>
                    <RouterLink
                        to="/admin/pages"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols-light:insert-page-break"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Custom Pages</p>
                    </RouterLink>
                </li>

                <!-- Setting -->
                <li>
                    <RouterLink
                        to="/admin/setting"
                        class="flex items-center gap-3 px-4 py-1 rounded-xl hover:bg-primary/5 group transition-all duration-200"
                        active-class="text-primary border-r-4 border-primary"
                    >
                        <div
                            class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center group-hover:bg-primary/15 transition-colors"
                        >
                            <Icon
                                name="material-symbols:settings-outline-rounded"
                                size="12"
                                class="text-primary"
                            />
                        </div>
                        <p class="font-medium text-sm">Settings</p>
                    </RouterLink>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useAuthStore } from "@/stores/useAuthStore.js";
import useAxios from "@/composables/useAxios.js";
const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
const isCmsLinks = ref(false);

const toggleCmsLinks = () => {
    isCmsLinks.value = !isCmsLinks.value;
};
</script>

<style scoped></style>
