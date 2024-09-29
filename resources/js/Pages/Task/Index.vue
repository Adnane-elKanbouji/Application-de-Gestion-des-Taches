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
                                {{ console.log(tasks) }}
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
                        <!-- code pagination bootstrap -->
                        <ul class="pagination d-flex justify-content-center">
                            <li :class="`page-item ${link.active ? 'active' : ''}`" v-for="(link, index) in tasks.links"
                                :key="index">
                                <Link v-if="link.url !== null" class="page-link" :href="link.url" v-dompurify-html="link.label">
                                </Link>
                                <div v-else class="page-link" v-dompurify-html="link.label">
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <Category :categories="categories"/>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import Category from '@/Components/Category.vue';

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
