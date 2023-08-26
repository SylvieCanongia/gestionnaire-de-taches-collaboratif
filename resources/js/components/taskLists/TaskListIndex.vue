<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="p-3">
                    <h3 class="text-left">Liste de tâches de {{ user.name }}</h3>
                    <section>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    nom liste
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
                                    <small class="text-muted">Créé le</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    nom liste
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
                                    <small class="text-muted">créé le</small>
                                </div>
                            </li>
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

const props = defineProps({
    user: Object
});

console.log(props.user);

</script>

<style></style>
