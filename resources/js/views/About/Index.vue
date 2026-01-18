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
                            name="mdi:message-text"
                            class="text-primary animate-pulse w-3 h-3 sm:w-4 sm:h-4"
                        />
                        আমার সম্পর্কে
                    </span>
                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4 leading-tight sm:leading-snug"
                    >
                        {{ currentAbout?.name }}
                    </h1>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-3xl mx-auto px-4 sm:px-0"
                    >
                        {{ currentAbout?.bio || "রাজনৈতিক নেতা ও জনসেবক" }}
                    </p>
                </div>
            </Container>
        </section>

        <!-- Personal Information Section -->
        <section class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 bg-white">
            <Container>
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 sm:gap-10 md:gap-12 lg:gap-14"
                >
                    <!-- Left Column - Personal Information -->
                    <div class="order-2 lg:order-1">
                        <span
                            class="inline-block bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                        >
                            ব্যক্তিগত তথ্য
                        </span>
                        <h2
                            class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6 sm:mb-8"
                        >
                            {{ currentAbout?.name }}
                        </h2>

                        <div class="space-y-4 sm:space-y-5 md:space-y-6">
                            <div
                                class="flex items-start space-x-3 sm:space-x-4"
                            >
                                <div
                                    class="bg-primary/10 p-2.5 sm:p-3 rounded-lg flex-shrink-0"
                                >
                                    <Icon
                                        name="mdi:cake-variant"
                                        class="text-primary text-lg sm:text-xl"
                                    />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-gray-900"
                                    >
                                        জন্ম তারিখ
                                    </h3>
                                    <p
                                        class="text-sm sm:text-base text-gray-600"
                                    >
                                        {{ currentAbout?.birth_date }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="flex items-start space-x-3 sm:space-x-4"
                            >
                                <div
                                    class="bg-primary/10 p-2.5 sm:p-3 rounded-lg flex-shrink-0"
                                >
                                    <Icon
                                        name="mdi:map-marker"
                                        class="text-primary text-lg sm:text-xl"
                                    />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-gray-900"
                                    >
                                        জন্মস্থান
                                    </h3>
                                    <p
                                        class="text-sm sm:text-base text-gray-600"
                                    >
                                        {{ currentAbout?.birth_place }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="flex items-start space-x-3 sm:space-x-4"
                            >
                                <div
                                    class="bg-primary/10 p-2.5 sm:p-3 rounded-lg flex-shrink-0"
                                >
                                    <Icon
                                        name="mdi:human-male-height"
                                        class="text-primary text-lg sm:text-xl"
                                    />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-gray-900"
                                    >
                                        উচ্চতা
                                    </h3>
                                    <p
                                        class="text-sm sm:text-base text-gray-600"
                                    >
                                        {{ currentAbout?.height }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="flex items-start space-x-3 sm:space-x-4"
                            >
                                <div
                                    class="bg-primary/10 p-2.5 sm:p-3 rounded-lg flex-shrink-0"
                                >
                                    <Icon
                                        name="mdi:school"
                                        class="text-primary text-lg sm:text-xl"
                                    />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-gray-900"
                                    >
                                        শিক্ষাগত যোগ্যতা
                                    </h3>
                                    <p
                                        class="text-sm sm:text-base text-gray-600"
                                    >
                                        {{ currentAbout?.education }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Profile Image -->
                    <div class="relative order-1 lg:order-2">
                        <div class="relative lg:w-4/5 mx-auto">
                            <!-- Decorative Elements -->
                            <div
                                class="absolute -top-4 -left-4 sm:-top-5 sm:-left-5 md:-top-6 md:-left-6 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-primary/10 rounded-full blur-lg sm:blur-xl"
                            ></div>
                            <div
                                class="absolute -bottom-4 -right-4 sm:-bottom-5 sm:-right-5 md:-bottom-6 md:-right-6 w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 bg-secondary/10 rounded-full blur-lg sm:blur-xl"
                            ></div>

                            <!-- Main Image -->
                            <div
                                class="relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg sm:shadow-xl lg:shadow-2xl"
                            >
                                <img
                                    :src="currentAbout?.image"
                                    :alt="currentAbout?.name"
                                    class="w-full h-auto object-cover transform transition-transform duration-300 hover:scale-105"
                                    loading="lazy"
                                />

                                <!-- Image Border Effect -->
                                <div
                                    class="absolute inset-0 border-2 sm:border-3 lg:border-4 border-white/20 rounded-xl sm:rounded-2xl pointer-events-none"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 sm:mt-10 md:mt-12 lg:mt-14 xl:mt-16">
                    <p
                        class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-900 mb-6 sm:mb-8 leading-relaxed"
                    >
                        {{ currentAbout?.description }}
                    </p>
                </div>
            </Container>
        </section>

        <!-- Enhanced Career & Honors Roadmap Section -->
        <section
            class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 bg-gradient-to-b from-white to-gray-50/50"
        >
            <Container>
                <!-- Section Header -->
                <div
                    class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-14 xl:mb-16"
                >
                    <span
                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                    >
                        <Icon
                            name="mdi:timeline-check"
                            class="text-primary w-3 h-3 sm:w-4 sm:h-4"
                        />
                        ক্যারিয়ার ও সম্মাননা
                    </span>
                    <h2
                        class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 sm:mb-4"
                    >
                        আমার যাত্রাপথ
                    </h2>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl mx-auto px-4 sm:px-0"
                    >
                        রাজনৈতিক জীবন ও জনসেবার দীর্ঘ যাত্রার উল্লেখযোগ্য
                        অর্জনসমূহ
                    </p>
                </div>

                <!-- Enhanced Roadmap Timeline -->
                <div class="relative max-w-6xl mx-auto">
                    <!-- Main Timeline Line -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 sm:w-1 bg-gradient-to-b from-primary via-secondary to-primary hidden lg:block"
                    ></div>

                    <!-- Timeline Items Container -->
                    <div class="relative">
                        <!-- Dynamic Loop -->
                        <div
                            v-for="(item, index) in currentAbout?.key_features"
                            :key="index"
                            class="flex flex-col lg:flex-row items-center lg:items-start mb-8 sm:mb-10 md:mb-12 lg:mb-16 xl:mb-20"
                        >
                            <!-- Left Side (Desktop) -->
                            <div
                                class="w-full lg:w-1/2 lg:pr-8 xl:pr-12"
                                :class="{ 'hidden lg:block': index % 2 != 0 }"
                            >
                                <div
                                    v-if="index % 2 == 0"
                                    class="lg:text-right relative lg:mr-6 lg:-mt-2 xl:mr-8"
                                >
                                    <!-- Year Badge -->
                                    <div
                                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                                    >
                                        <span>{{ item.year }}</span>
                                        <Icon
                                            :name="
                                                item.icon ||
                                                'mdi:account-tie-hat'
                                            "
                                            class="text-primary w-3 h-3 sm:w-4 sm:h-4"
                                        />
                                    </div>
                                    <!-- Content Card -->
                                    <div
                                        class="bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg border border-gray-100 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 transition-all duration-300 hover:shadow-lg sm:hover:shadow-xl"
                                    >
                                        <h3
                                            class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3"
                                        >
                                            {{ item.title }}
                                        </h3>
                                        <p
                                            class="text-sm sm:text-base text-gray-600 leading-relaxed"
                                        >
                                            {{ item.short_description }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Timeline Node -->
                            <div
                                class="hidden lg:flex items-center justify-center w-10 h-10 xl:w-12 xl:h-12 bg-white rounded-full border-3 xl:border-4 shadow-md xl:shadow-lg z-10 relative"
                                :class="{
                                    'border-primary': index % 2 == 0,
                                    'border-secondary': index % 2 != 0,
                                    'border-gradient-to-r from-primary to-secondary':
                                        item.is_current,
                                }"
                            >
                                <div
                                    class="w-3 h-3 xl:w-4 xl:h-4 rounded-full animate-pulse"
                                    :class="{
                                        'bg-primary': index % 2 == 0,
                                        'bg-secondary': index % 2 != 0,
                                        'bg-gradient-to-r from-primary to-secondary':
                                            item.is_current,
                                    }"
                                ></div>
                                <div
                                    v-if="item.is_current"
                                    class="absolute inset-0 rounded-full border-3 xl:border-4 border-white/50"
                                ></div>
                            </div>

                            <!-- Right Side (Desktop) -->
                            <div
                                class="w-full lg:w-1/2 lg:pl-8 xl:pl-12"
                                :class="{ 'hidden lg:block': index % 2 == 0 }"
                            >
                                <div
                                    v-if="index % 2 != 0"
                                    class="lg:text-left relative lg:ml-6 lg:-mt-2 xl:ml-8"
                                >
                                    <!-- Year Badge -->
                                    <div
                                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-secondary/10 text-secondary px-3 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                                        :class="{
                                            'bg-gradient-to-r from-primary/20 to-secondary/20 text-primary':
                                                item.is_current,
                                            'bg-secondary/10 text-secondary':
                                                !item.is_current,
                                        }"
                                    >
                                        <Icon
                                            :name="
                                                item.icon || 'mdi:star-shooting'
                                            "
                                            :class="{
                                                'text-primary': item.is_current,
                                                'text-secondary':
                                                    !item.is_current,
                                            }"
                                            class="w-3 h-3 sm:w-4 sm:h-4"
                                        />
                                        <span>{{ item.year }}</span>
                                    </div>
                                    <!-- Content Card -->
                                    <div
                                        class="bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg border border-gray-100 transform hover:-translate-y-0.5 sm:hover:-translate-y-1 transition-all duration-300 hover:shadow-lg sm:hover:shadow-xl"
                                        :class="{
                                            'bg-gradient-to-br from-white to-primary/5 border-primary/20':
                                                item.is_current,
                                            'border-gray-100': !item.is_current,
                                        }"
                                    >
                                        <h3
                                            class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3"
                                        >
                                            {{ item.title }}
                                        </h3>
                                        <p
                                            class="text-sm sm:text-base text-gray-600 leading-relaxed"
                                        >
                                            {{ item.short_description }}
                                        </p>
                                        <div
                                            v-if="item.is_current"
                                            class="mt-3 sm:mt-4 flex items-center gap-1.5 sm:gap-2 text-primary font-semibold text-sm sm:text-base"
                                        >
                                            <Icon
                                                name="mdi:progress-check"
                                                class="animate-pulse w-4 h-4 sm:w-5 sm:h-5"
                                            />
                                            <span>চলমান যাত্রা</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile View -->
                            <div class="lg:hidden mt-4 sm:mt-5 md:mt-6 w-full">
                                <div
                                    class="relative flex items-start space-x-3 sm:space-x-4 before:absolute before:left-6 sm:before:left-7 before:top-0 before:bottom-0 before:w-0.5 before:bg-gradient-to-b before:to-transparent"
                                    :class="{
                                        'before:from-primary':
                                            index % 2 == 0 && !item.is_current,
                                        'before:from-secondary':
                                            index % 2 != 0 && !item.is_current,
                                        'before:from-primary before:via-secondary':
                                            item.is_current,
                                    }"
                                >
                                    <div
                                        class="flex-shrink-0 bg-white rounded-full border-3 shadow-md flex items-center justify-center relative"
                                        :class="{
                                            'w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 border-primary':
                                                index % 2 == 0 &&
                                                !item.is_current,
                                            'w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 border-secondary':
                                                index % 2 != 0 &&
                                                !item.is_current,
                                            'w-12 h-12 sm:w-13 sm:h-13 md:w-14 md:h-14 border-gradient-to-r from-primary to-secondary shadow-lg shadow-primary/30':
                                                item.is_current,
                                        }"
                                    >
                                        <div
                                            class="rounded-full animate-pulse"
                                            :class="{
                                                'w-3 h-3 sm:w-4 sm:h-4 bg-primary':
                                                    index % 2 == 0 &&
                                                    !item.is_current,
                                                'w-3 h-3 sm:w-4 sm:h-4 bg-secondary':
                                                    index % 2 != 0 &&
                                                    !item.is_current,
                                                'w-4 h-4 sm:w-5 sm:h-5 bg-gradient-to-r from-primary to-secondary':
                                                    item.is_current,
                                            }"
                                        ></div>
                                        <div
                                            v-if="item.is_current"
                                            class="absolute inset-0 rounded-full border-3 border-white/50"
                                        ></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <!-- Year Badge -->
                                        <div
                                            class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                                            :class="{
                                                'bg-primary/10 text-primary':
                                                    index % 2 == 0 &&
                                                    !item.is_current,
                                                'bg-secondary/10 text-secondary':
                                                    index % 2 != 0 &&
                                                    !item.is_current,
                                                'bg-gradient-to-r from-primary/20 to-secondary/20 text-primary':
                                                    item.is_current,
                                            }"
                                        >
                                            <Icon
                                                :name="
                                                    item.icon ||
                                                    'mdi:account-tie-hat'
                                                "
                                                :class="{
                                                    'text-primary':
                                                        index % 2 == 0 ||
                                                        item.is_current,
                                                    'text-secondary':
                                                        index % 2 != 0 &&
                                                        !item.is_current,
                                                }"
                                                class="w-3 h-3 sm:w-4 sm:h-4"
                                            />
                                            <span>{{ item.year }}</span>
                                        </div>
                                        <!-- Content Card -->
                                        <div
                                            class="bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg border"
                                            :class="{
                                                'bg-gradient-to-br from-white to-primary/5 border-primary/20':
                                                    item.is_current,
                                                'border-gray-100':
                                                    !item.is_current,
                                            }"
                                        >
                                            <h3
                                                class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3"
                                            >
                                                {{ item.title }}
                                            </h3>
                                            <p
                                                class="text-sm sm:text-base text-gray-600 leading-relaxed"
                                            >
                                                {{ item.short_description }}
                                            </p>
                                            <div
                                                v-if="item.is_current"
                                                class="mt-3 sm:mt-4 flex items-center gap-1.5 sm:gap-2 text-primary font-semibold text-sm sm:text-base"
                                            >
                                                <Icon
                                                    name="mdi:progress-check"
                                                    class="animate-pulse w-4 h-4 sm:w-5 sm:h-5"
                                                />
                                                <span>চলমান যাত্রা</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Container>
        </section>

        <section
            class="py-10 sm:py-12 md:py-14 lg:py-16 xl:py-20 relative overflow-hidden bg-gradient-to-b from-gray-50/50 to-white"
        >
            <Container>
                <!-- Section Header -->
                <div
                    class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-14 xl:mb-16"
                >
                    <span
                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-primary/10 text-primary px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4"
                    >
                        <Icon
                            name="mdi:trophy-award"
                            class="text-primary w-3 h-3 sm:w-4 sm:h-4"
                        />
                        ব্যক্তিগত অর্জন
                    </span>
                    <h2
                        class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 sm:mb-4"
                    >
                        আমার অর্জনসমূহ
                    </h2>
                    <p
                        class="text-sm sm:text-base md:text-lg text-gray-600 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-2xl mx-auto px-4 sm:px-0"
                    >
                        জনসেবা ও রাজনৈতিক জীবনে অর্জিত সাফল্যের সংখ্যাগত
                        প্রতিফলন
                    </p>
                </div>

                <!-- Main Counter Section -->
                <div class="relative">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 -z-10">
                        <div
                            class="absolute top-0 left-0 w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 xl:w-64 xl:h-64 bg-primary/5 rounded-full blur-xl sm:blur-2xl md:blur-3xl"
                        ></div>
                        <div
                            class="absolute bottom-0 right-0 w-40 h-40 sm:w-48 sm:h-48 md:w-56 md:h-56 lg:w-64 lg:h-64 xl:w-72 xl:h-72 bg-secondary/5 rounded-full blur-xl sm:blur-2xl md:blur-3xl"
                        ></div>
                    </div>

                    <!-- Counter Grid -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6 lg:gap-8"
                    >
                        <!-- Achievement 1 -->
                        <div
                            class="group relative bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 shadow-md sm:shadow-lg border border-gray-100 hover:border-primary/30 transition-all duration-300 hover:shadow-lg sm:hover:shadow-xl hover:-translate-y-1 sm:hover:-translate-y-2 overflow-hidden"
                        >
                            <!-- Animated Background -->
                            <div
                                class="absolute top-0 right-0 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-primary/5 rounded-full -translate-y-8 sm:-translate-y-10 translate-x-8 sm:translate-x-10 group-hover:scale-125 sm:group-hover:scale-150 transition-all duration-700"
                            ></div>

                            <!-- Counter -->
                            <div class="relative z-10">
                                <div
                                    class="flex items-center justify-center mb-3 sm:mb-4"
                                >
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-primary/10 rounded-xl sm:rounded-2xl flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300"
                                    >
                                        <Icon
                                            name="mdi:account-group"
                                            class="text-primary text-xl sm:text-2xl"
                                        />
                                    </div>
                                </div>
                                <div class="text-center mb-2 sm:mb-3">
                                    <div
                                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-1 sm:mb-2"
                                    >
                                        <span
                                            ref="counter1"
                                            class="inline-block"
                                            >0</span
                                        >+
                                    </div>
                                    <div
                                        class="flex items-center justify-center gap-1.5 sm:gap-2 text-xs sm:text-sm text-gray-500"
                                    >
                                        <Icon
                                            name="mdi:trending-up"
                                            class="text-green-500 text-base sm:text-lg"
                                        />
                                        <span
                                            class="font-semibold text-green-600"
                                            >+15%</span
                                        >
                                        <span>গত বছরে</span>
                                    </div>
                                </div>
                                <p
                                    class="text-center text-gray-700 font-semibold text-sm sm:text-base"
                                >
                                    সরাসরি সুবিধাভোগী
                                </p>
                                <p
                                    class="text-center text-xs sm:text-sm text-gray-500 mt-1.5 sm:mt-2"
                                >
                                    জনগনের সেবায় প্রত্যক্ষ অবদান
                                </p>
                            </div>
                        </div>

                        <!-- Achievement 2 -->
                        <div
                            class="group relative bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 shadow-md sm:shadow-lg border border-gray-100 hover:border-secondary/30 transition-all duration-300 hover:shadow-lg sm:hover:shadow-xl hover:-translate-y-1 sm:hover:-translate-y-2 overflow-hidden"
                        >
                            <!-- Animated Background -->
                            <div
                                class="absolute bottom-0 left-0 w-14 h-14 sm:w-16 sm:h-16 md:w-18 md:h-18 lg:w-20 lg:h-20 bg-secondary/5 rounded-full translate-y-7 sm:translate-y-8 -translate-x-7 sm:-translate-x-8 group-hover:scale-125 sm:group-hover:scale-150 transition-all duration-700"
                            ></div>

                            <!-- Counter -->
                            <div class="relative z-10">
                                <div
                                    class="flex items-center justify-center mb-3 sm:mb-4"
                                >
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-secondary/10 rounded-xl sm:rounded-2xl flex items-center justify-center group-hover:bg-secondary/20 transition-colors duration-300"
                                    >
                                        <Icon
                                            name="mdi:home-group"
                                            class="text-secondary text-xl sm:text-2xl"
                                        />
                                    </div>
                                </div>
                                <div class="text-center mb-2 sm:mb-3">
                                    <div
                                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-secondary mb-1 sm:mb-2"
                                    >
                                        <span ref="counter2">0</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-center gap-1.5 sm:gap-2 text-xs sm:text-sm text-gray-500"
                                    >
                                        <Icon
                                            name="mdi:check-circle"
                                            class="text-green-500 text-base sm:text-lg"
                                        />
                                        <span
                                            class="font-semibold text-green-600"
                                            >৯৫%</span
                                        >
                                        <span>সম্পন্ন</span>
                                    </div>
                                </div>
                                <p
                                    class="text-center text-gray-700 font-semibold text-sm sm:text-base"
                                >
                                    সামাজিক প্রকল্প
                                </p>
                                <p
                                    class="text-center text-xs sm:text-sm text-gray-500 mt-1.5 sm:mt-2"
                                >
                                    সফলভাবে বাস্তবায়িত
                                </p>
                            </div>
                        </div>

                        <!-- Achievement 3 -->
                        <div
                            class="group relative bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 shadow-md sm:shadow-lg border border-gray-100 hover:border-primary/30 transition-all duration-300 hover:shadow-lg sm:hover:shadow-xl hover:-translate-y-1 sm:hover:-translate-y-2 overflow-hidden"
                        >
                            <!-- Animated Background -->
                            <div
                                class="absolute top-1/2 right-1/2 w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 bg-primary/5 rounded-full translate-x-1/2 -translate-y-1/2 group-hover:scale-110 sm:group-hover:scale-125 transition-all duration-700"
                            ></div>

                            <!-- Counter -->
                            <div class="relative z-10">
                                <div
                                    class="flex items-center justify-center mb-3 sm:mb-4"
                                >
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-primary/10 rounded-xl sm:rounded-2xl flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300"
                                    >
                                        <Icon
                                            name="mdi:heart-outline"
                                            class="text-primary text-xl sm:text-2xl"
                                        />
                                    </div>
                                </div>
                                <div class="text-center mb-2 sm:mb-3">
                                    <div
                                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-1 sm:mb-2"
                                    >
                                        <span ref="counter3">0</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-center gap-1.5 sm:gap-2 text-xs sm:text-sm text-gray-500"
                                    >
                                        <Icon
                                            name="mdi:star"
                                            class="text-yellow-500 text-base sm:text-lg"
                                        />
                                        <span
                                            class="font-semibold text-yellow-600"
                                            >৪.৮/৫</span
                                        >
                                        <span>রেটিং</span>
                                    </div>
                                </div>
                                <p
                                    class="text-center text-gray-700 font-semibold text-sm sm:text-base"
                                >
                                    সম্প্রদায় সন্তুষ্টি
                                </p>
                                <p
                                    class="text-center text-xs sm:text-sm text-gray-500 mt-1.5 sm:mt-2"
                                >
                                    জনসেবায় জনগনের আস্থা
                                </p>
                            </div>
                        </div>

                        <!-- Achievement 4 -->
                        <div
                            class="group relative bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 shadow-md sm:shadow-lg border border-gray-100 hover:border-secondary/30 transition-all duration-300 hover:shadow-lg sm:hover:shadow-xl hover:-translate-y-1 sm:hover:-translate-y-2 overflow-hidden"
                        >
                            <!-- Animated Background -->
                            <div
                                class="absolute top-0 left-1/2 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 bg-secondary/5 rounded-full -translate-y-8 sm:-translate-y-10 -translate-x-1/2 group-hover:scale-125 sm:group-hover:scale-150 transition-all duration-700"
                            ></div>

                            <!-- Counter -->
                            <div class="relative z-10">
                                <div
                                    class="flex items-center justify-center mb-3 sm:mb-4"
                                >
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-secondary/10 rounded-xl sm:rounded-2xl flex items-center justify-center group-hover:bg-secondary/20 transition-colors duration-300"
                                    >
                                        <Icon
                                            name="mdi:calendar-heart"
                                            class="text-secondary text-xl sm:text-2xl"
                                        />
                                    </div>
                                </div>
                                <div class="text-center mb-2 sm:mb-3">
                                    <div
                                        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-secondary mb-1 sm:mb-2"
                                    >
                                        <span ref="counter4">0</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-center gap-1.5 sm:gap-2 text-xs sm:text-sm text-gray-500"
                                    >
                                        <Icon
                                            name="mdi:calendar-clock"
                                            class="text-blue-500 text-base sm:text-lg"
                                        />
                                        <span
                                            class="font-semibold text-blue-600"
                                            >২০১০</span
                                        >
                                        <span>থেকে</span>
                                    </div>
                                </div>
                                <p
                                    class="text-center text-gray-700 font-semibold text-sm sm:text-base"
                                >
                                    সেবার বছর
                                </p>
                                <p
                                    class="text-center text-xs sm:text-sm text-gray500 mt-1.5 sm:mt-2"
                                >
                                    অবিচ্ছিন্ন জনসেবা
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Achievements Section -->
                    <div class="mt-8 sm:mt-10 md:mt-12 lg:mt-14 xl:mt-16">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8"
                        >
                            <!-- Political Achievements -->
                            <div
                                class="bg-gradient-to-br from-white to-primary/5 rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 border border-primary/20 shadow-md sm:shadow-lg"
                            >
                                <div
                                    class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-5 md:mb-6"
                                >
                                    <div
                                        class="bg-primary/10 p-3 sm:p-4 rounded-lg sm:rounded-xl"
                                    >
                                        <Icon
                                            name="mdi:account-tie"
                                            class="text-primary text-xl sm:text-2xl"
                                        />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-lg sm:text-xl font-bold text-gray-900"
                                        >
                                            রাজনৈতিক সাফল্য
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-gray-500"
                                        >
                                            নির্বাচনী পারফরম্যান্স
                                        </p>
                                    </div>
                                </div>
                                <div class="space-y-3 sm:space-y-4">
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >নির্বাচনে বিজয়</span
                                        >
                                        <span
                                            class="font-bold text-primary text-base sm:text-lg"
                                            >৩ বার</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >ভোটের শতাংশ</span
                                        >
                                        <span
                                            class="font-bold text-primary text-base sm:text-lg"
                                            >৭৫%</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >নেতৃত্বের বছর</span
                                        >
                                        <span
                                            class="font-bold text-primary text-base sm:text-lg"
                                            >১৫+</span
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Social Impact -->
                            <div
                                class="bg-gradient-to-br from-white to-secondary/5 rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 border border-secondary/20 shadow-md sm:shadow-lg"
                            >
                                <div
                                    class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-5 md:mb-6"
                                >
                                    <div
                                        class="bg-secondary/10 p-3 sm:p-4 rounded-lg sm:rounded-xl"
                                    >
                                        <Icon
                                            name="mdi:hand-heart"
                                            class="text-secondary text-xl sm:text-2xl"
                                        />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-lg sm:text-xl font-bold text-gray-900"
                                        >
                                            সামাজিক প্রভাব
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-gray-500"
                                        >
                                            সমাজ উন্নয়নে অবদান
                                        </p>
                                    </div>
                                </div>
                                <div class="space-y-3 sm:space-y-4">
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >শিক্ষার্থী সুবিধা</span
                                        >
                                        <span
                                            class="font-bold text-secondary text-base sm:text-lg"
                                            >৫০০+</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >চিকিৎসা শিবির</span
                                        >
                                        <span
                                            class="font-bold text-secondary text-base sm:text-lg"
                                            >১২৫+</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >রোগ গবেষণা অনুদান</span
                                        >
                                        <span
                                            class="font-bold text-secondary text-base sm:text-lg"
                                            >২৫ লক্ষ+</span
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Awards & Recognition -->
                            <div
                                class="bg-gradient-to-br from-white to-primary/5 rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-7 lg:p-8 border border-primary/20 shadow-md sm:shadow-lg"
                            >
                                <div
                                    class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-5 md:mb-6"
                                >
                                    <div
                                        class="bg-primary/10 p-3 sm:p-4 rounded-lg sm:rounded-xl"
                                    >
                                        <Icon
                                            name="mdi:trophy-variant"
                                            class="text-primary text-xl sm:text-2xl"
                                        />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-lg sm:text-xl font-bold text-gray-900"
                                        >
                                            পুরস্কার ও স্বীকৃতি
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-gray-500"
                                        >
                                            জাতীয় ও আন্তর্জাতিক
                                        </p>
                                    </div>
                                </div>
                                <div class="space-y-3 sm:space-y-4">
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >জাতীয় পুরস্কার</span
                                        >
                                        <span
                                            class="font-bold text-primary text-base sm:text-lg"
                                            >৭</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >আন্তর্জাতিক স্বীকৃতি</span
                                        >
                                        <span
                                            class="font-bold text-primary text-base sm:text-lg"
                                            >৩</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span
                                            class="text-sm sm:text-base text-gray-600"
                                            >সংসদীয় স্বীকৃতি</span
                                        >
                                        <span
                                            class="font-bold text-primary text-base sm:text-lg"
                                            >১২+</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Container>
        </section>
    </AppLayout>
</template>

<script setup>
import Container from "@/components/Container.vue";
import Icon from "@/components/Icon.vue";
import AppLayout from "@/components/AppLayout.vue";
import { ref, onMounted, computed } from "vue";
import useAxios from "@/composables/useAxios.js";

const { error, loading, sendRequest } = useAxios();
const aboutContent = ref([]);

const fetchAboutContent = async () => {
    try {
        const response = await sendRequest({
            method: "get",
            url: "frontend/v1/get-about-content",
        });
        aboutContent.value = response?.data?.data || [];
    } catch (err) {
        console.error("Error fetching about content:", err);
    }
};

const currentAbout = computed(() => aboutContent.value?.[0] || {});

onMounted(() => {
    fetchAboutContent();
});
const counter1 = ref(null);
const counter2 = ref(null);
const counter3 = ref(null);
const counter4 = ref(null);

const startCounterAnimation = () => {
    const animateCounter = (element, target, suffix = "", duration = 2000) => {
        if (!element) return;

        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const updateCounter = () => {
            current += increment;
            if (current >= target) {
                element.textContent = Math.round(target) + suffix;
                return;
            }
            element.textContent = Math.round(current) + suffix;
            requestAnimationFrame(updateCounter);
        };

        updateCounter();
    };

    // Start animations with different values
    setTimeout(() => {
        animateCounter(counter1.value, 25, "K"); // 25K+ beneficiaries
        animateCounter(counter2.value, 150, "+"); // 150+ projects
        animateCounter(counter3.value, 98, "%"); // 98% satisfaction
        animateCounter(counter4.value, 15, "+"); // 15+ years
    }, 500);
};

onMounted(() => {
    startCounterAnimation();

    // Add intersection observer for scroll-triggered animation
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    startCounterAnimation();
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.3 }
    );

    const section = document.querySelector("section.py-10");
    if (section) observer.observe(section);
});
</script>

<style scoped>
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

/* Custom gradient border */
.border-gradient-to-r {
    border-image: linear-gradient(
            to right,
            var(--color-primary),
            var(--color-secondary)
        )
        1;
}

/* Enhance hover effects */
.transform {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Smooth scroll animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.timeline-item {
    animation: fadeInUp 0.6s ease forwards;
}

/* Responsive text optimization */
@media (max-width: 380px) {
    .text-2xl {
        font-size: 1.5rem;
    }

    .text-lg {
        font-size: 1rem;
    }

    .text-sm {
        font-size: 0.75rem;
    }
}

/* Better line heights for mobile */
@media (max-width: 640px) {
    .leading-tight {
        line-height: 1.25;
    }

    .leading-relaxed {
        line-height: 1.4;
    }
}

/* Optimize animations for mobile */
@media (max-width: 640px) {
    .transition-transform {
        transition-duration: 250ms;
    }

    .hover\:-translate-y-1 {
        transition-duration: 200ms;
    }
}

/* Reduce motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .animate-pulse,
    .transition-all,
    .transition-transform,
    .transition-colors,
    .transform {
        animation: none !important;
        transition: none !important;
        transform: none !important;
    }
}

/* Prevent text overflow */
.min-w-0 {
    min-width: 0;
}
</style>
