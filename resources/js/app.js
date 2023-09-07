/**
 * load all of this project's JavaScript dependencies which
 * includes Vue and other libraries.
 */

import './bootstrap';
import axios from 'axios';
import { createApp } from 'vue';

/**
 * create a fresh Vue application instance.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import TaskListIndex from './components/taskList/TaskListIndex.vue';
import TaskListDetails from './components/taskList/TaskListDetails.vue';
import TaskDetails from './components/task/TaskDetails.vue';
import TaskListForm from './components/taskList/TaskListForm.vue';

app.component('example-component', ExampleComponent);
app.component('task-list-index', TaskListIndex);
app.component('task-lists-details', TaskListDetails);
app.component('task-details', TaskDetails);
app.component('task-list-form', TaskListForm);

/**
 * automatically register the Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

let currentYear = new Date().getFullYear();



/**
 * attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding.
 */

app.mount('#app');
