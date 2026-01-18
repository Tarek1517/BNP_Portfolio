<script setup lang="ts">
import { RouterLink } from "vue-router";
import { ref, inject } from "vue";
import Icon from "@/components/Icon.vue";
import { useAuthStore } from "@/stores/useAuthStore";
import Container from "@/components/Container.vue";

const authStore = useAuthStore();
const data = inject("data");
const isNav = ref(false);

const openSubmenus = ref<Record<string, boolean>>({});

const toggleSubmenu = (name: string) => {
    openSubmenus.value[name] = !openSubmenus.value[name];
};

const navigation = [
    { name: "হোম", href: "/", children: [] },
    { name: "পরিচিতি", href: "/about", children: [] },
    { name: "কার্যক্রম", href: "/service", children: [] },
    { name: "কর্মপরিকল্পনা", href: "/vision", children: [] },
    {
        name: "পলিসি",
        href: "#",
        children: [
            { name: "বিএনপির একত্রিশ দফা", href: "/thirty-one-policy" },
            { name: "বিএনপি'র উনিশ দফা", href: "/nineteen-policy" },
        ],
    },
    { name: "অভিযোগ", href: "/complaints", children: [] },
];
</script>

<template>
    <section class="lg:hidden bg-white shadow-md sticky top-0 z-50">
        <Container class="flex items-center justify-between py-3">
            <RouterLink to="/" class="flex flex-col">
                <span class="text-xl font-bold text-primary leading-tight"
                    >তানভীর আহমেদ রবিন</span
                >
                <span class="text-xs text-gray-500"
                    >রাজনৈতিক নেতা ও জনসেবক</span
                >
            </RouterLink>

            <div class="flex items-center justify-end space-x-3">
                <!-- Menu Toggle Button -->
                <button
                    @click="isNav = !isNav"
                    class="w-10 h-10 border border-gray-100 bg-gray-50 rounded-lg flex items-center justify-center text-primary active:scale-95 transition-transform"
                    aria-label="Toggle Menu"
                >
                    <Icon
                        :name="
                            isNav
                                ? 'material-symbols:close-rounded'
                                : 'ic:baseline-menu'
                        "
                        class="text-2xl"
                    />
                </button>
            </div>
        </Container>

        <!-- Mobile Menu Overlay -->
        <div
            class="fixed top-[64px] left-0 w-full h-[calc(100vh-64px)] bg-black/50 z-40 transition-opacity duration-300"
            :class="isNav ? 'opacity-100 visible' : 'opacity-0 invisible'"
            @click="isNav = false"
        ></div>

        <!-- Mobile Menu Drawer -->

        <div
            class="fixed top-[64px] right-0 h-[calc(100vh-64px)] w-72 bg-white z-50 shadow-2xl transition-transform duration-300 transform"
            :class="isNav ? 'translate-x-0' : 'translate-x-full'"
        >
            <div class="flex flex-col h-full">
                <!-- Navigation Section -->
                <div class="flex-1 overflow-y-auto">
                    <ul class="flex flex-col p-4 lg:space-y-2">
                        <li v-for="item in navigation" :key="item.name">
                            <div v-if="!item.children.length">
                                <RouterLink
                                    :to="item.href"
                                    class="flex items-center text-sm justify-between px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-primary/5 hover:text-primary transition-colors"
                                    active-class="bg-primary/10 text-primary font-bold"
                                    @click="isNav = false"
                                >
                                    {{ item.name }}
                                    <Icon
                                        name="material-symbols:chevron-right-rounded"
                                        class="text-xl opacity-50"
                                    />
                                </RouterLink>
                            </div>

                            <!-- Dropdown Menu -->
                            <div v-else>
                                <button
                                    @click="toggleSubmenu(item.name)"
                                    class="w-full flex text-sm items-center justify-between px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-primary/5 hover:text-primary transition-colors focus:outline-none"
                                    :class="{
                                        'text-primary bg-primary/5':
                                            openSubmenus[item.name],
                                    }"
                                >
                                    {{ item.name }}
                                    <Icon
                                        name="mdi:chevron-down"
                                        class="text-xl transition-transform duration-200"
                                        :class="{
                                            'rotate-180':
                                                openSubmenus[item.name],
                                        }"
                                    />
                                </button>

                                <!-- Submenu Items -->
                                <div
                                    v-show="openSubmenus[item.name]"
                                    class="bg-gray-50 rounded-lg mt-1 overflow-hidden transition-all duration-300"
                                >
                                    <!-- Static Submenu Items (Policy, Service) -->
                                    <ul class="py-2">
                                        <li
                                            v-for="child in item.children"
                                            :key="child.name"
                                        >
                                            <RouterLink
                                                :to="child.href"
                                                class="flex items-center px-6 py-2.5 text-sm text-gray-600 hover:text-primary hover:bg-white transition-colors"
                                                @click="isNav = false"
                                            >
                                                <Icon
                                                    name="mdi:circle-small"
                                                    class="text-xl mr-2 opacity-50"
                                                />
                                                {{ child.name }}
                                            </RouterLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Social & Contact Section -->
                    <div class="border-t border-gray-100 p-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex items-center space-x-2 bg-gray-50 px-4 py-2 rounded-full border border-gray-100"
                            >
                                <a
                                    href="#"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200"
                                    aria-label="Facebook এ ফলো করুন"
                                >
                                    <Icon name="mdi:facebook" class="text-xl" />
                                </a>
                                <a
                                    href="#"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200"
                                    aria-label="Twitter এ ফলো করুন"
                                >
                                    <Icon name="mdi:twitter" class="text-xl" />
                                </a>
                                <a
                                    href="#"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200"
                                    aria-label="Instagram এ ফলো করুন"
                                >
                                    <Icon
                                        name="mdi:instagram"
                                        class="text-xl"
                                    />
                                </a>
                                <a
                                    href="#"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200"
                                    aria-label="YouTube এ ফলো করুন"
                                >
                                    <Icon name="mdi:youtube" class="text-xl" />
                                </a>
                            </div>
                            <RouterLink
                                to="/contact"
                                class="flex bg-gradient-to-r from-primary to-secondary text-white text-sm lg:text-base font-bold px-4 py-2 lg:px-6 lg:py-2.5 rounded-full hover:shadow-lg hover:shadow-primary/30 whitespace-nowrap transition-all duration-300 transform hover:-translate-y-0.5"
                                @click="isNav = false"
                            >
                                যোগাযোগ
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
