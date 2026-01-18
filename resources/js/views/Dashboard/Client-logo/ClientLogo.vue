<script setup>
import GuestLayout from "@/components/Dashboard/GuestLayout.vue";
import Modal from "@/components/Modal.vue";
import { ref, onMounted, watch } from "vue";
import useAxios from "@/composables/useAxios.js";
import { toast } from "vue3-toastify";
import { useRouter } from "vue-router";
const router = useRouter();

const { loading, error, sendRequest } = useAxios();

const clientLogos = ref(null);
const search = ref("");

const getLogos = async (query = "") => {
  const response = await sendRequest({
    method: "get",
    url: `/v1/client-logo?search=${query}`,
  });
  if (response) {
    clientLogos.value = response.data?.data;
  }
};

// Handle logo 
const clientLogo = ref(null);
const onFileChange = (image) => {
  const file = image.target.files[0];
  clientLogo.value = URL.createObjectURL(file);
  form.value.image = file;
};

const form = ref({
  name: null,
  image: null,
});

// Save Product
const onSubmit = async () => {
  const response = await sendRequest({
    method: "post",
    url: "/v1/client-logo",
    data: form.value,
    headers: {
      "Content-Type": "multipart/form-data",
    },
  });
  if (response?.data) {
    toast.success("Logo Added Successfully", {
      autoclose: 1000,
      theme: "dark",
    });
    closeModal();
    await router.push("/admin/client-logo");
  }
};

const logo = ref(null);
const editCategory = (cat) => {
  isEditModalOpened.value = true;
  logo.value = cat;
  clientLogo.value = logo.value.image || null; 
  form.value.name = logo.value.name;
};

const onUpdate = async (id) => {
  const updatedLogo = {
    ...logo.value,
    image: form.value.image || clientLogo.value,
  };
  const response = await sendRequest({
    method: "post",
    url: `/v1/client-logo/${id}`,
    params: {
      _method: "PUT",
    },
    data: updatedLogo,
  });
  if (response) {
    toast.success("Logo Updated Successfully", {
      autoClose: 500,
      theme: "dark",
    });
    getLogos();
    closeModal();
  }
};

const handelDelete = async (id) => {
  const response = await sendRequest({
    method: "delete",
    url: `/v1/client-logo/${id}`,
  });
  if (response) {
    toast.success("Logo Deleted Successfully", {
      autoClose: 500,
      theme: "dark",
    });
    await getLogos();
  }
};

const reset = () => {
  form.value.name = null;
  clientLogos.value.image = null;
};

// Modal management
const isModalOpened = ref(false);
const isEditModalOpened = ref(false);

const openModal = () => {
  isModalOpened.value = true;
};

const closeModal = () => {
  isModalOpened.value = false;
  isEditModalOpened.value = false;
  reset();
};

onMounted(() => {
  getLogos();
});

watch(search, (newValue) => {
  getLogos(newValue);
});
</script>

<template>
  <GuestLayout>
    <div class="flex items-center justify-between p-5 bg-white">
      <div>
        <div class="flex items-center">
          <h2 class="text-xl py-5 px-3">Clients Logos</h2>
        </div>

      </div>

      <button
        @click="openModal"
        class="flex items-center justify-center gap-2 bg-primary px-3 py-2 text-white text-sm font-medium"
      >
        <Icon
          name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
          class="text-sm shadow-lg border-primary"
        />
        Add Record
      </button>
     
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t-2 border-primary">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">Logo</th>
            <th scope="col" class="px-6 py-3">name</th>
            <th scope="col" class="px-6 py-3">action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="logo in clientLogos" :key="logo.id">
            <td>
              <img
                class="w-10 h-auto ml-5"
                :src="logo?.image"
                :alt="logo?.name"
              />
            </td>
            <td class="px-6 py-4 text-lg">
              {{ logo?.name }}
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center gap-2">
                <button
                  @click="editCategory(logo)"
                  class="flex items-center gap-1 px-2 py-1 rounded border border-green-600 bg-green-500/10 text-green-600 hover:bg-green-600 hover:text-white"
                >
                  <Icon name="material-symbols:edit-square-outline" />
                  <span class="text-xs font-normal">Edit</span>
                </button>

                <button
                  @click="handelDelete(logo?.id)"
                  class="flex items-center gap-1 px-2 py-1 rounded border border-orange-600 bg-orange-500/10 text-orange-600 hover:bg-orange-600 hover:text-white"
                >
                  <Icon name="material-symbols:delete-outline-rounded" />
                  <span class="text-xs font-normal">Delete</span>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-if="loading" class="w-full h-52 flex items-center justify-center">
        <div>
          <LoadingButton :isLoading="loading">Loading</LoadingButton>
        </div>
      </div>
    </div>
  </GuestLayout>

  <Modal
    title="Add New Logo"
    :isOpen="isModalOpened"
    @modal-close="closeModal"
  >
    <div class="flex flex-wrap pt-5">
      <div class="w-full mb-4">
        <label for="name" class="block mb-1 text-xs font-normal"
          >Name</label
        >
        <input
          v-model="form.name"
          type="text"
          class="p-2 rounded border border-primary w-full bg-transparent"
        />
      </div>
     
      <div class="w-full mb-4">
        <div class="">
          <label for="image" class="text-xs block mb-1">Client Logo</label>
          <label
            for="cover_image"
            class="w-full h-56 flex items-center justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer"
          >
            <input type="file" id="cover_image" hidden @change="onFileChange" />
            <img
              v-if="clientLogo"
              :src="clientLogo"
              class="w-full h-56 object-cover p-2"
            />
            <div v-else class="w-full">
              <p class="text-xs text-center">Upload Client Logo</p>
            </div>
          </label>
        </div>
      </div>

      <div class="w-full">
        <button @click="onSubmit" class="w-full bg-primary py-2.5 text-white">
          Save Logo
        </button>
      </div>
    </div>
  </Modal>

  <Modal
    title="Update Logo"
    :isOpen="isEditModalOpened"
    @modal-close="closeModal"
  >
    <div class="flex flex-wrap pt-5">
      <div class="w-full mb-4">
        <label for="name" class="block mb-1 text-xs font-normal"
          >Name</label
        >
        <input
          v-model="logo.name"
          type="text"
          class="p-2 rounded border border-primary w-full bg-transparent"
        />
      </div>
      
      <div class="w-full mb-4">
        <div class="">
          <label for="image" class="text-xs block mb-1">Service Image</label>
          <label
            for="cover_image"
            class="w-full h-56 flex items-center justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer"
          >
            <input type="file" id="cover_image" hidden @change="onFileChange" />
            <img
              v-if="clientLogo"
              :src="clientLogo"
              class="w-full h-56 object-cover p-2"
            />
            <div v-else class="w-full">
              <p class="text-xs text-center">Upload Service Image</p>
            </div>
          </label>
        </div>
      </div>
      <div class="w-full">
        <button
          @click="onUpdate(logo.id)"
          class="w-full bg-primary py-2.5 text-white"
        >
          Update Category
        </button>
      </div>
    </div>
  </Modal>
</template>
