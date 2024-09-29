<template>
   <div class="container">
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center mt-2">
                          Create New Task
                    </h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="title">
                                Title*
                            </label>
                            <input type="text" v-model="form.title" placeholder="Title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="body">
                                Body*
                            </label>
                            <textarea rows="5" cols="30"  v-model="form.body" placeholder="Body" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Category">
                                Choose a category
                            </label>
                            <select class="form-select" v-model="form.category_id"
                                <option v-for="category in categories" :key="category.id" :value="category.id" >{{ category.name }}</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fas fa-add"></i>  Create Task
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
 import { useForm } from '@/inertiajs/vue3';
 const form = useForm({
    title => '',
    body => '',
    category_id => ''
 })


const props = defineProps({
    categories:{
        type:Object,
        required:true
    }
})
</script>