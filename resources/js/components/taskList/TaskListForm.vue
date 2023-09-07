<script setup>
import { ref, defineProps } from "vue";

const itemName = ref("");
const itemDescription = ref("");

const {
  formTitle,
  buttonSubmitLabel,
  formSubmitMethod,
  formSubmitRoute,
  errors,
} = defineProps({
  "form-title": String,
  "button-submit-label": String,
  "form-submit-method": String,
  "form-submit-route": String,
  errors: Object,
});

const url = formSubmitRoute;

const handleSubmit = () => {
//   console.log("Nom de la tâche:", itemName.value);
//   console.log("Description de la tâche:", itemDescription.value);

  axios
    .post(
      url,
      {
        list_name: itemName.value,
        list_description: itemDescription.value,
      },
      {
        headers: {
          "Content-Type": "application/json",
        },
      }
    )
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });

  itemName.value = "";
  itemDescription.value = "";
};
</script>

<template>
  <h1>{{ formTitle }}</h1>

  <form name="createForm" @submit.prevent="handleSubmit">
    <div class="mb-3">
      <label for="name" class="form-label">Nom</label>
      <input
        id="name"
        name="list_name"
        type="text"
        class="form-control"
        v-model="itemName"
      />
      <div
        v-if="$props.errors && $props.errors.list_name"
        class="alert alert-danger"
      >
        {{ $props.errors.list_name[0] }}
      </div>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea
        id="description"
        name="list_description"
        class="form-control"
        aria-label="Description de la ${ itemTitle }"
        v-model="itemDescription"
      ></textarea>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn">{{ buttonSubmitLabel }}</button>
    </div>
  </form>
</template>

<style></style>
