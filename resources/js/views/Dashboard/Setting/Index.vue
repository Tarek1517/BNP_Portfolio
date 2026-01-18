<script setup>
import { onMounted, ref } from "vue";
import SummernoteEditor from "vue3-summernote-editor";
import useAxios from "@/composables/useAxios";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Modal from "@/components/Modal.vue";

const { loading, error, sendRequest } = useAxios();

const getAllSetting = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/setting",
    });
    setting.value = response.data;
};

// get Page
const pages = ref(null);
const getPage = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/all-page-list",
    });

    if (response) {
        pages.value = response.data?.data;
    }
};

const categories = ref([]);
const getCategory = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/all-category-list",
    });
    if (response) {
        categories.value = response?.data;
    }
};

const getTabIcon = (index) => {
    const icons = [
        "mdi:cog-outline",
        "mdi:home-outline",
        "mdi:text-box-outline",
    ];
    return icons[index] || "mdi:cog-outline";
};

const tabs = ["App", "Home", "Footer"];
const activeTab = ref(0);

const setting = ref({
    home_sevices: [],
    header_category: [],
    currency_symbol: null,
    email: null,
    address: null,
    phone_number: null,
    whatsapp_number: null,
    twitter_link: null,
    facebook_link: null,
    youtube_link: null,
    instagram_link: null,
    linkedin_link: null,
    homePage_video_link: null,
    privacyPolicy_link: null,
    google_map_link: null,
    meeting_time: null,
});

const onSubmit = async () => {
    const response = await sendRequest({
        method: "post",
        url: "/v1/setting",
        data: setting.value,
    });

    if (response) {
        toast.success("Setting saved Successfully", {
            autoClose: 500,
            theme: "dark",
        });
        getAllSetting();
    }
};

const footer_columns = ref(null);
const getFooter = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/footer",
    });

    if (response) {
        footer_columns.value = response.data;
    }
};

const allServices = ref([]);

const fetchServices = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "/v1/service",
        });
        allServices.value = response?.data?.data || [];
    } catch (error) {
        console.error("Error fetching Services:", error);
    }
};

const form = ref({
    title: null,
    pages: null,
    content: null,
    width: null,
    order_number: null,
});

const resetForm = () => {
    title.value = null;
    pages.value = null;
    content.value = null;
    order_number.value = null;
};

const onFooterSubmit = async () => {
    const response = await sendRequest({
        method: "post",
        url: "/v1/footer",
        data: form.value,
    });
    if (response) {
        toast.success("Footer save successfully");
        getFooter();
        isModalOpened.value = false;
        resetForm();
    }
};

const onFooterDelete = async (id) => {
    const response = await sendRequest({
        method: "delete",
        url: `/v1/footer/${id}`,
    });
    if (response) {
        toast.success("Footer Column Deleted Successfully");
        getFooter();
    }
};

// model
const isModalOpened = ref(false);

const openModal = () => {
    isModalOpened.value = true;
};
const closeModal = () => {
    isModalOpened.value = false;
};

onMounted(() => {
    getAllSetting();
    getFooter();
    getPage();
    fetchServices();
    getCategory();
});
</script>
<template>
    <GuestLayout>
        <section class="p-6 bg-gray-50 min-h-screen">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                        <Icon name="material-symbols:settings-outline-rounded" class="text-xl text-primary" />
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Settings
                        </h3>
                        <p class="text-sm text-gray-500">
                            Manage your application settings
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex gap-6">
                <!-- Sidebar Tabs -->
                <div class="w-64 flex-shrink-0">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <ul>
                            <li v-for="(tab, index) in tabs" :key="index">
                                <button @click="activeTab = index" :class="[
                                    'w-full px-4 py-3.5 text-left flex items-center gap-3 border-l-4 transition-all duration-200',
                                    activeTab == index
                                        ? 'bg-primary/5 text-primary border-primary font-medium'
                                        : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900',
                                ]">
                                    <Icon :name="getTabIcon(index)" class="text-lg" :class="activeTab == index
                                        ? 'text-primary'
                                        : 'text-gray-400'
                                        " />
                                    <span class="text-sm">{{ tab }}</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="flex-1">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <!-- General Settings Tab -->
                        <div v-if="activeTab == 0" class="space-y-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:phone" class="text-primary" />
                                        Phone Number
                                    </label>
                                    <input v-model="setting.phone_number" type="text"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Enter phone number" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:whatsapp" class="text-green-500" />
                                        WhatsApp Number
                                    </label>
                                    <input v-model="setting.whatsapp_number" type="text"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Enter WhatsApp number" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:email" class="text-primary" />
                                        Email Address
                                    </label>
                                    <input v-model="setting.email" type="email"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Enter email address" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:facebook" class="text-blue-600" />
                                        Facebook
                                    </label>
                                    <input v-model="setting.facebook_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Facebook profile URL" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:instagram" class="text-pink-600" />
                                        Instagram
                                    </label>
                                    <input v-model="setting.instagram_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Instagram profile URL" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:linkedin" class="text-blue-700" />
                                        LinkedIn
                                    </label>
                                    <input v-model="setting.linkedin_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="LinkedIn profile URL" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:youtube" class="text-red-600" />
                                        YouTube
                                    </label>
                                    <input v-model="setting.youtube_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="YouTube channel URL" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:twitter" class="text-blue-400" />
                                        Twitter
                                    </label>
                                    <input v-model="setting.twitter_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Twitter profile URL" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:video" class="text-primary" />
                                        Home Page Video Link
                                    </label>
                                    <input v-model="setting.homePage_video_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Enter video URL" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <Icon name="mdi:shield-lock" class="text-primary" />
                                        Privacy & Policy Link
                                    </label>
                                    <input v-model="setting.privacyPolicy_link" type="url"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                                        placeholder="Privacy policy URL" />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                    <Icon name="mdi:map-marker" class="text-primary" />
                                    Address
                                </label>
                                <textarea v-model="setting.address" rows="3"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 resize-none"
                                    placeholder="Enter your business address"></textarea>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                    <Icon name="ep:alarm-clock" class="text-primary" />
                                    Meeting time
                                </label>
                                <textarea v-model="setting.meeting_time" rows="3"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 resize-none"
                                    placeholder="Enter your business address"></textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                    <Icon name="mdi:map-marker" class="text-primary" />
                                    Google Map Link
                                </label>
                                <textarea v-model="setting.google_map_link" rows="3"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 resize-none"
                                    placeholder="Enter your business address"></textarea>
                            </div>

                            <div class="pt-4">
                                <button @click="onSubmit"
                                    class="px-6 py-3 bg-gradient-to-r from-primary to-primary/80 text-white font-medium rounded-lg hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 flex items-center gap-2">
                                    <Icon name="mdi:content-save" class="text-lg" />
                                    Save Settings
                                </button>
                            </div>
                        </div>

                        <!-- Home Settings Tab -->
                        <div v-if="activeTab == 1" class="space-y-6">
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2 mb-3">
                                        <Icon name="mdi:home-outline" class="text-primary" />
                                        Home Services
                                    </label>
                                    <Select v-if="allServices" label="title" :options="allServices"
                                        :reduce="(item) => item.id" v-model="setting.home_sevices" multiple
                                        class="v-select-custom">
                                        <template v-slot:option="option">
                                            <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                                <img :src="option?.image" class="w-10 h-10 rounded-lg object-cover" />
                                                <span class="text-sm font-medium">{{ option?.title }}</span>
                                            </div>
                                        </template>
                                    </Select>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2 mb-3">
                                        <Icon name="mdi:menu" class="text-primary" />
                                        Header Categories
                                    </label>
                                    <Select v-if="categories" label="title" :options="categories"
                                        :reduce="(item) => item.id" v-model="setting.header_category" multiple
                                        class="v-select-custom">
                                        <template v-slot:option="option">
                                            <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                                <img :src="option?.image" class="w-10 h-10 rounded-lg object-cover" />
                                                <span class="text-sm font-medium">{{ option?.title }}</span>
                                            </div>
                                        </template>
                                    </Select>
                                </div>
                            </div>

                            <div class="pt-4">
                                <button @click="onSubmit"
                                    class="px-6 py-3 bg-gradient-to-r from-primary to-primary/80 text-white font-medium rounded-lg hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 flex items-center gap-2">
                                    <Icon name="mdi:content-save" class="text-lg" />
                                    Save Home Settings
                                </button>
                            </div>
                        </div>

                        <!-- Footer Settings Tab -->
                        <div v-if="activeTab == 2" class="space-y-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">
                                        Footer Columns
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Manage footer sections and links
                                    </p>
                                </div>
                                <button @click="openModal"
                                    class="px-4 py-2.5 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition-colors duration-200 flex items-center gap-2">
                                    <Icon name="mdi:plus" class="text-lg" />
                                    Add New Column
                                </button>
                            </div>

                            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Column Title
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Order Number
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr v-for="footer in footer_columns?.data" :key="footer.id"
                                            class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="font-medium text-gray-900">
                                                    {{ footer.title }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary">
                                                    {{ footer.order_number }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <button @click="
                                                    onFooterDelete(
                                                        footer?.id
                                                    )
                                                    "
                                                    class="px-3 py-1.5 text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors duration-200 flex items-center gap-1">
                                                    <Icon name="mdi:trash-can-outline" class="text-lg" />
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>

    <!-- Footer Modal -->
    <Modal title="Add New Footer Column" :isOpen="isModalOpened" @modal-close="closeModal">
        <div class="space-y-4 p-1">
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Column Title</label>
                <input v-model="form.title" type="text"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                    placeholder="Enter column title" />
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Column Pages</label>
                <Select v-if="pages" label="title" :options="pages" :reduce="(item) => item.id" multiple
                    v-model="form.pages" class="v-select-custom" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700">Order Number</label>
                    <input v-model="form.order_number" type="number"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                        placeholder="Display order" />
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Column Content</label>
                <div class="border border-gray-300 rounded-lg overflow-hidden">
                    <SummernoteEditor v-model="form.content" />
                </div>
            </div>

            <div class="pt-4">
                <button @click="onFooterSubmit"
                    class="w-full px-6 py-3 bg-gradient-to-r from-primary to-primary/80 text-white font-medium rounded-lg hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                    <Icon name="mdi:content-save" class="text-lg" />
                    Save Footer Column
                </button>
            </div>
        </div>
    </Modal>
</template>

<style scoped>
/* Custom styles for better visual hierarchy */
.v-select-custom {
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    transition: all 0.2s;
}

.v-select-custom:focus-within {
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(var(--primary-rgb), 0.1);
}

/* Hover effects for table rows */
tbody tr {
    transition: background-color 0.2s ease;
}

/* Button hover effects */
button:hover {
    transform: translateY(-1px);
    transition: transform 0.2s;
}

/* Input focus styles */
input:focus,
textarea:focus {
    box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.1);
}
</style>
