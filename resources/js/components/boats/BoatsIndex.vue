<template>        
<div>
	<div class="form-group">
		<router-link :to="{name: 'createBoat'}" class="btn btn-success">Create new boat</router-link>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">boats list</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
			<thead>
				<tr>
				  <th>Name</th>
				  <th>Address</th>
				  <th>Website</th>
				  <th>Email</th>
				  <th width="100"> </th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="boat in boats" :key="boat">
                    <td>{{ boat.name }}</td>
                    <td>{{ boat.address }}</td>
                    <td>{{ boat.website }}</td>
                    <td>{{ boat.email }}</td>
                    <td>
                        <router-link :to="{name: 'editBoat', params: {id: Boat.id}}" class="btn btn-xs btn-default">
                            Edit
                        </router-link>
                        <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(Boat.id, index)">
                            Delete
                        </a>
                    </td>
                </tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
</template>

<script>
    export default {
        data: function () {
            return {
                boats: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/boats')
                .then(function (resp) {
                    app.boats = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load boats");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/boats/' + id)
                        .then(function (resp) {
                            app.boats.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete Boat");
                        });
                }
            }
        }
    }
</script>