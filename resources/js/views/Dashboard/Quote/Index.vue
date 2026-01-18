<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios.js";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Icon from "@/components/Icon.vue";

const { loading, error, sendRequest } = useAxios();

const quoteContent = ref([]);
const getQuoteContent = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/v1/quote",
    });

    if (response) {
        quoteContent.value = response.data?.data;
    }
};

const handelDelete = async (id) => {
    const response = await sendRequest({
        method: "delete",
        url: `/v1/quote/${id}`,
    });
    if (response) {
        await getQuoteContent();
        toast.success("Quote Deleted Successfully", {
            autoClose: 500,
            theme: "dark",
        });
    }
};

const handeleinActive = async (id) => {
    const response = await sendRequest({
        method: "get",
        url: `/v1/quote-inactive-status/${id}`,
    });
    if (response) {
        await getQuoteContent();
        toast.success("Status Update Successfully", {
            autoClose: 500,
            theme: "dark",
        });
    }
};

const handeleActive = async (id) => {
    const response = await sendRequest({
        method: "get",
        url: `/v1/quote-active-status/${id}`,
    });
    if (response) {
        await getQuoteContent();
        toast.success("Status Update Successfully", {
            autoClose: 500,
            theme: "dark",
        });
    }
};

onMounted(() => {
    getQuoteContent();
});
</script>
<template>
    <GuestLayout>
        <section class="p-4 sm:p-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                        Quotes
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">
                        Manage Quotes content
                    </p>
                </div>
                <RouterLink to="/admin/create-quote" class="w-full sm:w-auto">
                    <button
                        class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 px-4 py-3 sm:px-4 sm:py-2.5 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 w-full sm:w-auto">
                        <Icon name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
                            class="text-lg" />
                        Add New Quote
                    </button>
                </RouterLink>
            </div>

            <!-- Mobile Cards View -->
            <div class="block sm:hidden space-y-4">
                <div v-for="quote in quoteContent" :key="quote.id"
                    class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-sm truncate">
                                        {{ quote?.title }}
                                    </h3>
                                    <p class="text-gray-600 text-xs mt-1 truncate">
                                        count: {{ quote?.number }}
                                    </p>
                                    <p class="text-gray-600 text-xs mt-1 truncate">
                                         <img class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded-lg"
                                            :src="quote?.image" :alt="quote?.title">
                                    </p>
                                </div>
                                <div>
                                    <div v-if="
                                        quote?.key_features &&
                                        Array.isArray(quote.key_features) &&
                                        quote.key_features.length > 0 &&
                                        quote.key_features.some(
                                            (item) =>
                                                item &&
                                                item.quote &&
                                                item.quote.trim() != ''
                                        )
                                    " class="flex flex-col gap-1">
                                        <div v-for="(
                                            item, index
                                        ) in quote.key_features.filter(
                                            (item) => item && item.quote
                                        )" :key="index" class="text-black text-sm">
                                            • {{ item.quote }}
                                            • {{ item.year }}
                                            • {{ item.tag }}
                                        </div>
                                    </div>
                                    <div v-else class="text-gray-400 text-sm">
                                        No features
                                    </div>
                                
                                </div>
                                <div>
                                    <span v-if="quote?.status == 1"
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
                                    Order: {{ quote?.order_number }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                        <!-- Status Toggle -->
                        <button v-if="quote?.status == 1" @click="handeleinActive(quote?.id)"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-orange-600 bg-orange-50 text-orange-700 hover:bg-orange-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="flowbite:thumbs-down-solid" class="text-lg" />
                            <span>Deactivate</span>
                        </button>
                        <button v-else @click="handeleActive(quote?.id)"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="flowbite:thumbs-up-solid" class="text-lg" />
                            <span>Activate</span>
                        </button>

                        <RouterLink :to="`/admin/edit-quote/${quote?.id}`"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm font-medium">
                            <Icon name="material-symbols:edit-square-outline-rounded" class="text-lg" />
                            <span>Edit</span>
                        </RouterLink>

                        <button @click="handelDelete(quote?.id)"
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
                                <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Sub Title
                                </th>
                               
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Order
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3.5 font-medium">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="quote in quoteContent" :key="quote.id"
                                class="hover:bg-gray-50/50 transition-colors">
                                <!-- Image -->
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">
                                        <img class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded-lg"
                                            :src="quote?.image" :alt="quote?.title">
                                    </div>
                                </td>
                                <!-- Number -->
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">
                                        {{ quote?.title }}
                                    </div>
                                </td>

                                <!-- Title -->
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900 max-w-[150px] truncate">
                                        {{ quote?.sub_title }}
                                    </div>
                                </td>

                                <!-- Order Number -->
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 bg-primary/10 text-primary font-medium rounded-lg">
                                        {{ quote?.order_number }}
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <div v-if="quote?.status == 1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                            Active
                                        </span>
                                    </div>
                                    <div v-else>
                                        <span
                                            class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">
                                            Inactive
                                        </span>
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- Status Toggle -->
                                        <div v-if="quote?.status == 1">
                                            <button @click="
                                                handeleinActive(quote?.id)
                                                "
                                                class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-orange-600 bg-orange-50 text-orange-700 hover:bg-orange-600 hover:text-white transition-colors text-sm"
                                                title="Deactivate">
                                                <Icon name="flowbite:thumbs-down-solid" />
                                            </button>
                                        </div>
                                        <div v-else>
                                            <button @click="
                                                handeleActive(quote?.id)
                                                "
                                                class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-green-600 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-colors text-sm"
                                                title="Activate">
                                                <Icon name="flowbite:thumbs-up-solid" />
                                            </button>
                                        </div>

                                        <!-- Edit -->
                                        <RouterLink :to="`/admin/edit-quote/${quote?.id}`"
                                            class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm">
                                            <Icon name="material-symbols:edit-square-outline-rounded" />
                                            <span>Edit</span>
                                        </RouterLink>

                                        <!-- Delete -->
                                        <button @click="handelDelete(quote?.id)"
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
