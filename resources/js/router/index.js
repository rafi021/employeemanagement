import Vue from "vue";
import VueRouter from "vue-router";

// Load components
import EmployeeIndex from '../pages/Employee/Index.vue'
import EmployeeCreate from '../pages/Employee/Create.vue'
import EmployeeEdit from '../pages/Employee/Edit.vue'

Vue.use(VueRouter);

const routes = [
    { path: '/employees', component: EmployeeIndex, name: 'employee.index' },
    { path: '/employees/create', component: EmployeeCreate, name: 'employee.create' },
    { path: '/employees/edit/:id', component: EmployeeEdit, name: 'employee.edit' },
];


const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
