<template>
    <div class="card my-3">
        <div class="card-body d-flex justify-content-center">
            <!-- // code dropdown in bootstrap -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Filter By Order
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" :href="`/order/id/asc/tasks`">
                            ID   <i class="fas fa-arrow-up"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" :href="`/order/id/desc/tasks`">
                            ID   <i class="fas fa-arrow-down"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" :href="`/order/title/asc/tasks`">
                            Title A-Z
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" :href="`/order/title/desc/tasks`">
                            Title Z-A
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
</script>