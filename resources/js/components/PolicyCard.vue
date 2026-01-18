<template>
    <div class="bg-white rounded-lg sm:rounded-xl border border-gray-200 p-4 sm:p-5 md:p-6 hover:border-primary/30 transition-colors duration-200 h-full flex flex-col items-center text-center lg:text-start">
        <!-- Number and Icon Box -->
        <div class="flex items-center justify-center lg:justify-start w-full mb-3 sm:mb-4">
            <!-- Policy Number -->
            <div class="flex items-center gap-2 sm:gap-3">
                <div class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                    <span class="text-primary font-bold text-base sm:text-lg md:text-xl">{{ number }}</span>
                </div>
            </div>
        </div>
        
        <!-- Policy Title -->
        <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-900 mb-2 sm:mb-3 w-full px-2 sm:px-0">
            {{ policy.title }}
        </h3>
        
        <!-- Policy Description -->
        <p class="text-sm sm:text-base text-gray-600 leading-relaxed w-full px-2 sm:px-0">
            {{ policy.description }}
        </p>
    </div>
</template>

<script setup>
import Icon from "@/components/Icon.vue";
import { defineProps, computed } from "vue";

const props = defineProps({
    policy: {
        type: Object,
        required: true
    }
});

const number = computed(() => {
    return props.policy.number?.toString().padStart(2, '0') || '০১';
});
</script>