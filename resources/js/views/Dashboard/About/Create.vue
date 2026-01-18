<script setup>
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios";
import { toast } from "vue3-toastify";
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import { useRouter } from "vue-router";

const { loading, error, sendRequest } = useAxios();
const router = useRouter();
const heroImg = ref(null);
const form = ref({
    name: null,
    description: null,
    birth_date: null,
    birth_place: null,
    education: null,
    height: null,
    order_number: null,
    image: null,
    status: 0,
    key_features: [
        {
            title: null,
            short_description: null,
            year: null,
        },
    ],
});

const image = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    heroImg.value = URL.createObjectURL(file);
};

// Save Counter
const onSubmit = async () => {
    const response = await sendRequest({
        method: "post",
        url: "v1/about",
        data: form.value,
    });
    if (response?.data) {
        toast.success("Quote Added Successfully", {
            autoclose: 1000,
            theme: "dark",
        });
        await router.push("/admin/about");
    }
};

const addItem = () => {
    form.value.key_features.push({
        title: null,
        short_description: null,
        year: null,
    });
};
const removeItem = (index) => form.value.key_features.splice(index, 1);
</script>

<template>
    <GuestLayout>
        <div class="p-4 sm:p-6 bg-white shadow-md max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <h2
                    class="text-xl sm:text-2xl font-semibold text-primary text-center"
                >
                    Add About Info
                </h2>
                <p class="text-gray-500 text-sm text-center mt-1">
                    Create a new About Info
                </p>
            </div>

            <!-- Form -->
            <div class="flex flex-wrap -mx-2">
                <!-- Name -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="name"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Name</label
                        >
                        <input
                            type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.name"
                            placeholder="Enter Name"
                        />
                    </div>
                </div>

                <!-- Birth Date -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="birth_date"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Birth Date</label
                        >
                        <input
                            type="date"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.birth_date"
                        />
                    </div>
                </div>

                <!-- Birth Place -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="birth_place"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Birth Place</label
                        >
                        <input
                            type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.birth_place"
                            placeholder="Enter Birth Place"
                        />
                    </div>
                </div>

                <!-- Education -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="education"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Education</label
                        >
                        <input
                            type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.education"
                            placeholder="Enter Education"
                        />
                    </div>
                </div>

                <!-- Height -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="height"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Height</label
                        >
                        <input
                            type="text"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.height"
                            placeholder="Enter Height"
                        />
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

                <!-- Status -->
                <div class="w-full sm:w-1/2 mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="status"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Status</label
                        >
                        <select
                            v-model="form.status"
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                        >
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="w-full mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="description"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Description</label
                        >
                        <textarea
                            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200"
                            v-model="form.description"
                            placeholder="Enter Description"
                            rows="4"
                        ></textarea>
                    </div>
                </div>

                <!-- Key Features -->
                <div class="w-full mb-3 sm:mb-5 px-2">
                    <label for="key-features" class="text-xs mb-1 block"
                        >Life through the years</label
                    >
                    <div class="flex items-end flex-wrap -mt-4">
                        <div
                            v-for="(item, index) in form.key_features"
                            :key="index"
                            class="w-full border p-3 rounded-lg mt-4 relative"
                        >
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-1/2 px-2 mb-2">
                                    <input
                                        type="text"
                                        class="border border-gray-300 p-2 w-full text-sm rounded-lg"
                                        placeholder="Title"
                                        v-model="item.title"
                                    />
                                </div>
                                <div class="w-1/2 px-2 mb-2">
                                    <input
                                        type="text"
                                        class="border border-gray-300 p-2 w-full text-sm rounded-lg"
                                        placeholder="Year"
                                        v-model="item.year"
                                    />
                                </div>
                                <div class="w-full px-2">
                                    <textarea
                                        class="border border-gray-300 p-2 w-full text-sm rounded-lg"
                                        placeholder="Short Description"
                                        v-model="item.short_description"
                                        rows="2"
                                    ></textarea>
                                </div>
                            </div>

                            <button
                                @click="removeItem(index)"
                                class="absolute right-1 top-1 bg-slate-100 rounded w-8 h-8 flex items-center justify-center shadow"
                                v-if="form.key_features.length > 1"
                            >
                                <Icon
                                    name="material-symbols:close-rounded"
                                    class="text-common text-xl"
                                />
                            </button>
                        </div>
                        <button
                            class="w-1/5 text-xs bg-primary rounded-lg py-3 px-4 text-nowrap text-white mt-4"
                            @click="addItem"
                        >
                            Add More
                        </button>
                    </div>
                </div>

                <!-- Hero Image Upload -->
                <div class="w-full mb-4 sm:mb-5 px-2">
                    <div class="flex flex-col gap-1">
                        <label
                            for="number"
                            class="text-sm mb-1 sm:mb-2 font-medium text-gray-700"
                            >Hero Image</label
                        >
                        <label
                            class="border border-primary border-dashed p-4 rounded-2xl flex items-center justify-center w-full h-auto cursor-pointer hover:bg-gray-50 transition-colors"
                        >
                            <div
                                class="w-full h-full flex items-center justify-center"
                            >
                                <img
                                    v-if="heroImg"
                                    :src="heroImg"
                                    class="w-full h-full rounded-md object-cover"
                                />
                                <div
                                    v-if="!heroImg"
                                    class="flex flex-col items-center justify-center gap-3"
                                >
                                    <Icon
                                        name="tabler:cloud-upload"
                                        class="text-primary text-2xl sm:text-3xl opacity-85"
                                    />
                                    <span
                                        class="text-primary text-sm font-normal opacity-85 text-center px-2"
                                    >
                                        Upload Hero Image
                                    </span>
                                    <span class="text-gray-500 text-xs mt-1">
                                        Recommended: 1200x600px
                                    </span>
                                </div>
                            </div>
                            <input
                                id="category-icon"
                                @change="image"
                                type="file"
                                hidden
                                accept="image/*"
                            />
                        </label>
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
                        {{ loading ? "Saving..." : "Save About" }}
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
