/**
 * load all of this project's JavaScript dependencies which
 * includes Vue and other libraries.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * create a fresh Vue application instance.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import TaskListsIndex from './components/taskLists/TaskListsIndex.vue';
app.component('task-lists-index', TaskListsIndex);

import TaskListDetails from './components/taskLists/TaskListDetails.vue';
app.component('task-lists-details', TaskListDetails);

import TaskDetails from './components/tasks/TaskDetails.vue';
app.component('task-details', TaskDetails);

import TaskForm from './components/common/TaskForm.vue';
app.component('task-form', TaskForm);

/**
 * automatically register the Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

/**
 * attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding.
 */

app.mount('#app');
