<script setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import useAxios from "@/composables/useAxios.js";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Icon from "@/components/Icon.vue";

const { sendRequest, loading, error } = useAxios();
const route = useRoute();
const complaint = ref(null);

const getComplaint = async () => {
    const response = await sendRequest({
        method: "get",
        url: `/v1/complaint/${route.params.id}`,
    });
    if (response) {
        complaint.value = response.data?.data;
    }
};

const downloadFile = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: `/v1/complaint/${route.params.id}/download`,
            responseType: "blob",
        });

        if (response) {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement("a");
            link.href = url;

            // Extract filename or use default
            const filename = complaint.value.file
                ? complaint.value.file.split("/").pop()
                : "complaint-attachment";

            link.setAttribute("download", filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);
        }
    } catch (err) {
        console.error("Download failed", err);
    }
};

onMounted(() => {
    getComplaint();
});
</script>

<template>
    <GuestLayout>
        <section class="p-4 sm:p-6 max-w-5xl mx-auto">
            <div class="mb-6">
                <RouterLink
                    to="/admin/complaints"
                    class="inline-flex items-center gap-2 text-gray-500 hover:text-primary transition-colors mb-4"
                >
                    <Icon name="mdi:arrow-left" />
                    <span>Back to Complaints</span>
                </RouterLink>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Complaint Details
                </h1>
            </div>

            <div v-if="loading" class="text-center py-10">
                <p>Loading...</p>
            </div>

            <div
                v-else-if="complaint"
                class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden"
            >
                <!-- Header Info -->
                <div class="p-6 sm:p-8 border-b border-gray-100 bg-gray-50/50">
                    <div
                        class="flex flex-col md:flex-row md:items-start md:justify-between gap-6"
                    >
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ complaint.subject }}
                                </h3>
                                <div class="flex items-center gap-3 mt-2">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100"
                                    >
                                        {{ complaint.type }}
                                    </span>
                                    <span
                                        class="text-sm text-gray-500 flex items-center gap-1"
                                    >
                                        <Icon name="mdi:calendar" />
                                        {{
                                            new Date(
                                                complaint.created_at
                                            ).toLocaleDateString()
                                        }}
                                    </span>
                                </div>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row gap-4 sm:gap-8"
                            >
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary"
                                    >
                                        <Icon name="mdi:account" size="20" />
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">
                                            Complainant
                                        </p>
                                        <p class="font-medium text-gray-900">
                                            {{ complaint.name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary"
                                    >
                                        <Icon name="mdi:phone" size="20" />
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">
                                            Contact
                                        </p>
                                        <p class="font-medium text-gray-900">
                                            {{ complaint.phone }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    v-if="complaint.email"
                                    class="flex items-center gap-3"
                                >
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary"
                                    >
                                        <Icon name="mdi:email" size="20" />
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">
                                            Email
                                        </p>
                                        <p class="font-medium text-gray-900">
                                            {{ complaint.email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body Info -->
                <div class="p-6 sm:p-8 space-y-8">
                    <!-- Location -->
                    <div>
                        <h4
                            class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-3"
                        >
                            Location
                        </h4>
                        <div
                            class="bg-gray-50 rounded-lg p-4 border border-gray-100"
                        >
                            <p class="text-gray-700 flex items-center gap-2">
                                <Icon
                                    name="mdi:map-marker"
                                    class="text-red-500"
                                />
                                {{ complaint.location }}
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h4
                            class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-3"
                        >
                            Description
                        </h4>
                        <div
                            class="bg-gray-50 rounded-lg p-6 border border-gray-100 min-h-[100px] whitespace-pre-wrap text-gray-700 leading-relaxed"
                        >
                            {{ complaint.description }}
                        </div>
                    </div>

                    <!-- Attachment -->
                    <div v-if="complaint.file">
                        <h4
                            class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-3"
                        >
                            Attachment
                        </h4>
                        <div
                            class="flex items-center gap-4 bg-gray-50 rounded-lg p-4 border border-gray-100"
                        >
                            <div
                                class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600"
                            >
                                <Icon name="mdi:file-document" size="24" />
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    Attached Document
                                </p>
                                <p class="text-xs text-gray-500">
                                    Click download to view file
                                </p>
                            </div>
                            <button
                                @click="downloadFile"
                                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-secondary transition-colors flex items-center gap-2"
                            >
                                <Icon name="mdi:download" />
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
