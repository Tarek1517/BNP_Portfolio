<template>
    <section class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8 lg:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <!-- Header Logo/Brand -->
                <div class="text-center mb-5">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-primary to-secondary rounded-2xl mb-4 shadow-lg">
                        <Icon name="mdi:shield-account" class="w-10 h-10 text-white" />
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">অ্যাডমিন লগইন</h1>
                    <p class="text-gray-600">আপনার অ্যাকাউন্টে প্রবেশ করুন</p>
                </div>

                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10 border border-gray-100">
                    <!-- Form -->
                    <form @submit.prevent="handleLogin" class="space-y-6">
                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                <div class="flex items-center gap-2">
                                    <Icon name="mdi:email-outline" class="w-5 h-5 text-primary" />
                                    <span>ইমেইল ঠিকানা</span>
                                </div>
                            </label>
                            <div class="relative group">
                                <input 
                                    type="email"
                                    v-model="loginCredential.email"
                                    placeholder="আপনার ইমেইল দিন"
                                    required
                                    :disabled="isLoading"
                                    class="w-full px-4 py-3.5 pl-12 bg-gray-50 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 group-hover:border-primary/60 disabled:opacity-50"
                                />
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <Icon name="mdi:account-circle" class="w-5 h-5 text-gray-400" />
                                </div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <label class="block text-sm font-semibold text-gray-700">
                                    <div class="flex items-center gap-2">
                                        <Icon name="mdi:lock-outline" class="w-5 h-5 text-primary" />
                                        <span>পাসওয়ার্ড</span>
                                    </div>
                                </label>
                                
                            </div>
                            <div class="relative group">
                                <input 
                                    :type="showPassword ? 'text' : 'password'"
                                    v-model="loginCredential.password"
                                    placeholder="আপনার পাসওয়ার্ড দিন"
                                    required
                                    :disabled="isLoading"
                                    class="w-full px-4 py-3.5 pl-12 bg-gray-50 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 group-hover:border-primary/60 disabled:opacity-50"
                                />
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <Icon name="mdi:key" class="w-5 h-5 text-gray-400" />
                                </div>
                                <button 
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary transition-colors"
                                >
                                    <Icon :name="showPassword ? 'mdi:eye-off' : 'mdi:eye'" class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button 
                                type="submit"
                                :disabled="isLoading"
                                class="w-full py-4 px-4 bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:transform-none"
                            >
                                <div class="flex items-center justify-center gap-3">
                                    <span v-if="!isLoading">
                                        <Icon name="mdi:login" class="w-5 h-5" />
                                    </span>
                                    <span v-else class="flex items-center gap-3">
                                        <Icon name="mdi:loading" class="w-5 h-5 animate-spin" />
                                    </span>
                                    <span>{{ isLoading ? 'প্রবেশ করছেন...' : 'লগইন করুন' }}</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Bottom Note -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">
                        সাহায্য প্রয়োজন? 
                        <a href="#" class="text-primary hover:text-secondary font-medium transition-colors">যোগাযোগ করুন</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import { useAuthStore } from '@/stores/useAuthStore.js';
import { useRouter, useRoute } from 'vue-router';
import { toast } from 'vue3-toastify';
import Icon from '@/components/Icon.vue';

const authStore = useAuthStore();
const router = useRouter();
const route = useRoute();

const loginCredential = ref({
    email: '',
    password: '',
});

const isLoading = ref(false);
const showPassword = ref(false);
const rememberMe = ref(false);

const handleLogin = async () => {
    if (!loginCredential.value.email || !loginCredential.value.password) {
        toast.error('দয়া করে ইমেইল এবং পাসওয়ার্ড দিন।');
        return;
    }

    try {
        isLoading.value = true;
        const loginResponse = await authStore.adminLogin(loginCredential.value);
        if (loginResponse) {
            toast.success('লগইন সফল হয়েছে!', { 
                autoClose: 1500,
                position: 'top-center'
            });
            
            if (rememberMe.value) {
                localStorage.setItem('rememberAdmin', 'true');
            }
            
            setTimeout(() => {
                const redirectPath = route.query.redirect || '/admin/dashboard';
                router.push(redirectPath);
            }, 500);
        }
    } catch (error) {
        toast.error('লগইন ব্যর্থ হয়েছে। দয়া করে আবার চেষ্টা করুন।');
    } finally {
        isLoading.value = false;
    }
};
</script>

<style scoped>
/* Custom focus styles */
input:focus {
    box-shadow: 0 0 0 4px rgba(var(--primary-rgb, 59, 130, 246), 0.1);
}

/* Smooth transitions */
button, input, a {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 200ms;
}

/* Loading animation */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
</style>