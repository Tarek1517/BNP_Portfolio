import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/Index.vue";
import adminMiddleware from "@/Middleware/AdminMiddleware.js";

const router = createRouter({
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 };
    },
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "Home",
            component: () => import("@/views/Index.vue"),
        },

        {
            path: "/service",
            name: "Service",
            component: () => import("@/views/Service/Index.vue"),
        },
        {
            path: "/service-details/:slug",
            name: "ServiceDetails",
            component: () => import("@/views/Service/show.vue"),
        },

        {
            path: "/vision",
            name: "Vision",
            component: () => import("@/views/Vision/Index.vue"),
        },

        {
            path: "/complaints",
            name: "complaints",
            component: () => import("@/views/Complaints/Index.vue"),
        },

        {
            path: "/voter-center",
            name: "voterCenter",
            component: () => import("@/views/VoteCenter/Index.vue"),
        },

        {
            path: "/thirty-one-policy",
            name: "thirtyOnePolicy",
            component: () => import("@/views/Policy/thirtyOne.vue"),
        },

        {
            path: "/nineteen-policy",
            name: "nineteenPolicy",
            component: () => import("@/views/Policy/Twenty.vue"),
        },

        {
            path: "/about",
            name: "About",
            component: () => import("@/views/About/Index.vue"),
        },
        {
            path: "/contact",
            name: "Contact",
            component: () => import("@/views/Contact/Index.vue"),
        },
        // Auth
        {
            path: "/admin/login",
            name: "adminLogin",
            component: () => import("@/views/Dashboard/Auth/Login.vue"),
        },

        //dashboard
        {
            path: "/admin/dashboard",
            name: "Dashboard",
            component: () => import("@/views/Dashboard/Index.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/service-category",
            name: "AdminServiceCategory",
            component: () =>
                import("@/views/Dashboard/ServiceCategory/Index.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/Customer-mail",
            name: "Cutomermail",
            component: () => import("@/views/Dashboard/ClientsMail/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/mail-details/:id",
            name: "MailDetails",
            component: () => import("@/views/Dashboard/ClientsMail/Show.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/complaints",
            name: "AdminComplaint",
            component: () => import("@/views/Dashboard/Complaint/Index.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/complaint-details/:id",
            name: "ComplaintDetails",
            component: () => import("@/views/Dashboard/Complaint/Show.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-category",
            name: "AdminCreateCategory",
            component: () =>
                import("@/views/Dashboard/ServiceCategory/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-category/:id",
            name: "AdminEditCategory",
            component: () =>
                import("@/views/Dashboard/ServiceCategory/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/service",
            name: "AdminService",
            component: () => import("@/views/Dashboard/Services/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-service",
            name: "AdminCreateService",
            component: () => import("@/views/Dashboard/Services/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-service/:id",
            name: "AdminEditService",
            component: () => import("@/views/Dashboard/Services/Edit.vue"),
            beforeEnter: adminMiddleware,
        },

        //Package Route

        {
            path: "/admin/setting",
            name: "AdminSetting",
            component: () => import("@/views/Dashboard/Setting/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        //Pages Route
        {
            path: "/admin/pages",
            name: "AdminPages",
            component: () => import("@/views/Dashboard/CutomPages/Index.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/create-page",
            name: "CreatePage",
            component: () => import("@/views/Dashboard/CutomPages/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-page/:id",
            name: "EditPage",
            component: () => import("@/views/Dashboard/CutomPages/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/:slug",
            name: "custom-page",
            component: () => import("@/views/CutomPage/Index.vue"),
        },

        //CMS Section
        {
            path: "/admin/home-slider",
            name: "AdminHomeSlider",
            component: () => import("@/views/Dashboard/CMS/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-heroSection",
            name: "CreateheroSection",
            component: () => import("@/views/Dashboard/CMS/Create.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/edit-heroSection/:id",
            name: "EditheroSection",
            component: () => import("@/views/Dashboard/CMS/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/counter",
            name: "AdminCounter",
            component: () => import("@/views/Dashboard/Counter/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-counter",
            name: "CreateCounter",
            component: () => import("@/views/Dashboard/Counter/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-counter/:id",
            name: "EditCounter",
            component: () => import("@/views/Dashboard/Counter/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/serve",
            name: "AdminServe",
            component: () => import("@/views/Dashboard/Serve/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-serve",
            name: "CreateServe",
            component: () => import("@/views/Dashboard/Serve/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-serve/:id",
            name: "EditServe",
            component: () => import("@/views/Dashboard/Serve/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/quote",
            name: "AdminQuote",
            component: () => import("@/views/Dashboard/Quote/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-quote",
            name: "CreateQuote",
            component: () => import("@/views/Dashboard/Quote/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-quote/:id",
            name: "EditQuote",
            component: () => import("@/views/Dashboard/Quote/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/about",
            name: "AdminAbout",
            component: () => import("@/views/Dashboard/About/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-about",
            name: "CreateAbout",
            component: () => import("@/views/Dashboard/About/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-about/:id",
            name: "EditAbout",
            component: () => import("@/views/Dashboard/About/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/vision",
            name: "AdminVision",
            component: () => import("@/views/Dashboard/Vision/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-vision",
            name: "CreateVision",
            component: () => import("@/views/Dashboard/Vision/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-vision/:id",
            name: "EditVision",
            component: () => import("@/views/Dashboard/Vision/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/policy",
            name: "AdminPolicy",
            component: () => import("@/views/Dashboard/Policy/Index.vue"),
            beforeEnter: adminMiddleware,
        },

        {
            path: "/admin/create-policy",
            name: "CreatePolicy",
            component: () => import("@/views/Dashboard/Policy/Create.vue"),
            beforeEnter: adminMiddleware,
        },
        {
            path: "/admin/edit-policy/:id",
            name: "EditPolicy",
            component: () => import("@/views/Dashboard/Policy/Edit.vue"),
            beforeEnter: adminMiddleware,
        },
    ],
});

export default router;
