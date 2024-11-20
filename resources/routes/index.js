import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const App = async () => await import("../js/admin/App.vue");
const Dashboard = async () => await import("../js/admin/Dashboard.vue");
const Login = async () => await import("../js/admin/Login.vue");
const Products = async () => await import("../js/admin/Products.vue");
const Recipes = async () =>
    await import("../js/admin/manage_recipes/ManageRecipes.vue");
const AddEditRecipe = async () =>
    await import("../js/admin/manage_recipes/AddEditRecipe.vue");
const Categories = async () =>
    await import("../js/admin/lookup/Categories.vue");

const Blogs = async () => await import("../js/admin/blogs/ManageBlogs.vue");
const AddEditBlog = async () =>
    await import("../js/admin/blogs/AddEditBlog.vue");
const Contacted = async () => await import("../js/admin/Contacted.vue");
const Settings = async () => await import("../js/admin/Settings.vue");
const Tags = async () => await import("../js/admin/lookup/Tags.vue");

const routes = [
    {
        path: "/admin/login",
        name: "admin",
        component: Login,
    },
    {
        path: "/app",
        name: "app",
        component: App,
        children: [
            {
                path: "/admin/dashboard",
                name: "dashboard",
                component: Dashboard,
            },

            {
                path: "/admin/products",
                name: "products",
                component: Products,
            },
            {
                path: "/admin/recipes",
                name: "recipes",
                component: Recipes,
            },
            {
                path: "/admin/recipe/add-new",
                name: "addNewRecipe",
                component: AddEditRecipe,
            },

            {
                path: "/admin/recipe/edit",
                name: "editRecipe",
                component: AddEditRecipe,
            },

            {
                path: "/admin/lookup/categories",
                name: "categories",
                component: Categories,
            },
            {
                path: "/admin/blogs",
                name: "blogs",
                component: Blogs,
            },
            {
                path: "/admin/add-blog",
                name: "addBlog",
                component: AddEditBlog,
            },
            {
                path: "/admin/edit-blog",
                name: "editBlog",
                component: AddEditBlog,
            },

            {
                path: "/admin/contacted",
                name: "contacted",
                component: Contacted,
            },
            {
                path: "/admin/settings",
                name: "settings",
                component: Settings,
            },
            {
                path: "/admin/tags",
                name: "tags",
                component: Tags,
            },
        ],
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
