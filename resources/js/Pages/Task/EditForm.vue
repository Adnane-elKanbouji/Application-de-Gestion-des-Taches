<template>
    <div class="container">
     <div class="row my-5">
         <div class="col-md-6 mx-auto">
             <div class="card">
                 <div class="card-header">
                     <h5 class="text-center mt-2">
                           Edit Task
                           <span class="sm text-gray"> #{{ data.id }}</span>
                     </h5>
                 </div>
                 <div class="card-body">
                     <form @submit.prevent='editTask'>
                         <div class="mb-3">
                             <label for="title">
                                 Title*
                             </label>
                             <input type="text" v-model="data.title" placeholder="Title" class="form-control">
                         </div>
                         <div v-if="data.errors.title" class="alert alert-danger p-1">{{data.errors.title }}</div>
                         <div class="mb-3">
                             <label for="body">
                                 Body*
                             </label>
                             <textarea rows="5" cols="30"  v-model="data.body" placeholder="Body" class="form-control"></textarea>
                         </div>
                         <div v-if="data.errors.body" class="alert alert-danger py-1">{{ data.errors.body }}</div>
                         <div class="mb-3">

                             <select class="form-select" v-model="data.category_id" >
                                 <option v-for="category in categories" :key="category.id" :value="category.id" >{{ category.name }}</option>
                             </select>
                         </div>
                         <div v-if="data.errors.category_id" class="alert alert-danger py-1">{{ data.errors.category_id }}</div>
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input"
                             v-model="data.done"
                             :checked="data.done"
                            >
                            <label for="" class="form-check-label">
                                Done
                            </label>
                          </div>
                         <div class="mb-3">
                             <button type="submit" class="btn btn-primary btn-sm">
                               <i class="fas fa-edit"> </i>  Update Task
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
    </div>
 </template>
<script setup>
import {useForm} from '@inertiajs/vue3';
 const props = defineProps({
    task:{
        type:Object,
        required : true,
    },
    categories:{
       type:Object,
       required : true,
    }
 })
 const data = useForm({
    id:props.task.id,
    title:props.task.title,
    body:props.task.body,
    category_id:props.task.category_id,
    done:props.task.done ? true : false,
 })
 console.log(props.task);
const editTask = () =>{
    return data.put(route('tasks.update',props.task.id));
}
</script>
