<template>
    <div class="container">
        <div class="row my-5">
           <div class="col-md-9">
            <div class="card">
                <div class="card-body">
<table class="table">
 <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Category</th>
        <th>Done</th>
        <th>Created</th>
    </tr>
 </thead>
 <tbody>
    {{ console.log(tasks)}}
    <tr v-for="task in tasks.data" :key="task.id">
        <td> {{ task.id }}</td>
        <td> {{ task.title }}</td>
        <td> {{ task.body }}</td>
        <td> {{ task.category.name }} </td>
        <td>
            <div v-if="task.done">
               <span class="badge bg-success">
                  Done
               </span>
            </div>
            <div v-else>
              <span class="badge bg-danger">
                   Processing ...
              </span>
            </div>
        </td>
        <td>{{ task.created_at }}</td>
        <td></td>
    </tr>
 </tbody>
</table>
                </div>
            </div>
        
           </div>
           <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
           </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    tasks: {
        type: Object,
        required: true,
    },
    categories: {
        type: Array,
        required: true,
    }
})



</script>
