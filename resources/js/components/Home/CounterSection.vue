<template>
    <section class="relative overflow-hidden py-8 sm:py-10 md:py-12">
        <Container>
            <!-- Stats Summary -->
            <div
                class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 lg:p-10 xl:p-12 text-center"
            >
                <h3
                    class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-4 sm:mb-5 md:mb-6"
                >
                    আমাদের সামগ্রিক প্রভাব
                </h3>
                <div
                    class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-5 lg:gap-6"
                >
                    <div
                        v-for="(counter, index) in counters"
                        :key="counter.id"
                        class="text-center px-1 sm:px-2"
                    >
                        <div
                            class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-1 sm:mb-2 flex items-center justify-center gap-1"
                            :class="
                                index % 2 == 0
                                    ? 'text-primary'
                                    : 'text-secondary'
                            "
                        >
                            <span
                                ref="counterElements"
                                :data-target="counter.number"
                            >
                                0
                            </span>
                            <span>{{ counter.number_icon }}</span>
                        </div>
                        <p
                            class="text-xs sm:text-sm md:text-base text-gray-600 leading-tight"
                        >
                            {{ counter.title }}
                        </p>
                    </div>
                </div>
            </div>
        </Container>
    </section>
</template>

<script setup>
import Container from "@/components/Container.vue";
import { ref, onMounted, nextTick } from "vue";
import useAxios from "@/composables/useAxios.js";

const { error, loading, sendRequest } = useAxios();
const counters = ref([]);
const counterElements = ref([]);

const fetchCounters = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-counters",
        });
        counters.value = response?.data?.data || [];
        await nextTick(); // Wait for DOM update
        setupObserver();
    } catch (err) {
        console.error("Error fetching counters:", err);
        error.value = err.message || "কাউন্টারগুলো লোড করতে ব্যর্থ হয়েছে";
    }
};

const animateCounter = (element, target, duration = 2000) => {
    if (!element) return;

    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target.toLocaleString("bn-BD");
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current).toLocaleString("bn-BD");
        }
    }, 16);
};

const setupObserver = () => {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const target = parseInt(
                        entry.target.getAttribute("data-target")
                    );
                    animateCounter(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.3 }
    );

    if (counterElements.value) {
        counterElements.value.forEach((el) => {
            if (el) observer.observe(el);
        });
    }
};

onMounted(() => {
    fetchCounters();
});
</script>

<style scoped>
/* Keep existing styles */
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* Responsive adjustments for counter animation speed */
@media (max-width: 640px) {
    .text-2xl,
    .text-3xl,
    .text-4xl,
    .text-5xl {
        letter-spacing: -0.025em;
    }
}

@media (min-width: 641px) and (max-width: 1024px) {
    .text-2xl,
    .text-3xl,
    .text-4xl,
    .text-5xl {
        letter-spacing: -0.025em;
    }
}
</style>
