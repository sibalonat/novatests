<template>
    <div>
        <heading class="mb-6">Viewcache</heading>

        <card
            class="flex flex-col items-center justify-center"
            style="min-height: 300px"
        >

            <h1 class="text-black text-4xl text-90 font-light mb-6">
                Application Cache
            </h1>

            <button @click="activateCache" class="btn btn-default btn-primary">Enable cache</button>

        </card>
    </div>
</template>

<script>
export default {
    metaInfo() {
        return {
          title: 'Viewcache',
        }
    },
    methods: {
        activateCache() {
            Nova.request().post('/nova-vendor/viewcache')
            .then(data => {
                alert("sucee")
            });
        }
    }

}
</script>

<style>
/* Scoped Styles */
</style>
