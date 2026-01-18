<script setup>
import HeroSection from "@/components/Home/HeroSection.vue";
import FeaturesSection from "@/components/Home/FeaturesSection.vue";
import HelpsSection from "@/components/Home/HelpsSection.vue";
import CounterSection from "@/components/Home/CounterSection.vue";
import ServiceSection from "@/components/Home/ServiceSection.vue";
import QuoteSection from "@/components/Home/QuoteSection.vue";
import CallToActionSection from "@/components/Home/CallToActionSection.vue";
import Container from "@/components/Container.vue";
import AppLayout from "@/components/AppLayout.vue";

import useAxios from "@/composables/useAxios.js";
import { inject, ref, onMounted } from "vue";

const { loading, error, sendRequest } = useAxios();
const allData = ref([]);

const fetchHeroData = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/hero-section",
        });
        allData.value = response?.data?.data || [];
    } catch (error) {
        console.error("Error fetching Packages:", error);
    }
};

onMounted(() => {
    fetchHeroData();
});
</script>

<template>
    <AppLayout>
        <HeroSection :allData="allData" />
        <CounterSection />
        <FeaturesSection />
        <HelpsSection />
        <ServiceSection />
        <QuoteSection />
        <CallToActionSection />
        
    </AppLayout>
</template>
