import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from '../components/dashboard/Dashboard'
import Category from '../components/category/Category'
import Subcategory from '../components/subcategory/Subcategory'
import AddDoctor from '../components/doctor/AddDoctor'
import EditDoctor from '../components/doctor/EditDoctor'
import ViewDoctor from '../components/doctor/ViewDoctor'
import AddExpenseCategory from '../components/expense/AddExpense'
import ViewExpenseCategory from '../components/expense/ViewExpense'
import ExpenseInvoice from '../components/invoice/ExpenseInvoice'
import GeneralSettings from '../components/settings/GeneralSettings'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: "/dashboard",
            name: "Dashboard",
            component: Dashboard
        },
        {
            path: "/category",
            name: "Category",
            component: Category
        },
        {
            path: "/subcategory",
            name: "Subcategory",
            component: Subcategory
        },
        {
            path: "/add-doctor",
            name: "AddDoctor",
            component: AddDoctor
        },
        {
            path: "/edit-doctor/:id",
            name: "EditDoctor",
            component: EditDoctor
        },
        {
            path: "/view-doctor",
            name: "ViewDoctor",
            component: ViewDoctor
        },
        {
            path: "/add-expense-category",
            name: "AddExpenseCategory",
            component: AddExpenseCategory
        },
        {
            path: "/view-expense-category",
            name: "ViewExpenseCategory",
            component: ViewExpenseCategory
        },
        {
            path: "/add-expense-invoice",
            name: "ExpenseInvoice",
            component: ExpenseInvoice
        },
        {
            path: "/general-settings",
            name: "GeneralSettings",
            component: GeneralSettings
        }
    ],
    mode: "history",
    linkActiveClass: "active"
});
