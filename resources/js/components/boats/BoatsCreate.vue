<template>
    <div>
<div class="form-group">
    <router-link to="/" class="btn btn-default">Back</router-link>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Create new boat</div>
    <div class="panel-body">
        <form v-on:submit="saveForm()">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">boat name</label>
                    <input type="text" v-model="boat.name" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">boat address</label>
                    <input type="text" v-model="boat.address" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">boat website</label>
                    <input type="text" v-model="boat.website" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">boat email</label>
                    <input type="text" v-model="boat.email" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <button class="btn btn-success">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</template>
<script>
    export default {
        data: function () {
            return {
                boat: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newBoat = app.boat;
                axios.post('/api/v1/boats', newBoat)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your Boat");
                    });
            }
        }
    }
</script>