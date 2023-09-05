<template>
    <li class="list-group-item">
        <div class="d-flex-column justify-content-between align-items-center">
            <h4>{{ item && item.list_name ? item.list_name : 'Pas de liste créée' }}</h4>
            <p>{{ item && item.list_description ? item.list_description : "" }}</p>
            <span class="d-flex justify-content-between align-items-center">
                <a class="text-success mr-2" href="#">
                    <i class="fa fa-edit"> </i>
                </a>
                <a class="text-danger" href="#">
                    <i class="fa fa-trash-o"></i>
                </a>
            </span>
        </div>
        <div class="d-flex w-100 justify-content-between">
            <small class="text-muted">Créé le {{ item.created_at ? itemDate : 'Date inconnue' }}</small>
        </div>
    </li>
</template>

<script setup>
const { item } = defineProps(['item']);
const itemDate = new Date(item.created_at).toLocaleDateString();

// console.log('item', item);
</script>

<style>
</style>