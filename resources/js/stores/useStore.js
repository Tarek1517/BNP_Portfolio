// /resources/js/stores/useStore.js
import { defineStore } from 'pinia';

export const useStore = defineStore('store', {
    state: () => ({
        email: null,
    }),
    actions: {
        setEmail(email) {
            this.email = email;
        },
    },
});


