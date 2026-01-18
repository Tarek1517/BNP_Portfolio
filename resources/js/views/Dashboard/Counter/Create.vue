<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import { useRouter } from "vue-router";

const { loading, error, sendRequest } = useAxios();
const router = useRouter();

const form = ref({
    number: null,
    title: null,
    number_icon: null,
    order_number: null,
    status: 0,
});

// Save Counter
const onSubmit = async () => {
    const response = await sendRequest({
        method: "post",
        url: "v1/counter",
        data: form.value,
    });
    if (response?.data) {
        toast.success("Counter Added Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/counter");
    }
};
</script>

<template>
    <GuestLayout>
        <div class="p-4 sm:p-6 bg-white shadow-md max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <h2
                    class="text-xl sm:text-2xl font-semibold text-primary text-center"
                >
                    Add Counter
                </h2>
                <p class="text-gray-500 text-sm text-center mt-1">
                    Create a new counter
                </p>
            </div>

            <!-- Form -->
            <div class="flex flex-wrap -mx-2">
                <!-- Number -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="number"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Number</label
                        >
                        <input
                            type="number"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.number"
                            placeholder="Enter counter number"
                        />
                    </div>
                </div>

                <!-- Title -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="title"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Title</label
                        >
                        <input
                            type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.title"
                            placeholder="Enter counter title"
                        />
                    </div>
                </div>

                <!-- Number Icon -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="number_icon"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Icon Class</label
                        >
                        <input
                            type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.number_icon"
                            placeholder="e.g., fas fa-users, mdi-account, etc."
                        />
                        <p class="text-xs text-gray-500 mt-1">
                            Enter icon class name (Font Awesome, Material Icons,
                            etc.)
                        </p>
                    </div>
                </div>

                <!-- Order Number -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="order_number"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Order Number</label
                        >
                        <input
                            type="number"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.order_number"
                            placeholder="Enter display order"
                        />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="w-full mt-4 sm:mt-5 px-2">
                    <button
                        class="w-full px-4 sm:px-6 py-3.5 bg-primary hover:bg-primary/90 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center gap-2"
                        @click="onSubmit"
                        :disabled="loading"
                    >
                        <Icon name="mdi:content-save" class="text-lg" />
                        {{ loading ? "Saving..." : "Save Counter" }}
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
