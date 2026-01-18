<template>
    <AppLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-primary/30 via-white to-secondary/30 py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 2xl:py-24 overflow-hidden"
        >
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden -z-10">
                <div
                    class="absolute top-10 sm:top-20 left-4 sm:left-10 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-primary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl"
                ></div>
                <div
                    class="absolute bottom-10 sm:bottom-20 right-4 sm:right-10 w-28 h-28 sm:w-36 sm:h-36 md:w-48 md:h-48 lg:w-60 lg:h-60 bg-secondary/10 rounded-full blur-xl sm:blur-2xl md:blur-3xl"
                ></div>
            </div>

            <Container>
                <div class="text-center">
                    <span
                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                    >
                        <Icon
                            name="mdi:hand-heart"
                            class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4"
                        />
                        জাতীয় কর্মসূচি
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug"
                    >
                        বিএনপির ৩১ দফা
                    </h1>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0"
                    >
                        গণতন্ত্র পুনরুদ্ধার ও রাষ্ট্রীয় সংস্কারের রূপরেখা
                    </p>
                </div>
            </Container>
        </section>

        <!-- Policies Grid Section -->
        <section class="py-8 sm:py-10 md:py-12 lg:py-14 xl:py-16">
            <Container>
                <!-- Policies Grid -->
                <div
                    v-if="policies.length > 0"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6"
                >
                    <PolicyCard
                        v-for="(policy, index) in policies"
                        :key="policy.id"
                        :policy="{ ...policy, number: index + 1 }"
                    />
                </div>

                <!-- Loading State -->
                <div v-else class="text-center py-8 sm:py-10 md:py-12">
                    <p class="text-sm sm:text-base text-gray-600">
                        কর্মসূচি লোড হচ্ছে...
                    </p>
                </div>
            </Container>
        </section>
    </AppLayout>
</template>

<script setup>
import Container from "@/components/Container.vue";
import PolicyCard from "@/components/PolicyCard.vue";
import Icon from "@/components/Icon.vue";
import AppLayout from "@/components/AppLayout.vue";
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios.js";

const { loading, error, sendRequest } = useAxios();
const policies = ref([]);

const fetchPolicies = async () => {
    const response = await sendRequest({
        method: "get",
        url: "/frontend/v1/get-policies",
    });
    if (response?.data?.data) {
        policies.value = response.data.data.filter(
            (p) => p.type == "thirtyone"
        );
    }
};

onMounted(() => {
    fetchPolicies();
});
</script>
