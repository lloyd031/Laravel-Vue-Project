<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<script>
import Event from '@/Components/Event.vue';
export default {
  components:[Event],
  props:['events','eventportion'],
}
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard </h2>
        </template>

        <div class="py-12">
            <Event :events="events" headTitle="Events" :eventportion="eventportion"/>
        </div>
        
        <div class="py-12">
            <Event :events="events"  headTitle="Joined Events" :eventportion="eventportion"/>
        </div>
    </AuthenticatedLayout>
</template>
