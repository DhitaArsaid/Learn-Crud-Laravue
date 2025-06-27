<template>
  <div class="container">
    <h1>Todo App</h1>

    <form @submit.prevent="isEditing ? updateTodo() : addTodo()">
      <input v-if="!isEditing" v-model="newTodo.title" placeholder="Title" required />
      <input v-if="isEditing" v-model="currentTodo.title" placeholder="Title" required />

      <input v-if="!isEditing" v-model="newTodo.description" placeholder="Description" />
      <input v-if="isEditing" v-model="currentTodo.description" placeholder="Description" />

      <button type="submit">{{ isEditing ? 'Update Todo' : 'Add Todo' }}</button>
      <button type="button" v-if="isEditing" @click="cancelEdit">Cancel</button>
    </form>

    <ul>
      <li v-for="todo in todos" :key="todo.id">
        <strong>{{ todo.title }}</strong>: {{ todo.description }}
        <div>dibuat pada: {{ formatDate(todo.created_at) }}</div>
        <button @click="startEdit(todo)">Edit</button>
        <button @click="deleteTodo(todo.id)">Delete</button>
      </li>
    </ul>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import api from './services/api';
import { computed } from 'vue';

const formTodo = computed({
  get: () => isEditing.value ? currentTodo.value : newTodo.value,
  set: (value) => {
    if (isEditing.value) {
      currentTodo.value = value;
    } else {
      newTodo.value = value;
    }
  }
});


const todos = ref([]);
const newTodo = ref({ title: '', description: '' });

const fetchTodos = async () => {
  const response = await api.get('/todos');
  todos.value = response.data;
};

const addTodo = async () => {
  if (!newTodo.value.title) return;

  await api.post('/todos', newTodo.value);
  newTodo.value = { title: '', description: '' };
  fetchTodos();
};

const isEditing = ref(false);
const currentTodo = ref(null);

const startEdit = (todo) => {
  isEditing.value = true;
  currentTodo.value = { ...todo }; // Copy data yang mau di edit
};

const updateTodo = async () => {
  if (!currentTodo.value.title) return;

  await api.put(`/todos/${currentTodo.value.id}`, currentTodo.value);
  isEditing.value = false;
  currentTodo.value = null;
  fetchTodos();
};

const cancelEdit = () => {
  isEditing.value = false;
  currentTodo.value = null;
};


const deleteTodo = async (id) => {
  await api.delete(`/todos/${id}`);
  fetchTodos();
};

const formatDate = (datetime) => {
  const date = new Date(datetime);
  return date.toLocaleString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' });
};

onMounted(fetchTodos);
</script>

<style>
.container {
  max-width: 600px;
  margin: auto;
  padding: 20px;
}

input {
  margin: 5px;
}

button {
  margin-left: 10px;
}
</style>
