<script setup>
import { inject, ref } from "vue";
const data = inject("data");
const truncateText = (text, maxLength = 40) => {
    if (!text) return "";
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength) + "...";
};

// Helper function to format date
const formatDate = (dateString) => {
    if (!dateString) return "";

    const date = new Date(dateString);
    const now = new Date();
    const diffTime = Math.abs(now - date);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    // If within 7 days, show relative time
    if (diffDays <= 7) {
        if (diffDays == 1) return "গতকাল";
        if (diffDays == 0) return "আজ";
        return `${diffDays} দিন আগে`;
    }

    // Otherwise show formatted date
    const options = {
        day: "numeric",
        month: "long",
        year: "numeric",
    };
    return date.toLocaleDateString("bn-BD", options);
};

</script>

<template>
    <header
        class="hidden lg:block bg-white/90 backdrop-blur-md shadow-md sticky top-0 z-50 transition-all duration-300">
        <Container>
            <div
                class="relative flex flex-col lg:flex-row lg:items-center justify-between py-4 lg:py-5 space-y-4 lg:space-y-0">
                <!-- Left: Name and Title -->
                <RouterLink to="/"
                    class="hidden lg:flex flex-col group items-center lg:items-start text-center lg:text-left">
                    <h1
                        class="text-2xl lg:text-3xl font-bold text-primary group-hover:text-secondary transition-colors duration-300">
                        তানভীর আহমেদ রবিন
                    </h1>
                    <p class="text-black/70 text-sm font-medium mt-1 tracking-wide">
                        রাজনৈতিক নেতা ও জনসেবক
                    </p>
                </RouterLink>

                <!-- Navigation Links -->
                <nav class="hidden lg:flex items-center justify-center space-x-8">
                    <ul class="flex items-center space-x-8">
                        <li class="relative group h-full flex items-center">
                            <RouterLink to="/"
                                class="text-gray-800 text-base font-semibold hover:text-primary whitespace-nowrap transition-colors duration-200 py-3 relative group-hover:text-primary flex items-center gap-1">
                                হোম
                            </RouterLink>
                        </li>

                        <li class="relative group h-full flex items-center">
                            <RouterLink to="/about"
                                class="text-gray-800 text-base font-semibold hover:text-primary whitespace-nowrap transition-colors duration-200 py-3 relative group-hover:text-primary flex items-center gap-1">
                                পরিচিতি
                            </RouterLink>
                        </li>

                        <!-- Activities with Mega Menu -->
                        <li class="relative group h-full flex items-center">
                            <RouterLink to="/service"
                                class="text-gray-800 text-base font-semibold hover:text-primary whitespace-nowrap transition-colors duration-200 py-3 relative group-hover:text-primary flex items-center gap-1">
                                কার্যক্রম
                                <Icon name="mdi:chevron-down"
                                    class="text-lg transition-transform duration-200 group-hover:rotate-180" />
                            </RouterLink>

                            <!-- Mega Menu Dropdown -->
                            <div
                                class="absolute top-full left-1/2 -translate-x-1/2 w-[900px] opacity-0 invisible transition-all duration-300 transform translate-y-2 z-50 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                                <!-- Transparent Bridge -->
                                <div class="h-4 w-full"></div>

                                <div class="bg-white rounded-xl shadow-xl border border-gray-100 p-6">
                                    <div class="grid grid-cols-3 gap-8">
                                        <!-- Social Work Column -->
                                        <div v-for="category in data?.header_category" :key="category.id">
                                            <h3
                                                class="text-primary font-bold text-lg mb-4 border-b border-gray-100 pb-2">
                                                {{ category?.title }}
                                            </h3>
                                            <ul class="space-y-3">
                                                <li v-for="service in category?.services" :key="service.id"
                                                    class="group">
                                                    <RouterLink :to="service?.slug
                                                        ? `/services/${service.slug}`
                                                        : '/education-support'
                                                        "
                                                        class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-all duration-200 text-gray-600 hover:text-secondary group-hover:shadow-sm">
                                                        <!-- Service Image -->
                                                        <div class="flex-shrink-0 relative">
                                                            <div v-if="
                                                                service?.image
                                                            " class="w-14 h-14 rounded-lg overflow-hidden bg-gray-100">
                                                                <img :src="service.image
                                                                    " :alt="service.title
                                                                        "
                                                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                                                                <div
                                                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                                                                </div>
                                                            </div>
                                                            <div v-else
                                                                class="w-14 h-14 rounded-lg bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                                                                <Icon name="mdi:folder-heart"
                                                                    class="text-primary text-xl" />
                                                            </div>

                                                            <!-- Status Badge -->
                                                            <div v-if="
                                                                service?.is_featured
                                                            "
                                                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full leading-none">
                                                                ★
                                                            </div>
                                                        </div>

                                                        <!-- Service Details -->
                                                        <div class="flex-1 min-w-0">
                                                            <!-- Truncated Title -->
                                                            <h4
                                                                class="font-semibold text-gray-900 mb-1 leading-tight line-clamp-2 group-hover:text-secondary transition-colors duration-200">
                                                                {{
                                                                    truncateText(
                                                                        service?.title,
                                                                        40
                                                                    )
                                                                }}
                                                            </h4>

                                                            <!-- Created Date -->
                                                            <div
                                                                class="flex items-center gap-2 text-xs text-gray-500 mt-2">
                                                                <Icon name="mdi:calendar-clock"
                                                                    class="text-gray-400 flex-shrink-0" />
                                                                <span class="flex-shrink-0">
                                                                    {{
                                                                        formatDate(
                                                                            service?.created_at
                                                                        )
                                                                    }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </RouterLink>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="relative group h-full flex items-center">
                            <RouterLink to="/vision"
                                class="text-gray-800 text-base font-semibold hover:text-primary whitespace-nowrap transition-colors duration-200 py-3 relative group-hover:text-primary flex items-center gap-1">
                                কর্মপরিকল্পনা
                            </RouterLink>
                        </li>

                        <!-- Activities with Mega Menu -->
                        <li class="relative group h-full flex items-center">
                            <div
                                class="text-gray-800 text-base font-semibold hover:text-primary whitespace-nowrap transition-colors duration-200 py-3 relative group-hover:text-primary flex items-center gap-1">
                                পলিসি
                                <Icon name="mdi:chevron-down"
                                    class="text-lg transition-transform duration-200 group-hover:rotate-180" />
                            </div>

                            <!-- Mega Menu Dropdown -->
                            <div
                                class="absolute top-full left-1/2 -translate-x-1/2 w-[200px] opacity-0 invisible transition-all duration-300 transform translate-y-2 z-50 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                                <!-- Transparent Bridge -->
                                <div class="h-4 w-full"></div>

                                <div class="bg-white rounded-xl shadow-xl border border-gray-100 p-6">
                                    <div class="grid grid-cols-1 gap-8">
                                        <!-- Social Work Column -->
                                        <div>
                                            <ul class="space-y-3">
                                                <li>
                                                    <RouterLink to="/thirty-one-policy"
                                                        class="text-gray-600 hover:text-secondary hover:pl-2 transition-all duration-200 block text-base font-medium">
                                                        বিএনপির একত্রিশ দফা
                                                    </RouterLink>
                                                </li>
                                                <li>
                                                    <RouterLink to="/nineteen-policy"
                                                        class="text-gray-600 hover:text-secondary hover:pl-2 transition-all duration-200 block text-base font-medium">
                                                        বিএনপি'র বিশ দফা
                                                    </RouterLink>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="relative group h-full flex items-center">
                            <RouterLink to="/complaints"
                                class="text-gray-800 text-base font-semibold hover:text-primary whitespace-nowrap transition-colors duration-200 py-3 relative group-hover:text-primary flex items-center gap-1">
                                অভিযোগ
                            </RouterLink>
                        </li>


                    </ul>
                </nav>

                <!-- Right: Social Media & Contact -->
                <div class="flex items-center justify-center lg:justify-end gap-4">
                    <div
                        class="hidden xl:flex items-center space-x-3 bg-gray-50 px-4 py-2 rounded-full border border-gray-100">
                        <a :href="data?.facebook_link"
                            class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200">
                            <Icon name="mdi:facebook" class="text-2xl" />
                        </a>
                        <a :href="data?.twitter_link"
                            class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200">
                            <Icon name="mdi:twitter" class="text-2xl" />
                        </a>
                        <a :href="data?.instagram_link"
                            class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200">
                            <Icon name="mdi:instagram" class="text-2xl" />
                        </a>
                        <a :href="data?.youtube_link"
                            class="text-primary hover:text-secondary hover:scale-110 transition-all duration-200">
                            <Icon name="mdi:youtube" class="text-2xl" />
                        </a>
                    </div>
                    <RouterLink to="/contact"
                        class="flex bg-gradient-to-r from-primary to-secondary text-white text-base font-bold px-6 py-2.5 rounded-full hover:shadow-lg hover:shadow-primary/30 whitespace-nowrap transition-all duration-300 transform hover:-translate-y-0.5">
                        যোগাযোগ
                    </RouterLink>
                </div>
            </div>
        </Container>
    </header>
</template>
