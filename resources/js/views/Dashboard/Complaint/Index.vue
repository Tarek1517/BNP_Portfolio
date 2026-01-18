<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios.js";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Icon from "@/components/Icon.vue";

const { loading, error, sendRequest } = useAxios();

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
    getComplaints();
});
</script>
<template>
    <GuestLayout>
        <section class="p-4 sm:p-6">
            <!-- Header -->
            <div
                class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4"
            >
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                        Complaints
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">
                        View and manage public complaints
                    </p>
                </div>
            </div>

            <!-- Mobile Cards View -->
            <div class="block sm:hidden space-y-4">
                <div
                    v-for="item in complaints?.data"
                    :key="item.id"
                    class="bg-white rounded-xl border border-gray-200 shadow-sm p-4"
                >
                    <div class="space-y-3 mb-4">
                        <!-- Sender Info -->
                        <div class="flex items-start gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0"
                            >
                                <Icon
                                    name="mdi:account"
                                    class="text-primary text-lg"
                                />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="font-semibold text-gray-900 text-sm truncate"
                                >
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
                                class="inline-block mt-1 px-2 py-0.5 bg-gray-200 text-gray-700 text-xs rounded"
                            >
                                {{ item?.type }}
                            </span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div
                        class="flex items-center gap-2 pt-4 border-t border-gray-100"
                    >
                        <RouterLink
                            :to="`/admin/complaint-details/${item?.id}`"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm font-medium"
                        >
                            <Icon
                                name="material-symbols:eye-tracking-sharp"
                                class="text-lg"
                            />
                            <span>Details</span>
                        </RouterLink>
                        <button
                            @click="handleDelete(item?.id)"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm font-medium"
                        >
                            <Icon
                                name="material-symbols-light:delete-outline-sharp"
                                class="text-lg"
                            />
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Desktop Table View -->
            <div
                class="hidden sm:block bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden"
            >
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200"
                        >
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
                            <tr
                                v-for="item in complaints?.data"
                                :key="item.id"
                                class="hover:bg-gray-50/50 transition-colors"
                            >
                                <!-- Name -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center"
                                        >
                                            <Icon
                                                name="mdi:account"
                                                class="text-primary text-sm"
                                            />
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
                                        class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded-full truncate"
                                    >
                                        {{ item?.type }}
                                    </span>
                                </td>

                                <!-- Subject -->
                                <td class="px-6 py-4 max-w-[250px]">
                                    <div
                                        class="truncate font-medium text-gray-800"
                                    >
                                        {{ item?.subject }}
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <RouterLink
                                            :to="`/admin/complaint-details/${item?.id}`"
                                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-blue-600 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors text-sm"
                                        >
                                            <Icon
                                                name="material-symbols:eye-tracking-sharp"
                                                class="text-lg"
                                            />
                                            <span>Details</span>
                                        </RouterLink>
                                        <button
                                            @click="handleDelete(item?.id)"
                                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-red-600 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white transition-colors text-sm"
                                        >
                                            <Icon
                                                name="material-symbols-light:delete-outline-sharp"
                                                class="text-lg"
                                            />
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
