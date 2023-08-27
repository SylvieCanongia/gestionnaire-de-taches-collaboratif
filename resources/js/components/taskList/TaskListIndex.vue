<template>
    <div class="container taskListContainer">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="p-3">
                    <h3 class="text-left">Liste de tâches de {{ user.name }}</h3>
                    <section>
                        <a :href="taskListCreateUrl" class="btn btn-primary">Créer une liste de tâches</a>

                        <ul v-for="(taskList, key) in taskLists" :key="key" class="list-group">
                            <taskLineVue :item="taskList"></taskLineVue>
                            <!-- <li class="list-group-item list-group-item-action list-group-item-warning">
                                Pas de liste trouvée.
                            </li> -->
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import taskLineVue from "../common/taskLine.vue";

const { user, taskLists } = defineProps(['user', 'taskLists', 'taskListCreateUrl']);

// console.log('user', user);
// console.log('taskLists', taskLists);

</script>

<style>

</style>
