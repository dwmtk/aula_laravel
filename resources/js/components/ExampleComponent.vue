<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div id="example-5" class="demo">
                        <select v-model="selected">
                            <option disabled value="">Please select one</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                            <span>Selected: {{ selected }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
